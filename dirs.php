<?php
include('includes/base.php');

if ($_GET["id"]!="") {
$result=mysqli_query($link,"SELECT * FROM dirs Where id_group = ".htmlspecialchars($_GET["id"]));
	$product = mysqli_fetch_assoc($result);
	
	$header = $product['name_group'];
    
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span><a class="breadcrumb-item" href="dirs.php">Каталог</a> <span class="brd-separetor">/</span> 
                                  ';
$bread.='<span class="breadcrumb-item active">'.$product['name_group'].'</span>';
}
else
	{
		$header = "Каталог";
    
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span><span class="breadcrumb-item active">Каталог</span>';
	
	}

$includes['center_file']='includes/center/dirs.php';

include('includes/templates.php');
?>