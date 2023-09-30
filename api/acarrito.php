<?php
    session_start();
    $product = $_POST["name"];
    $cart_item = [$product];
    $_SESSION["cart_list"] = array_merge($_SESSION["cart_list"],$cart_item);   
?>