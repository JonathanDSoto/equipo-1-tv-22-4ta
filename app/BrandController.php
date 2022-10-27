<?php
include_once "config.php";

if (isset($_POST['action'])) {
    if (
        isset($_POST['super_token']) ||
        isset($_POST['sprtoken']) &&
        $_POST['super_token'] == $_SESSION['super_token'] ||
        $_POST['sprtoken'] == $_SESSION['super_token']
    ) {
        switch ($_POST['action']) {
            case 'create':
                $brand_name = strip_tags($_POST['brand_name']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $brand_name);
                $brand_description = strip_tags($_POST['brand_description']);

                $brandsController = new BrandsController();
                $brandsController->CreateBrand($brand_name, $brand_description, $slug);
                break;
            case 'update':
                $brand_name = strip_tags($_POST['brand_name']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $brand_name);
                $brand_description = strip_tags($_POST['brand_description']);
                $brand_id = strip_tags($_POST['brand_id']);

                $brandsController = new BrandsController();
                $brandsController->EditBrand($brand_name, $brand_description, $slug, $brand_id);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);

                $brandsController = new BrandsController();
                $brandsController->DeleteBrand($id);
                break;
            case 'specifict':
                $id = strip_tags($_POST['id']);
                $brandsController = new BrandsController();
                $brandsController->SpecifictBrand($id);
                break;
        }
    }
}
class BrandsController {

    public function getBrands() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }

    }

    public function SpecifictBrand($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }

    }

    public function CreateBrand($brand_name, $brand_description, $slug) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $brand_name, 
                'description' => $brand_description, 
                'slug' => $slug
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl); 
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            $response = json_encode($response);
            echo $response;
        } else {
            $response =[
                "message" => "Error al crear la marca",

            ];
            echo $response;
        }

    }

    public function EditBrand($brand_name, $brand_description, $slug, $brand_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'name=' . $brand_name . 
                '&description=' . $brand_description . 
                '&slug=' . $slug . 
                '&id=' . $brand_id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));

            $response = curl_exec($curl); 
            curl_close($curl);
            $response = json_decode($response);
    
            if (isset($response->code) &&  $response->code > 0) {
                $response = json_encode($response);
                echo $response;
            } else {
                $response =[
                    "message" => "Error al actualizar la marca",
    
                ];
                echo $response;
            }

    }

    public function DeleteBrand($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            return true;
        } else {
            return false;
        }
        
    }
}
