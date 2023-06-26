  <a id="center"></a>
  <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Изменение сотрудника</h2>

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
		
			$sql3="UPDATE `users` SET `fio`='".$_POST['label']."',`login`='".$_POST['login']."',`pass`='".$_POST['password']."',`email`='".$_POST['adress']."',`role`='".$_POST['role']."',`phone`='".$_POST['phone']."' WHERE `id` = ".$_GET['id'];
			
		//echo $sql3;	
		$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
		$id_auto=mysqli_insert_id($link);
		
		
		echo "<p>Информация изменена!</p>";
		
		
		}
?>
<?
	$sql="SELECT * FROM `users` 
	where id=".$_GET['id']."";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!->".$sql);
		$rows=mysqli_fetch_assoc($result);
?>
<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
 
  <input type="hidden" name="save" value="1">
  <div class="form-group">
    <label for="label">ФИО</label><br>
    <input type="text" name="label" class="form-control" value="<?=$rows['fio'] ?>" required>
  </div>
  <div class="form-group">
    <label for="label">Телефон</label><br>
    <input type="text" name="phone" class="form-control" value="<?=$rows['phone'] ?>"required>
  </div>
 <div class="form-group">
    <label for="label">e-mail</label><br>
    <input type="text" name="adress" class="form-control" value="<?=$rows['email'] ?>">
  </div>
  <div class="form-group">
    <label for="label">Логин</label><br>
    <input type="text" name="login" class="form-control" value="<?=$rows['login'] ?>">
  </div>
  <div class="form-group">
    <label for="label">Пароль</label><br>
    <input type="text" name="password" class="form-control" value="<?=$rows['pass'] ?>">
  </div>
  
  <div class="form-group">
    <label for="status">Роль в системе</label>
	<select name="role" class="form-control">
			<option value="1">Администратор</option>
			<option value="0">Сотрудник</option>

   </select>

  <button type="submit" class="btn btn-primary">Изменить</button>
</form>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		





  