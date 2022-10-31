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
                $first_name = strip_tags($_POST['first_name']);
                $last_name = strip_tags($_POST['last_name']);
                $street_and_use_number = strip_tags($_POST['street_and_use_number']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone_number = strip_tags($_POST['phone_number']);
                $client_id = strip_tags($_POST['client_id']);
                
                $addressController = new AddressController();
                $addressController->CreateAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $client_id);
                break;
            case 'update':
                $first_name = strip_tags($_POST['first_name']);
                $last_name = strip_tags($_POST['last_name']);
                $street_and_use_number = strip_tags($_POST['street_and_use_number']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone_number = strip_tags($_POST['phone_number']);
                $client_id = strip_tags($_POST['client_id']);
                $address_id = strip_tags($_POST['address_id']);
                $is_billing = strip_tags($_POST['is_billing']);

                $addressController = new AddressController();
                $addressController->EditAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing, $address_id, $client_id);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);

                $addressController = new AddressController();
                $addressController->DeleteAddress($id);
                break;
        }
    }
}

class AddressController {

    public function NewRequest() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/clients/1',
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

    public function GetAddress($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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

    public function CreateAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $client_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'street_and_use_number' => $street_and_use_number,
                'postal_code' => $postal_code,
                'city' => $city,
                'province' => $province,
                'phone_number' => $phone_number,
                'is_billing_address' => '1',
                'client_id' => $client_id
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
                "message" => "Error al crear la dirección",
            ];
            $response = json_encode($response);
            echo $response;
        }

    }

    public function EditAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing, $address_id, $client_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'first_name=' . $first_name . 
                '&last_name=' . $last_name . 
                '&street_and_use_number=' . $street_and_use_number .
                '&postal_code=' . $postal_code .
                '&city=' . $city .
                '&province=' . $province .
                '&phone_number=' . $phone_number .
                '&is_billing_address=' . $is_billing .
                '&client_id=' . $client_id .
                '&id=' . $address_id,
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
                "message" => "Error al actualizar el cupon",
            ];
            $response = json_encode($response);
            echo $response;
        }

    }

    public function DeleteAddress($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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
