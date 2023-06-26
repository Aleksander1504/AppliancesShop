<h1>Изменение товара</h1>
<script>
  window.onload = function() {
    var max=500;
	var description=document.getElementById("description");
	description.onkeyup = function(){
	//alert(max);
	   if (description.value.length<500) {
	    //max-=description.value.length;
		document.getElementById("min").innerHTML=max-description.value.length;
		}
	   else {
		description.value = description.value.substr(0, 500);
		document.getElementById("min").innerHTML=max-description.value.length;
		}
	};
	

	
  };
</script>
<?php
		

	
	if ($_POST['update']==1)
		{
		$id=$_GET['id'];
		$name=$_POST['name'];
		$descr=$_POST['description'];
		$count=$_POST['count'];
		$dir=$_POST['dirs'];
		
		if (basename($_FILES['file']['name'])!="") {
			$uploaddir = 'img/catalog/';
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				
			move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
			$SQL = "UPDATE `goods` SET `id_group`=".$dir.",`name_good`='".$name."',`cost`='".$count."',`img`='".$uploadfile."',`description`='".$descr."' WHERE `id_good`=".$id;
		//echo $SQL;
		
		}
		else 
			$SQL = "UPDATE `goods` SET `id_group`=".$dir.",`name_good`='".$name."', `description`='".$descr."' WHERE `id_good`=".$id;
			$result = mysqli_query($link,$SQL) or die ("Query failed");
			
		$SQL = "INSERT INTO `prices`(`id_good`, `price`) VALUES
		(".$id.", '".$count."')";
		$result = mysqli_query($link,$SQL) or die ("Query failed2");
		
		
		$text = "Товар '".$_POST['name']."' изменен!";
		 
		}
?>
<div style = "margin:10px 8px auto;">
<div class="error"><?php echo $text; ?></div>
<form enctype="multipart/form-data" action="" method="post">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input class="form-control" type="hidden" name="update" value="1" />
<?php 
$result=mysqli_query($link,"SELECT * FROM dirs, goods
where dirs.id_group=goods.id_group and goods.id_good=".$_GET['id']);
	$product = mysqli_fetch_assoc($result);
	
$sql_2 = "SELECT `price` FROM `prices`, `goods`
Where prices.id_good = goods.id_good and prices.id_good = ".$_GET['id']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2");
$prices = mysqli_fetch_assoc($result_2);

?>
<fieldset>
		  <legend>Информация о товаре</legend>
		    
			<label>Название<span class="red">*</span></label><input class="form-control" type="text" name="name" <?php echo ' value="'.$product['name_good'].'"'?> required>
			<label>Каталог<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM dirs order by name_group ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='dirs'>";
				if (mysqli_num_rows($result)==0)
					echo "Категорий не найдено!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result)) {
						if ($product['id_group']==$dirs['id_group'])
							echo '<option value="'.$dirs['id_group'].'" selected>'.$dirs['name_group'].'</option>';
						else	
							echo '<option value="'.$dirs['id_group'].'">'.$dirs['name_group'].'</option>';
						
						}
			echo "</select>";
			?>
		
			<label>Описание<span class="red">*</span></label><textarea class="form-control"  name="description" id="description" style="height:200px" required><?php echo $product['description']; ?></textarea><sup>Допустимое количество символов 500. Осталось: <span id="min"></span></sup>
			<label>Изображение</label><input class="form-control" type="file" name="file">
			<label>Стоимость<span class="red">*</span></label><input class="form-control" type="text" name="count" <?php echo ' value="'.$prices['price'].'"'?> required>
			
		</fieldset>
	<div class="center">
		<button class="btn btn-primary" type="submit" id="send">Отправить</button>
		<button class="btn btn-primary" type="reset">Сброс</button>
	</div>	
		
</form>

</div>


  