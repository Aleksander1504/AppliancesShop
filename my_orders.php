<?php
include('includes/base.php');
$header = "Мои заказы";
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Мои заказы</span>';

if($_SESSION['user_name'])
	$includes['center_file']='includes/center/my_orders.php';
else
	$includes['center_file']='includes/center/error.php';;


include('includes/templates.php');
?>