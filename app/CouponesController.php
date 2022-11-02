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
                $code = strip_tags($_POST['code']);
                $percentage_discount = strip_tags($_POST['percentage_discount']);
                $min_amount_required = strip_tags($_POST['min_amount_required']);
                $min_product_required = strip_tags($_POST['min_product_required']);
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $max_uses = strip_tags($_POST['max_uses']);
                $valid = strip_tags($_POST['valid']);
                
                $couponesController = new CouponesController();
                $couponesController->CreateCoupones($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $valid);
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $code = strip_tags($_POST['code']);
                $percentage_discount = strip_tags($_POST['percentage_discount']);
                $min_amount_required = strip_tags($_POST['min_amount_required']);
                $min_product_required = strip_tags($_POST['min_product_required']);
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $max_uses = strip_tags($_POST['max_uses']);
                $count_uses = strip_tags($_POST['count_uses']);
                $valid = strip_tags($_POST['valid']);
                $status = strip_tags($_POST['status']);
                $coupon_id = strip_tags($_POST['coupon_id']);

                $couponesController = new CouponesController();
                $couponesController->EditCoupones($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid, $status, $coupon_id);

                break;
            case 'delete':
            $id = strip_tags($_POST['id']);
            $couponesController = new CouponesController();
            $couponesController->DeleteCoupones($id);
            break;
            case 'specifict':
                $id = strip_tags($_POST['id']);
                $couponesController = new CouponesController();
                $couponesController->GetSpecifictCoupones($id);
                break;
        }
    }
}

class CouponesController {

    public function GetCoupones() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
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

    public function GetSpecifictCoupones($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/' . $id,
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

    public function CreateCoupones($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $valid) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'code' => $code, 
                'percentage_discount' => $percentage_discount,
                'min_amount_required' => $min_amount_required, 
                'min_product_required' => $min_product_required,
                'start_date' => $start_date, 
                'end_date' => $end_date,
                'max_uses' => $max_uses, 
                'count_uses' => '0', 
                'valid_only_first_purchase' => $valid,
                'status' => '1'
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
                "message" => "Error al crear el cupon",
            ];
            $response = json_encode($response);
            echo $response;
        }

    }

    public function EditCoupones($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid, $status, $coupon_id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'name=' . $name . 
                '&code=' . $code . 
                '&percentage_discount=' . $percentage_discount . 
                '&min_amount_required=' . $min_amount_required . 
                '&min_product_required=' . $min_product_required .
                '&start_date=' . $start_date . 
                '&end_date=' . $end_date . 
                '&max_uses=' . $max_uses . 
                '&count_uses=' . $count_uses .
                '&valid_only_first_purchase=' . $valid . 
                '&status=' . $status .
                '&id=' . $coupon_id,
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

    public function DeleteCoupones($id) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/' . $id,
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
