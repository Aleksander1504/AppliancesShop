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
<?php
  if ($_POST['delete']!="")
  
  {
	$sql="DELETE FROM `goods` WHERE `id_good`=".$_POST['delete'];
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	echo "Товар удален!";
  }
 
 if ($_POST['delete_cat']!="")
  
  {
	$sql="DELETE FROM `dirs` WHERE `id_group`=".$_POST['delete_cat'];
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	$sql="DELETE FROM `goods` WHERE `id_group`=".$_POST['delete_cat'];
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	echo "Группа удалена!";
  }
  
    $sql="select * from goods, dirs
where goods.`id_group`=dirs.`id_group`
order by `name_group`,name_good ASC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    echo "<h1>Список товаров</h1>";
	
    
	echo "";
	echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
	echo "<tr><th style='width:10%'>№</th><th>Название товара</th><th>Изменить</th><th>Удалить</th></tr>";
    
	$i=1;
	$sum=0;
	$cat="";
    while ($myrow = mysqli_fetch_assoc($result)) {
	if ($cat!=$myrow['name_group']) {
	echo "<tr><td colspan='2' style='padding:0px 20px; font-weight:600'>".$myrow['name_group']."</td><td>";
	 ?>
	 <form method='post' action=''><button class="btn btn-primary" type='button' onclick="location.href='update_cat.php?id=<?php echo $myrow['id_group'] ?>'"style='margin:10px auto;'>Изменить категорию</button></form></td>
	 <?php
	 echo "<td><form method='post' action=''><input class='form-control' type='hidden' name='delete_cat' value='".$myrow['id_group']."'><button class='btn btn-primary' type='submit' style='margin:10px auto;'>Удалить категорию</button></form></td></tr>";
	 }
	 echo "<tr>";
	
     echo "<td style='width:10%'>".$i."</td><td>".$myrow['name_good']."</td><td>
	 <form method='post' action=''><input class='form-control' type='hidden' name='update' value='".$myrow['id_good']."'>
	 ";
	 ?>
	 <button class="btn btn-primary" type='button' onclick="location.href='update_goods.php?id=<?php echo $myrow['id_good'] ?>'"style='margin:10px auto;'>Изменить товар</button></form>	</td>
	 <?php
	 echo "<td><form method='post' action=''><input class='form-control' type='hidden' name='delete' value='".$myrow['id_good']."'><button class='btn btn-primary' type='submit' style='margin:10px auto;'>Удалить товар</button></form>	</td>";
	  echo "</tr>";
	 $i++;
	 $cat=$myrow['name_group'];
    }
	echo "</table>";
	
	
	
	
   }
   else
	echo "Список товаров пуст!";
?>


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		