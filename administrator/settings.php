 <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Настройки мониторинга цен</h2>

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
		$sql="SELECT * FROM `settings`";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
			$sql3="Delete from `settings`";
				//echo $sql3;	
				$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
			foreach ($_POST as $key => $value) {
			   if ($key!='save') {
			   
				$sql3="INSERT INTO `settings`(`descr`, `value`) VALUES  ('".$key."','".$value."')";
				//echo $sql3;	
				$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
				}
			}	
				
		 }
		 else
			{
			  foreach ($_POST as $key => $value) {
			   if ($key!='save') {
			   
				$sql3="INSERT INTO `settings`(`descr`, `value`) VALUES  ('".$key."','".$value."')";
				//echo $sql3;	
				$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
				}
			//$result3 = mysqli_query ($link,$sql3) or die ("Query failed3!");
			}
			}
		
		
		
		echo "<p>Настройки добавлены!</p>";
		
		
		}
?>

 <h2>Список конкурентов</h2>
<?
	$sql="SELECT * FROM `competitors`";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
		 $i=1;
		  echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
			echo "<tr><th>№</th><th>Название</th><th>Сайт</th></tr>";
			while ($rows=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td>".$i."</td><td>".$rows['name_comp']."</td><td>".$rows['site_comp']."</td>";
				

	 echo "</tr>";
			$i++;
			} 
		echo "</table>";
		}
		 else
			echo "Записей нет!";

	
?>

                </div>
				
				<hr>
				 <h2>Настройки</h2>
				 <?
					$sql="SELECT * FROM `settings`";	
					//echo $sql;
					$result = mysqli_query($link, $sql) or die ("Query failed!");
					 if (mysqli_num_rows($result)>0){
							$rows=mysqli_fetch_assoc($result);
							$price=$rows['value'];
							
							$rows=mysqli_fetch_assoc($result);
							$comp=$rows['value'];
							
							
					 
					 }
				 ?>
				 <div class="control-group">
				    <form method="post">
					  <input type="hidden" name="save" value="1">
					  <div class="form-group">
						  <fieldset>
							<legend>Выставить цену</legend>
							
							<input type="radio" name="price" value="min" <?if ($price=='min') echo "checked"?>>
							<label style="margin:0px 10px">Минимальную</label>
							<input type="radio" name="price" value="max"<?if ($price=='max') echo "checked"?>><label style="margin:0px 10px">Максимальную</label>
							<input type="radio" name="price" value="avg"<?if ($price=='avg') echo "checked"?>><label style="margin:0px 10px">Среднюю</label>
						  </fieldset>
					   </div>
					   <div class="form-group">
						  <fieldset>
							<legend>Мониторинг конкурента</legend>
							<?
							$sql="SELECT * FROM `competitors`";	
								//echo $sql;
								$result = mysqli_query($link, $sql) or die ("Query failed!");
								 if (mysqli_num_rows($result)>0){
									$str="";
								    $checked = "checked";
									while ($rows=mysqli_fetch_assoc($result)) {
									if ($rows['id_comp']==$comp) 
									    $checked = "checked";
									else
										 $checked = "";
										$str.=$rows['id_comp'].";";
										echo '<input type="radio" name="competitors" value="'.$rows['id_comp'].'" '.$checked.'>
							<label style="margin:0px 10px">'.$rows['name_comp'].'</label>';
										
										

									} 
									if ($str==$comp) 
									    $checked = "checked";
									else
										 $checked = "";
									echo '<input type="radio" name="competitors" value="'.$str.'" '.$checked.'>
							<label style="margin:0px 10px">Оба</label>';
									}
									
									?>
							
							
							
						  </fieldset>
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

  