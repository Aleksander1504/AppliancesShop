  <a id="center"></a>
  <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Изменение поставщика</h2>

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
		
			$sql3="UPDATE `supplier` SET `name_s`='".$_POST['label']."',`adress_s`='".$_POST['adress']."',`inn`='".$_POST['inn']."',`phone_s`='".$_POST['phone']."' WHERE `id_s` = ".$_GET['id'];
			
		//echo $sql3;	
		$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
		$id_auto=mysqli_insert_id($link);
		
		
		echo "<p>Информация изменена!</p>";
		
		
		}
?>
<?
	$sql="SELECT * FROM `supplier` 
	where id_s=".$_GET['id']."";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!->".$sql);
		$rows=mysqli_fetch_assoc($result);
?>
<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
 
  <input type="hidden" name="save" value="1">
  <div class="form-group">
    <label for="label">Название</label><br>
    <input type="text" name="label" class="form-control" value="<?=$rows['name_s'] ?>" required>
  </div>
  <div class="form-group">
    <label for="label">ИНН</label><br>
    <input type="text" name="inn" class="form-control" value="<?=$rows['inn'] ?>">
  </div>
  <div class="form-group">
    <label for="label">Адрес</label><br>
    <input type="text" name="adress" class="form-control" value="<?=$rows['adress_s'] ?>">
  </div>
  <div class="form-group">
    <label for="label">Телефон</label><br>
    <input type="text" name="phone" class="form-control" value="<?=$rows['phone_s'] ?>"required>
  </div>
 
  

  <button type="submit" class="btn btn-primary">Изменить</button>
</form>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		





  