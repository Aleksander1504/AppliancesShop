  <a id="center"></a>
  <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавление клиента</h2>

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
					
		$sql3="INSERT INTO `client`(`FIO`, `adress_cl`, `phone_cl`) VALUES  ('".$_POST['label']."','".$_POST['adress']."','".$_POST['phone']."')";
		//echo $sql3;	
		$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
		$id_auto=mysqli_insert_id($link);
		
		
		echo "<p>Информация о клиенте добавлена!</p>";
		
		
		}
?>

<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
 
  <input type="hidden" name="save" value="1">
  <div class="form-group">
    <label for="label">ФИО (название) клиента</label><br>
    <input type="text" name="label" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="label">Адрес</label><br>
    <input type="text" name="adress" class="form-control">
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
		





  