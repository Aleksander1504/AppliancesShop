<?php
include('includes/base.php');
$header = "Мои личные данные";
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Мои личные данные</span>';

if($_SESSION['user_name'])
	$includes['center_file']='includes/center/private.php';
else
	$includes['center_file']='includes/center/error.php';


include('includes/templates.php');
?>