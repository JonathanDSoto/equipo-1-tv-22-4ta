<?php

include_once 'config.php';

if (isset($_POST["action"]) && isset($_POST["email"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST["action"]) {
            case 'access':
                $authcontroller = new AuthController();
                $authcontroller->login($_POST["email"], $_POST["password"]);
                break;
            
        }
    }
}

class AuthController
{ //INICIO DE LOGIN 
    public function login($email, $password)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);


        if (isset($response->code) &&  $response->code > 0) {
            $_SESSION['id'] = $response->data->id;
            $_SESSION['name'] = $response->data->name;
            $_SESSION['lastname'] = $response->data->lastname;
            $_SESSION['avatar'] = $response->data->avatar;
            $_SESSION['token'] = $response->data->token;
            $_SESSION['email'] = $response->data->email;

            $response = json_encode($response);
            echo $response;

        } else {
            $response =[
                "message" => "El usuario no existe",

            ];
            $response = json_encode($response);
            echo $response;
        }
    }
}