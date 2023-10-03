<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["product_name"];
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $cart_item = array($id,$name,$quantity,$price);
    
    if (empty($_SESSION["cart_list"])) {
        $_SESSION["cart_list"]["$id"] = $cart_item;
    }
    else {
        if (empty($_SESSION["cart_list"]["$id"])){
            $_SESSION["cart_list"]["$id"] = $cart_item;   
        } 
        else {
            $_SESSION["cart_list"]["$id"][2] = $_SESSION["cart_list"]["$id"][2] + intval($_POST["quantity"]);
        }
    }
    }
?>