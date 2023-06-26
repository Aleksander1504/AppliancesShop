<?php
  include('config.php');
  $sql2="SELECT * FROM `goods` WHERE `id_group` = ".$_POST['id']."
Order by `name_good` ASC";
  $result2 = mysqli_query($link, $sql2) or die ("Query failed");
  
  while ($halls=mysqli_fetch_assoc($result2)) {
	$arr[$halls['id_good']]="".$halls['name_good'];
	
	
  }
  echo json_encode($arr);


?>