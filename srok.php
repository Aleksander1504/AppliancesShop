<?php
include('includes/base.php');
if($_SESSION['admin'])
	$includes['center_file']='includes/center/srok.php';
else
	$includes['center_file']='includes/center/error.php';


include('includes/templates.php');
?>