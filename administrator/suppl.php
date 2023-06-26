  <a id="center"></a>
  <?php require('header.php'); ?>
   <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Все поставки товаров</h2>

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
  
    $sql="select * from goods, warehouse,supplier, users
where warehouse.id_good = goods.id_good and id_supp = id_s and id = user
order by date_added DESC, name_good ASC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    
	
    
	echo "";
	echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
	echo "<tr><th style='width:10%'>№</th><th>Название товара</th><th>Цена</th><th>Количество</th><th>Номер поставки</th><th>Дата поставки</th><th>Поставщик</th><th>Сотрудник склада</th></tr>";
    
	$i=1;
	$sum=0;
	$cat="";
    while ($myrow = mysqli_fetch_assoc($result)) {
	
	 echo "<tr>";
	
     echo "<td style='width:10%'>".$i."</td><td>".$myrow['name_good']."</td><td>".$myrow['price']."</td><td>".$myrow['count_w']."</td><td>".$myrow['number']."</td><td>".date("d.m.Y",strtotime($myrow['date_added']))."</td><td>".$myrow['name_s']."</td><td>".$myrow['fio']."</td>
	 ";
	 
	  echo "</tr>";
	 $i++;
    }
	echo "</table>";
	
	
	
	
   }
   else
	echo "Ваша корзина пуста!";
?>


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		