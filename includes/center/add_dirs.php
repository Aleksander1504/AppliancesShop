<h1>Добавление категории</h1>
<?php
	
	if ($_POST['new_post']==1)
		{
		$name=$_POST['name'];
		
		$SQL = "INSERT INTO `dirs`(`name_group`) VALUES 
		('".$name."')";
		$result = mysqli_query($link,$SQL) or die ("Query failed");
		$text = "Категория '".$_POST['name']."' добавлена!";
		
		}
?>
<div style = "margin:10px 8px auto;">
<div class="error"><?php echo $text; ?></div>
<form enctype="multipart/form-data" action="" method="post">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input class="form-control" type="hidden" name="new_post" value="1" />
<fieldset>
		  <legend>Информация о категории</legend>
		   
			<label>Название<span class="red">*</span></label><input class="form-control" type="text" name="name" <?php if (isset($_POST['name'])) echo 'value="'.$_POST['name'].'"'?> required>
			
			
			
		</fieldset>
	<div class="center">
		<button class="btn btn-primary" type="submit" id="send">Отправить</button>
		<button class="btn btn-primary" type="reset">Сброс</button>
	</div>	
		
</form>

</div>


  