<?php
include_once "config.php";

if (isset($_POST['action'])) {
    if (isset($_POST['super_token']) ||
    isset($_POST['sprtoken']) && 
    $_POST['super_token'] == $_SESSION['super_token'] || 
    $_POST['sprtoken'] == $_SESSION['super_token'])  {
        switch ($_POST['action']) {
            case 'create':
                $name = strip_tags($_POST['tag_name']);
                $description = strip_tags($_POST['tag_description']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);

                $tagsController = new TagsController();
                $tagsController->CreateTags($name, $description, $slug);
                break;
            case 'update':
                $name = strip_tags($_POST['tag_name']);
                $description = strip_tags($_POST['tag_description']);
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
                $id = strip_tags($_POST['tag_id']);

                $tagsController = new TagsController();
                $tagsController->EditTags($name, $description, $slug, $id);
                break;
            case 'specifict':
                $id = strip_tags($_POST['id']);
                $tagsController = new TagsController();
                $tagsController->GetSpecifictTags($id);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);

                $tagsController = new TagsController();
                $tagsController->DeleteTags($id);
                break;
        }
    }
}
class TagsController {

    public function GetTags() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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

    public function GetSpecifictTags($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/' . $id,
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

    public function CreateTags($name, $description, $slug) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name, 
                'description' => $description, 
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
            $response = json_encode([
                $response,
                "update" => false
            ]);
            echo $response;
        } else {

            $response = [
                "message" => "Error al crear la etiqueta",
            ];
            $response = json_encode($response);
            echo $response;
        }
    }

    public function EditTags($name, $description, $slug, $id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'name=' . $name . 
                '&description=' . $description . 
                '&slug=' . $slug . 
                '&id=' . $id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            $response = json_encode([
                $response,
                "update" => true
            ]);
            echo $response;
        } else {

            $response = [
                "message" => "Error al actualizar la etiqueta",
            ];
            $response = json_encode($response);
            echo $response;
        }
    }

    public function DeleteTags($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
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

