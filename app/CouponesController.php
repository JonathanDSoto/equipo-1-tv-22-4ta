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
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $max_uses = strip_tags($_POST['max_uses']);
                $couponesController = new CouponesController();
                $couponesController->CreateCoupones(
                    $name,
                    $code,
                    $percentage_discount,
                    $min_amount_required,
                    $start_date,
                    $end_date,
                    $max_uses
                );
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
            case 'update':
                $name = strip_tags($_POST['name']);
                $code = strip_tags($_POST['code']);
                $percentage_discount = strip_tags($_POST['percentage_discount']);
                $min_amount_required = strip_tags($_POST['min_amount_required']);
                $max_uses = strip_tags($_POST['max_uses']);
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $id = strip_tags($_POST['id']);
                $couponesController = new CouponesController();
                $couponesController->EditCoupones(
                    $name,
                    $code,
                    $percentage_discount,
                    $min_amount_required,
                    $max_uses,
                    $start_date,
                    $end_date,
                    $id
                );
                break;
        }
    }
}
class CouponesController
{
    public function GetCoupones()
    {

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
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }
    public function GetSpecifictCoupones($id)
    {
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
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        }
    }

    public function CreateCoupones(
        $name,
        $code,
        $percentage_discount,
        $min_amount_required,
        $start_date,
        $end_date,
        $max_uses
    ) {
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
                'code' => $code, 'percentage_discount' => $percentage_discount,
                'min_amount_required' => $min_amount_required, 'min_product_required' => '1',
                'start_date' => $start_date, 'end_date' => $end_date,
                'max_uses' => $max_uses, 'count_uses' => '0', 'valid_only_first_purchase' => '1',
                'status' => '1'
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

    public function EditCoupones(
        $name,
        $code,
        $percentage_discount,
        $min_amount_required,
        $max_uses,
        $start_date,
        $end_date,
        $id
    ) {

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
            CURLOPT_POSTFIELDS => 'name=' . $name . '&code=' . $code . '&percentage_discount=' . $percentage_discount . '&min_amount_required=' . $min_amount_required . '&min_product_required=1&start_date=' . $start_date . '&end_date=' . $end_date . '&max_uses=' . $max_uses . '&count_uses=0&valid_only_first_purchase=1&status=1&id=' . $id,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("location:" . BASE_PATH . "index");
        }
    }

    public function DeleteCoupones($id)
    {

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
