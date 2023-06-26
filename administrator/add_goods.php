  <a id="center"></a>
  <?php require('header.php'); ?>
   <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> </h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="control-group">
<h1>Добавление товара</h1>
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
		

	
	if ($_POST['new_post']==1)
		{
		$name=$_POST['name'];
		$descr=$_POST['description'];
		$count=$_POST['count'];
		$dir=$_POST['dirs'];
		
		if (basename($_FILES['file']['name'])!="") {
			$uploaddir = '../img/catalog/';
			
			$uploaddir2 = 'img/catalog/';
			
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			$uploadfile2 = $uploaddir2 . basename($_FILES['file']['name']);
			
				
			move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
		}
		else
			$uploadfile="";
		
		$SQL = "INSERT INTO `goods`(`id_group`, `name_good`, `manafuc`, `description`, `img`, `price_new`) 
    		VALUES 
		(".$dir.", '".$name."','".$_POST['man']."','".$descr."','".$uploadfile2."','".$_POST['cost']."')";
		//echo $SQL;
		$result = mysqli_query($link,$SQL) or die ("Query failed-->".$SQL);
		
		$id = mysqli_insert_id($link);
		/*$SQL = "INSERT INTO `prices`(`id_good`, `price`) VALUES
		(".$id.", '".$count."')";*/
		//echo $SQL;
		//$result = mysqli_query($link,$SQL) or die ("Query failed2");
		
		
		$text = "Товар '".$_POST['name']."' добавлен!";
		 
		}
?>
<div style = "margin:10px 8px auto;">
<div class="error"><?php echo $text; ?></div>
<form enctype="multipart/form-data" action="" method="post">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input class="form-control" type="hidden" name="new_post" value="1" />
<fieldset>
		  <legend>Информация о товаре</legend>
		    <div class="form-group">
			<label>Название<span class="red">*</span></label><input class="form-control" type="text" name="name" <?php if (isset($_POST['name'])) echo 'value="'.$_POST['name'].'"'?> required>
			</div>
			
			<div class="form-group">
			<label>Стоимость<span class="red">*</span></label><input class="form-control" type="text" name="cost" <?php if (isset($_POST['price_new'])) echo 'value="'.$_POST['price_new'].'"'?> required>
			</div>
			 <div class="form-group">
			<label>Изображение</label><input class="form-control" type="file" name="file">
			</div>
			<div class="form-group">
			<label>Категория<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM dirs order by name_group ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='dirs'>";
				if (mysqli_num_rows($result)==0)
					echo "Категорий не найдено!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result))	
						echo '<option value="'.$dirs['id_group'].'">'.$dirs['name_group'].'</option>';
			echo "</select>";
			?>
			</div>
			<div class="form-group">
			<label>Бренд<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM `manafacturer`
Order by `name_m` ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='man'>";
				if (mysqli_num_rows($result)==0)
					echo "Производители не найдены!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result))	
						echo '<option value="'.$dirs['id_m'].'">'.$dirs['name_m'].'</option>';
			echo "</select>";
			?>
			</div>
			
			<div class="form-group">
			<label>Описание<span class="red">*</span></label><textarea class="form-control"  name="description" id="description" style="height:100px;" required><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea><sup>Допустимое количество символов 500. Осталось: <span id="min"></span></sup>
			</div>
			
			
			
			
			
		</fieldset>
	<div class="center">
		<button class="btn btn-primary" type="submit" id="send">Отправить</button>
		<button class="btn btn-primary" type="reset">Сброс</button>
	</div>	
		
</form>

</div>


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		
  