<?php
 /* if (isset($_POST['delete']))
	{
	$sql="DELETE FROM `carts` WHERE `session_id`='".session_id()."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	
	echo "Корзина очищена!<br><br><br>";
	

	}*/
 if (isset($_POST['update']))
	{
	
		$sql="UPDATE `client` SET `FIO`='".$_POST['name']."',`phone_cl`='".$_POST['tel']."',`adress_cl`='".$_POST['adress']."',`login`='".$_POST['login']."',`pass`='".$_POST['pass']."' WHERE `id_cl`=".$_SESSION['user_id'];
		//echo $sql;
		$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	
	
	
	
	echo "Информация обновлена!<br><br>";
	
	

	}
 
    $sql="SELECT `FIO`, `phone_cl`, `adress_cl`, `login`, `pass` FROM `client` WHERE `id_cl`='".$_SESSION['user_id']."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    
	echo "<form method='post' action=''>";
	$myrow = mysqli_fetch_assoc($result);
	
	?>
	<fieldset>
		  <legend>Информация о покупателе</legend>
		   
			<label>ФИО<span class="red">*</span></label><input class="form-control" type="text" name="name" value="<?php echo $myrow['FIO']?>" required>
			<label>Телефон<span class="red">*</span></label><input class="form-control" type="tel" name="tel" value="<?php echo $myrow['phone_cl']?>" required>
			<label>Адрес<span class="red">*</span></label><input class="form-control" type="text" name="adress" value="<?php echo $myrow['adress_cl']?>" required>
			<label>Логин<span class="red">*</span></label><input class="form-control" type="text" name="login" value="<?php echo $myrow['login']?>" required>
			<label>Пароль<span class="red">*</span></label><input class="form-control" type="text" name="pass"  value="<?php echo $myrow['pass']?>" required>
		</fieldset>
	
	
	<?php	
	
	}
	
	echo "<input class='form-control' type='hidden' name='update' value='1'>
	<button class='btn btn-primary' type='submit' style='margin:10px auto;'>Обновить</button>
	</form>";
	
	
 
?>

