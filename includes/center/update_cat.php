<h1>Изменение категории</h1>

<?php
		

	
	if ($_POST['update']==1)
		{
		
		$name=$_POST['name'];
		
		
		
		
		$SQL = "UPDATE `dirs` SET `name_group`='".$name."' WHERE `id_group`=".$_GET['id'];
		//echo $SQL;
		$result = mysqli_query($link,$SQL) or die ("Query failed-->".$SQL);
		$text = "Группа '".$_POST['name']."' изменена!";
		 
		}
?>
<div style = "margin:10px 8px auto;">
<div class="error"><?php echo $text; ?></div>
<form enctype="multipart/form-data" action="" method="post">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input class="form-control" type="hidden" name="update" value="1" />
<?php 
$result=mysqli_query($link,"SELECT * FROM dirs
where id_group=".$_GET['id']);

	$product = mysqli_fetch_assoc($result);
?>
<fieldset>
		  <legend>Информация о категории</legend>
		    
			<label>Название<span class="red">*</span></label><input class="form-control" type="text" name="name" <?php echo ' value="'.$product['name_group'].'"'?> required>
			
			
		</fieldset>
	<div class="center">
		<button class="btn btn-primary" type="submit" id="send">Отправить</button>
		<button class="btn btn-primary" type="reset">Сброс</button>
	</div>	
		
</form>

</div>


  