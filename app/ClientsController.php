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
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $phone_number = strip_tags($_POST['phone_number']);
                $is_suscribed = strip_tags($_POST['is_suscribed']);
                $clientsController = new ClientsController();
                $clientsController->CreateClient(
                    $name,
                    $email,
                    $password,
                    $phone_number,
                    $is_suscribed
                );
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);
                $clientsController = new ClientsController();
                $clientsController->DeleteClient($id);
                break;
            case 'create':
                $id = strip_tags($_POST['id']);
                $clientsController = new ClientsController();
                $clientsController->SpecifictClient(
                    $id
                );
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $phone_number = strip_tags($_POST['phone_number']);
                $level_id = strip_tags($_POST['level_id']);
                $id = strip_tags($_POST['id']);
                $clientsController = new ClientsController();
                $clientsController->EditClient(
                    $name,
                    $email,
                    $password,
                    $phone_number,
                    $level_id,
                    $id
                );
                break;
        }
    }
}
class ClientsController
{
    public function GetClientes()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
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

    public function SpecifictClient($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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

    public function CreateClient(
        $name,
        $email,
        $password,
        $phone_number,
        $is_suscribed
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'is_suscribed' => $is_suscribed, 'level_id' => '1'),
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

    public function EditClient(
        $name,
        $email,
        $password,
        $phone_number,
        $level_id,
        $id
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name=' . $name . '&email=' . $email . '&password=' . $password . '&phone_number=' . $phone_number . '&level_id=' . $level_id . '&id=' . $id,
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
    public function DeleteClient($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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

