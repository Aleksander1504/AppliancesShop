<?php
include('includes/base.php');

$header = "Поиск";
if ($_GET['search']!="")
	$header.=" ".$_GET['search'];
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Поиск</span>';

$includes['center_file']='includes/center/search.php';

include('includes/templates.php');
?>