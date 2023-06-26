<?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавление услуги</h2>

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
					<h3>Добавление услуги</h3>
<?
if ($_POST['save']==1)
		{
		
		$sql1="INSERT INTO `services`(`name_serv`, `stoimost`, `category_id`) VALUES ('".$_POST['name']."','".$_POST['stoimost']."','".$_POST['status']."')";
		
		$result1 = mysqli_query ($link,$sql1) or die ("Query failed!-->".$sql1);
		
		echo "<p>Информация об услуге добавлена!</p>";
		
		
		}
?>

<form  action="" method="post">
  <input type="hidden" name="save" value="1">
  <div class="form-group">
    <label for="name">Название услуги</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="form-group">
    <label for="name">Стоимость</label>
    <input type="text" class="form-control" name="stoimost">
  </div>
   
   
   <div class="form-group">
    <label for="status">Категория</label>
	<select name="status" class="form-control">
  <?
	$sql="SELECT * FROM `category`
Order by `name_cat` ASC";	
		 $result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
			while ($rows=mysqli_fetch_assoc($result)) 
				echo '<option value="'.$rows['id_cat'].'">'.$rows['name_cat'].'</option>';
		 }
  
  ?>
   </select>
   </div>
   
  <br><br>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<script>
	var i=1;
	function add(){
		document.getElementById('elem').insertAdjacentHTML('beforeend','<hr><div class="form-group"><label for="product">Учебное заведение:</label><input type="text" class="form-control" name="product[]" id="product'+i+'"></div>');
		document.getElementById('elem').insertAdjacentHTML('beforeend', '<div class="form-group"><label for="ves">Специальность:</label><input type="text" class="form-control" name="ves[]" id="ves'+i+'""></div>');
		document.getElementById('elem').insertAdjacentHTML('beforeend', '<div class="form-group"><label for="date">Дата присвоения:</label><input type="date" class="form-control" name="date[]" id="date'+i+'""></div>');
		i++;
	}

</script>
 
<?php require('footer.php'); ?>