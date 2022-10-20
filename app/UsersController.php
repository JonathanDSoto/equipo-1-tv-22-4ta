<?php
include_once "config.php";

if (isset($_POST['action'])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']);
                $created_by = strip_tags($_POST['created_by']);
                $password = strip_tags($_POST['password']);
                $img_User = $_FILES['img_User']['tmp_name'];
                $usersController = new UsersController();
                $usersController->NewUser(
                    $name,
                    $lastname,
                    $email,
                    $phone_number,
                    $created_by,
                    $password,
                    $img_User,
                );
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
                $created_by = strip_tags($_POST['created_by']);
                $password = strip_tags($_POST['password']);
                $id = strip_tags($_POST['id']);
                $usersController = new UsersController();
                $usersController->EditUser(
                    $name,
                    $lastname,
                    $email,
                    $created_by,
                    $password,
                    $id
                );
                break;
            case 'updatephoto':
                $id = strip_tags($_POST['id']);
                $img_User = $_FILES['img_producto']['tmp_name'];
                $usersController = new UsersController();
                $usersController->EditPhoto(
                    $id,
                    $img_User
                );
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);

                $usersController = new UsersController();
                $usersController->DeleteUser($id);
                break;
            case 'detail':
                $id = strip_tags($_POST['id']);

                $usersController = new UsersController();
                $usersController->DetailsUser($id);
                break;
        }
    }
}
class UsersController
{
    public function getUsers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
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
        echo $response;
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }

    public function DetailsUser($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
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
        echo $response;
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }
    public function NewUser(
        $name,
        $lastname,
        $email,
        $phone_number,
        $created_by,
        $password,
        $img_User
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'lastname' => $lastname, 'email' => $email, 'phone_number' => $phone_number, 'created_by' => $created_by, 'role' => 'Administrador', 'password' => $password, 'profile_photo_file' => new CURLFILE($img_User)),
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

    public function EditUser(
        $name,
        $lastname,
        $email,
        $created_by,
        $password,
        $id
    ) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name=' . $name . '&lastname=' . $lastname . '&email=' . $email . '&created_by=' . $created_by . '&role=Administrador&password=' . $password . '&id=' . $id,
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

    public function DeleteUser($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
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
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function EditPhoto(
        $id,
        $img_User
    ) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/avatar',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id' => $id, 'profile_photo_file' => new CURLFILE($img_User)),
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
}
