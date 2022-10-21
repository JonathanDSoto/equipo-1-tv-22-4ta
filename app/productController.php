<?php

include_once "config.php";

if (isset($_POST['action'])) {
  if (isset($_POST['super_token']) ||
      isset($_POST['sprtoken']) && 
      $_POST['super_token'] == $_SESSION['super_token'] || 
      $_POST['sprtoken'] == $_SESSION['super_token']) {
    switch ($_POST['action']) {
      case 'create':
        $img_producto = $_FILES['img_producto']['tmp_name'];
        $name = strip_tags($_POST['name']);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $description = strip_tags($_POST['description']);
        $features = strip_tags($_POST['features']);
        $brand_id = strip_tags($_POST['brand_id']);

        $productController = new ProductsController();
        $productController -> createProduct($name, $slug, $description, $features, $brand_id, $img_producto);

        break;
      case 'delete':

        $id = strip_tags($_POST['id']);

        $productController = new ProductsController();
        $productController -> deleteProduct($id);
        
        break;
      case 'update':
        $name = strip_tags($_POST['name']);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $description = strip_tags($_POST['description']);
        $features = strip_tags($_POST['features']);
        $brand_id = strip_tags($_POST['brand_id']);
        $id = strip_tags($_POST['id']);
        
        $productController = new ProductsController();
        $productController -> editproducts($name, $slug, $description, $features, $brand_id, $id, $img_producto);
        break;
    }
  }
}

class ProductsController {

  public function getProducts() {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
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
    } else {
      return array();
    }

  }

  public function details($slug) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token'],  
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response);
    
    if (isset($response->code) && $response->code > 0) {
      return $response->data;
    }
  }

  public function createProduct($name, $slug, $description, $features, $brand_id, $img_producto) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
    'name' => $name,
    'slug' => $slug,
    'description' => $description,
    'features' => $features,
    'brand_id' => $brand_id,
    'cover'=> new CURLFILE($img_producto)),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' .$_SESSION['token'],
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);

    if(isset($response->code) && $response->code > 0) {
      header("Location:".BASE_PATH."products/index.php?modal=true");
    } else {
      header("Location:".BASE_PATH."products/index.php?modal=false");
    }

  }
  
  public function editproducts($name, $slug, $description, $features, $brand_id, $id) {
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS =>
      'name='.$name.'
      &slug='.$slug.'
      &description='.$description.'
      &features='.$features.'
      &brand_id='.$brand_id.'
      &id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    
    $response = json_decode($response);
    
    if(isset($response->code) && $response->code > 0) {
      header("Location:".BASE_PATH."products/index.php?modal=true");
    } else {
      header("Location:".BASE_PATH."products/index.php?modal=false");
    }
  }

  public function deleteProduct($id) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    $response = json_decode($response);
    
    if (isset($response->code) && $response->code > 0) {
        return true;
    } else {
        return false;
    }
  
  }

}