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


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		
  