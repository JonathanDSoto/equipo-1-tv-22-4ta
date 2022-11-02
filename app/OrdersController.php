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
                $folio = strip_tags($_POST['folio']);
                $total = strip_tags($_POST['total']);
                $is_paid = strip_tags($_POST['is_paid']);
                $client_id = strip_tags($_POST['client_id']);
                $address_id = strip_tags($_POST['address']);
                $order_status_id = strip_tags($_POST['order_status_id']);
                $payment_type_id = strip_tags($_POST['payment_type_id']);
                $coupon_id = strip_tags($_POST['coupon_id']);
                $presentation = strip_tags($_POST['presentation']);
                $quantity = strip_tags($_POST['quantity']);

                $ordersController = new OrdersController();
                $ordersController->CreateOrders($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentation, $quantity);
                break;
            case 'between': 
                $fate = strip_tags($_POST['fate']);
                $fate2 = strip_tags($_POST['fate2']);
                $ordersController = new OrdersController();
                $ordersController->GetOrdersBetweenDates(
                    $fate,
                    $fate2
                );
                break;
            case 'update': 
                $id = strip_tags($_POST['id_order']);
                $order_status_id = strip_tags($_POST['order_status']);

                $ordersController = new OrdersController();
                $ordersController->EditCreate($id, $order_status_id);
                break;
            case 'specifict': 
                $id = strip_tags($_POST['id']);
                $ordersController = new OrdersController();
                $ordersController->GetSpecifict($id);
                break;
            case 'delete': 
                $id = strip_tags($_POST['id']);

                $ordersController = new OrdersController();
                $ordersController->DeleteOrders($id);
                break;
        }
    }
}
class OrdersController {

    public function GetOrders() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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

    public function GetOrdersBetweenDates($date, $date2) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $date . '/' . $date2,
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

    public function GetSpecifict($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/' . $id,
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
    public function CreateOrders($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentation, $quantity) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'folio' => $folio, 
                'total' => $total,
                'is_paid' => $is_paid, 
                'client_id' => $client_id, 
                'address_id' => $address_id,
                'order_status_id' => $order_status_id, 
                'payment_type_id' => $payment_type_id, 
                'coupon_id' => $coupon_id,
                'presentations[0][id]' => $presentation, 
                'presentations[0][quantity]' => $quantity
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
                "message" => "Error al crear la orden",
            ];
            $response = json_encode($response);
            echo $response;
        }

    }

    public function EditCreate($id, $order_status_id) {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'id=' . $id . '&order_status_id=' . $order_status_id,
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
                    "message" => "Error al actualizar la orden",
                ];
                $response = json_encode($response);
                echo $response;
            }
    }

    public function DeleteOrders($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $id,
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
}
