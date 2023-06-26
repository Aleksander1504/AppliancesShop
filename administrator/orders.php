  <a id="center"></a>
  <?php require('header.php'); ?>
   <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Все отгрузки товаров</h2>

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
  
    /*$sql="select * from goods, warehouse,supplier, users
where warehouse.id_good = goods.id_good and id_supp = id_s and id = user
order by date_added DESC, name_good ASC";*/
    $sql="select * from orders,client, users
where cl = id_cl and id = user
order by `date` DESC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    
	
    
	echo "";
	echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
	echo "<tr><th style='width:10%'>№</th><th>Номер отгрузки</th><th>Дата</th><th>Клиент</th><th>Сотрудник склада</th></tr>";
    
	$i=1;
	$sum=0;
	$cat="";
    while ($myrow = mysqli_fetch_assoc($result)) {
	
	 echo "<tr>";
	
     echo "<td style='width:10%'>".$i."</td><td>".$myrow['number']."</td><td>".date("d.m.Y",strtotime($myrow['date']))."</td><td>".$myrow['FIO']."</td><td>".$myrow['fio']."</td>
	 ";
	 
	  echo "</tr>";
	  echo "<tr><td colspan='5'>";
	  
		$sql2="select * from items_in_order, goods where item=goods.id_good and id_order='".$myrow['id_order']."' Order by name_good ASC";
	//echo $sql;
	$result2=mysqli_query($link, $sql2) or die ("Query failed!-->".$sql2);
     if (mysqli_num_rows($result2))  {
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
		echo "<tr><th style='width:10%'>№</th><th>Название товара</th><th>Количество</th><th>Цена</th><th>Стоимость</th></tr>";
    
	$j=1;
	$sum=0;
    while ($myrow2 = mysqli_fetch_assoc($result2)) {
		$sql_2 = "SELECT `price` FROM `warehouse`
		Where id_good = ".$myrow2['id_good']."
		Order By `date_added` DESC";
		$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2-->".$sql_2);
		$prices = mysqli_fetch_assoc($result_2);
				echo "<tr id='product_".$myrow2['id_good']."'>";
				 $sum+=$prices['price']*$myrow2['count'];
				 echo "<td style='width:10%'>".$j."</td><td>".$myrow2['name_good']."</td><td>".$myrow2['count']."</td><td>".$prices['price']."</td><td><span class='tot_".$myrow2['id_good']."'>".$prices['price']*$myrow2['count']."</span></td>";
				  echo "</tr>";	
		
			 $j++;
			}
		echo "</table>";
	}
	  
	  echo "</td></tr>";
	  echo "<tr><td colspan='5'>";
	  
	  
	  echo "</td></tr>";
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
		