  <a id="center"></a>
  <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавление сотрудника</h2>

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
					
<?
if ($_POST['save']==1)
		{
					
		$sql3="INSERT INTO `users`(`fio`, `login`, `pass`, `email`, `role`, `phone`) VALUES  ('".$_POST['label']."','".$_POST['login']."','".$_POST['password']."','".$_POST['adress']."','".$_POST['role']."','".$_POST['phone']."')";
		//echo $sql3;	
		$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
		$id_auto=mysqli_insert_id($link);
		
		
		echo "<p>Информация о сотруднике добавлена!</p>";
		
		
		}
?>

<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
 
  <input type="hidden" name="save" value="1">
  <div class="form-group">
    <label for="label">ФИО</label><br>
    <input type="text" name="label" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="label">e-mail</label><br>
    <input type="email" name="adress" class="form-control">
  </div>
  <div class="form-group">
    <label for="label">Логин</label><br>
    <input type="text" name="login" class="form-control">
  </div>
  <div class="form-group">
    <label for="label">Пароль</label><br>
    <input type="text" name="password" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="status">Роль в системе</label>
	<select name="role" class="form-control">
			<option value="1">Администратор</option>
			<option value="0">Сотрудник</option>

   </select>
   </div>
  
  <div class="form-group">
    <label for="label">Телефон</label><br>
    <input type="text" name="phone" class="form-control">
  </div>
  

  <button type="submit" class="btn btn-primary">Добавить</button>
</form>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		





  