<?php
include('includes/base.php');

$result=mysqli_query($link,"SELECT * FROM dirs, goods
where dirs.id_group=goods.id_group and id_good=".htmlspecialchars($_GET["id"]));
	$product = mysqli_fetch_assoc($result);
	
	$header = $product['name_good'];
    
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span><a class="breadcrumb-item" href="dirs.php">Каталог</a> <span class="brd-separetor">/</span><a class="breadcrumb-item" href="dirs.php?id='.$product['id_group'].'">'.$product['name_group'].'</a> 
                                  <span class="brd-separetor">/</span>';
$bread.='<span class="breadcrumb-item active">'.$product['name_good'].'</span>';
								  
$includes['center_file']='includes/center/products.php';

include('includes/templates.php');
?>