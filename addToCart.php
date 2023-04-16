<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


echo 'Test';

require_once './dbConnect.php';

if (isset($_POST['product_id'])) {
    session_start();
    $_SESSION['product_id']= $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $prodId = $_POST['product_id'];
    echo $dbname;

    $sql = "SELECT * FROM `tbl_cart_items` where user_id=$user_id && product_id=$prodId";

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        exit();
    } else {
        $sql = "INSERT INTO `tbl_cart_items`(`user_id`, `product_id`, `quantity`) VALUES ($user_id,$prodId,1)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

//    $product_in_cart =explode('|', $_SESSION["cart_products"]); 
//    array_push($product_in_cart,$_POST['product_id']);
//    
//    $stringofproducts = implode('|', $product_in_cart);
//    
//    
//    $_SESSION["product_id"]=$stringofproducts;
//    echo $_SESSION["product_id"];
}