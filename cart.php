<?php
include('includes/base.php');

$header = "Товары в корзине";
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Корзина</span>';

$includes['center_file']='includes/center/cart.php';

include('includes/templates.php');
?>