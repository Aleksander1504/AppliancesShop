<?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Клиенты</h2>

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
	if ($_POST['delete']!="")
  
  {
	$sql="DELETE FROM `client` WHERE `id_cl` = ".$_POST['delete'];
	$result=mysqli_query( $link,$sql) or die ("Query failed!");
	
	
	
	echo "Запись удалена!";
  }
 ?>
 <button type='button' class="btn btn-primary" onclick="location.href='add_cl.php#center'"style='margin:10px auto;'>Добавить</button><br><br>
<?
	$sql="SELECT * FROM `client`
Order by `FIO` ASC";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
		 $i=1;
		  echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
			echo "<tr><th>№</th><th>ФИО (Название)</th><th>Телефон</th><th>Адрес</th><th colspan='2'>Действие</th></tr>";
			while ($rows=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td>".$i."</td><td>".$rows['FIO']."</td><td>".$rows['phone_cl']."</td><td>".$rows['adress_cl']."</td>";
				
				?>
	 <td>
	 <form method='post' action=''><button type='button' class="btn btn-primary" onclick="location.href='update_cl.php?id=<?echo $rows['id_cl'] ?>#center'"style='margin:10px auto;'>Изменить</button></form></td>
	 <?
	 echo "<td><form method='post' action=''><input type='hidden' name='delete' value='".$rows['id_cl']."'><button type='submit' class='btn btn-primary' style='margin:10px auto;'>Удалить</button></form></td></tr>";
			$i++;
			} 
		echo "</table>";
		}
		 else
			echo "Записей нет!";

	
?>


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>