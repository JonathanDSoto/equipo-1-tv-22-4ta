<?php
include_once "config.php";

if (isset($_POST['action'])) {
    if (isset($_POST['super_token']) ||
      isset($_POST['sprtoken']) && 
      $_POST['super_token'] == $_SESSION['super_token'] || 
      $_POST['sprtoken'] == $_SESSION['super_token'])  {
        switch ($_POST['action']) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
                $description = strip_tags($_POST['description']);
                $category_id = strip_tags($_POST['category_id']);
                $categorieController = new CategorieController();
                $categorieController->CreateCategorie(
                    $name,
                    $description,
                    $slug,
                    $category_id
                );
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);
                $categorieController = new CategorieController();
                $categorieController->DeleteCategorie($id);
                break;
            case 'update':
                $id = strip_tags($_POST['id']);
                $name = strip_tags($_POST['name']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
                $description = strip_tags($_POST['description']);
                $category_id = strip_tags($_POST['category_id']);
                $categorieController = new CategorieController();
                $categorieController->EditCategorie(
                    $id,
                    $name,
                    $description,
                    $slug,
                    $category_id
                );

                break;
                case 'specifict': 
                    $id = strip_tags($_POST['id']);
                    $categorieController = new CategorieController();
                    $categorieController->GetSpecifictCategorie($id);
                    break;
        }
    }
}
class CategorieController
{
    public function GetCategories()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
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
        echo $response;
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }
    public function CreateCategorie(
        $name,
        $description,
        $slug,
        $category_id
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'description' => $description, 'slug' => $slug, 'category_id' => $category_id),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {

            header("location:" . BASE_PATH . "index");
        }
    }
    public function GetSpecifictCategorie()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/1',
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
        echo $response;
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }

    public function EditCategorie(
        $id,
        $name,
        $description,
        $slug,
        $category_id
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'id=' . $id . '&name=' . $name . '&description=' . $description . '&slug=' . $slug . '&category_id=' . $category_id,
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

            header("location:" . BASE_PATH . "index");
        }
    }

    public function DeleteCategorie($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/' . $id,
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

