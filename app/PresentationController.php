<?php
include_once "config.php";

if (isset($_POST['action'])) {
    if (isset($_POST['super_token']) ||
      isset($_POST['sprtoken']) && 
      $_POST['super_token'] == $_SESSION['super_token'] || 
      $_POST['sprtoken'] == $_SESSION['super_token'])  {
        switch ($_POST['action']) {
            case 'create':
                $description = strip_tags($_POST['description']);
                $code = strip_tags($_POST['code']);
                $weight_in_grams = strip_tags($_POST['weight']);
                $stock = strip_tags($_POST['stock']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                $cover = $_FILES['cover']['tmp_name'];

                $presentationController = new PresentationController();
                $presentationController->CreatePresentation($description, $code, $weight_in_grams, $cover, $stock, $stock_min, $stock_max, $product_id);
                break;
            case 'update':
                $description = strip_tags($_POST['description']);
                $code = strip_tags($_POST['code']);
                $weight_in_grams = strip_tags($_POST['weight']);
                $status = strip_tags($_POST['status']);
                $stock = strip_tags($_POST['stock_min']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                $presentation_id = strip_tags($_POST['presentation_id']);

                $presentationController = new PresentationController();
                $presentationController->EditPresentation($description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $presentation_id);
                break;
            case 'create_amount':
                $amount = strip_tags($_POST['amount']);
                $flag = strip_tags($_POST['flag']);
                $presentation_id = strip_tags($_POST['presentation_id']);

                $presentationController = new PresentationController();
                $presentationController->EditPresentationPreci($presentation_id, $flag, $amount);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);
        
                $presentationController = new PresentationController();
                $presentationController -> DeletePresentation($id);
                break;
        }
    }
}
class PresentationController {

    public function GetPresentation($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/' . $id,
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

    public function GetPresentationSpecific($id_presentation) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id_presentation,
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

    public function CreatePresentation($description, $code, $weight_in_grams, $cover, $stock, $stock_min, $stock_max, $product_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'description' => $description, 
                'code' => $code,
                'weight_in_grams' => $weight_in_grams, 
                'status' => 'active',
                'cover' => new CURLFILE($cover),
                'stock' => $stock, 
                'stock_min' => $stock_min, 
                'stock_max' => $stock_max, 
                'product_id' => $product_id
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
                "message" => "Error al crear la presentacion",

            ];
            $response = json_encode($response);
            echo $response;
        }
    }

    public function EditPresentation($description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $presentation_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
            'description=' . $description .
            '&code=' . $code .
            '&weight_in_grams=' . $weight_in_grams .
            '&status=' . $status .
            '&stock=' . $stock .
            '&stock_min=' . $stock_min .
            '&stock_max=' . $stock_max .
            '&product_id=' . $product_id .
            '&id=' . $presentation_id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        
        if (isset($response->code) &&  $response->code > 0) {
            $response = json_encode($response);
            echo $response;
        } else {
            $response = [
                "message" => "Error al editar la presentación",
            ];
            $response = json_encode($response);
            echo $response;
        }
    }

    public function EditPresentationPreci($presentation_id, $flag, $amount) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'id=' . $presentation_id . 
            '&amount=' . $amount,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if ($flag == false) {
            if (isset($response->code) &&  $response->code > 0) {
                $response = json_encode([
                    $response,
                    "update" => true
                ]);
                echo $response;
            } else {

                $response = [
                    "message" => "Error al actualizar el precio de la presentación",
                ];
                $response = json_encode($response);
                echo $response;
            }
        } else {
            if (isset($response->code) &&  $response->code > 0) {
                $response = json_encode([
                    $response,
                    "update" => false
                ]);
                echo $response;
            } else {

                $response = [
                    "message" => "Error al actualizar el precio de la presentación",
                ];
                $response = json_encode($response);
                echo $response;
            }
        }


    }

    public function DeletePresentation($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 665|cUviyAgM8QDBvMJVoLuv2zfXYWAUPuqb2qeKwXEk'
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
