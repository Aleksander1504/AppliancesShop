

<?php

function status($n){
switch ($n) {
	case 1: return "Новый заказ"; break;
	case 2: return "Заказ выполнен"; break;
	case 3: return "Заказ отменен"; break;
	case 4: return "Заказ отменен пользователем"; break;
}

}
  if ($_POST['update']!="")
  
  {
	$sql="UPDATE `orders` SET `status`=".$_POST['status']." WHERE `id_order`=".$_POST['update'];
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	echo "Статус заказа обновлен!";
  }
 
     $sql="SELECT orders.id_order as id_or, number, count, `date`,`status`,fio, id_good FROM items_in_order, orders,client, goods
where 
id_good=item
and cl=client.id_cl and items_in_order.id_order=orders.id_order and cl=".$_SESSION['user_id'].
" 

Order by `date` DESC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!-->".$sql);
     if (mysqli_num_rows($result))  {
 	echo '<div class="cart-main-area bg__white" >
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-10 col-xs-10">';
    
	echo '<div class="table-content table-responsive">';
	echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th style='width:10%'>Номер заказа</th><th>Дата</th></tr>";
    
	$i=1;
	$sum=0;
    while ($myrow = mysqli_fetch_assoc($result)) {
	$sql_2 = "SELECT `price` FROM `warehouse`, `goods`
Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$myrow['id_good']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2!");
$warehouse = mysqli_fetch_assoc($result_2);

	
	$date=date("d.m.Y H:i:s",strtotime($myrow['date']));
	
	 echo "<tr>";
	
     echo "<td style='width:15%'>".$i."</td><td style='width:40%'>".$myrow['number']."</td><td>".$date."</td>
	 ";
	
	  echo "</tr>";
	  
	  echo "<tr><td colspan='7'>";
		    $sql2="SELECT * FROM items_in_order, goods
			where goods.id_good=item 
			and items_in_order.id_order=".$myrow['id_or']."
			
			";
	//echo $sql2;
			$result2=mysqli_query($link, $sql2) or die ("Query failed!");
				echo '<table>';
				$k=1;
					while ($items = mysqli_fetch_assoc($result2)) {
						$sql_3 = "SELECT `price` FROM `warehouse`, `goods`
						Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$items['id_good']."
						Order By `date_added` DESC";
						$result_3 = mysqli_query($link,$sql_3) or die ("Query failed 3!");
						$price = mysqli_fetch_assoc($result_3);
					
						echo '<tr>';
						echo '<td>'.$k.'</td><td><a href="products.php?id='.$items['id_good'].'"><img src="'.$items['img'].'" style="height: 100px;"></a></td><td><a href="products.php?id='.$items['id_good'].'">'.$items['name_good'].'</a></td><td>'.$items['price_new'].' руб.</td><td>'.$items['count'].'</td><td>'.$items['price_new']*$items['count'].' руб.</td>';
						echo '</tr>';
						$k++;
					}
				echo '</table>';
	  
	  echo "</td></tr>";
	 $i++;
    }
	echo "</table>";
	
	echo '        		</div>
					</div>
                </div>
            </div>
        </div>';
	
	
   }
   else
	echo "Список заказов пуст!";
 
 
?>

