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
                $weight_in_grams = strip_tags($_POST['weight_in_grams']);
                $stock = strip_tags($_POST['stock']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                $img_Presentation = $_FILES['img_Presentation']['tmp_name'];
                $presentationController = new PresentationController();
                $presentationController->CreatePresentation(
                    $description,
                    $code,
                    $weight_in_grams,
                    $img_Presentation,
                    $stock,
                    $stock_min,
                    $stock_max,
                    $product_id
                );
                break;
            case 'update':
                $description = strip_tags($_POST['description']);
                $code = strip_tags($_POST['code']);
                $status = strip_tags($_POST['weight_in_grams']);
                $stock_min = strip_tags($_POST['stock_min']);
                $product_id = strip_tags($_POST['product_id']);
                $id = strip_tags($_POST['id']);
                $presentationController = new PresentationController();
                $presentationController->EditPresentation(
                    $description,
                    $code,
                    $status,
                    $stock_min,
                    $product_id,
                    $id
                );
                break;
        }
    }
}
class PresentationController
{
    public function GetPresentation()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/1',
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
    public function CreatePresentation(
        $description,
        $code,
        $weight_in_grams,
        $img_Presentation,
        $stock,
        $stock_min,
        $stock_max,
        $product_id
    ) {

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
                'description' => $description, 'code' => $code,
                'weight_in_grams' => $weight_in_grams, 'status' => 'active',
                'cover' => new CURLFILE($img_Presentation),
                'stock' => $stock, 'stock_min' => $stock_min, 'stock_max' => $stock_max, 'product_id' => $product_id
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

    public function EditPresentation(
        $description,
        $code,
        $status,
        $stock_min,
        $product_id,
        $id
    ) {
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
            CURLOPT_POSTFIELDS => 'description=' . $description . '&code=' . $code . '&status=' . $status . '&stock_min=' . $stock_min . '&product_id=' . $product_id . '&id=' . $id,
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

    public function EditPresentationPreci(
        $id,
        $amount
    ) {

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
            CURLOPT_POSTFIELDS => 'id=' . $id . '&amount=' . $amount,
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
    public function DeletePresentation($id)
    {
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
//listoooo
