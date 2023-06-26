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


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		
  