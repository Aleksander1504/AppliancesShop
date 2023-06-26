<?php
include('includes/base.php');

	$includes['center_file']='includes/center/news.php';
	
	if ($_GET['id']!="")
		{
			$sql="SELECT * FROM `news_table`
where id = ".$_GET['id'];	
		
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		$rows=mysqli_fetch_assoc($result);
		$header = $rows['name'];
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  
								   <span class="brd-separetor">/</span><a class="breadcrumb-item" href="news.php">Новости</a> <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">'.$rows['name'].'</span>';
		
		
		}
	else
		{
    $header = "Новости";
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Новости</span>';
    }
include('includes/templates.php');
?>