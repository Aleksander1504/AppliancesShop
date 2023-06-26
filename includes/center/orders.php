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
 
 
    $sql="SELECT orders.id_order as id_or, number, count, `date`,`status`,fio, id_good FROM items_in_order, orders,user, goods
where 
id_good=item
and user=user.id and items_in_order.id_order=orders.id_order
Group by orders.id_order, number, `date`,`status`,fio
Order by `date` DESC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    echo "<h1>Список заказов</h1>";
	
    
	echo "<form method='post' action=''>";
	echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th style='width:10%'>Номер заказа</th><th>Покупатель</th><th>Дата</th><th>Статус</th><th>Действия</th></tr>";
    
	$i=1;
	$sum=0;
    while ($myrow = mysqli_fetch_assoc($result)) {
	$sql_2 = "SELECT `price` FROM `prices`, `goods`
Where prices.id_good = goods.id_good and prices.id_good = ".$myrow['id_good']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2!");
$prices = mysqli_fetch_assoc($result_2);

	
	$date=date("d.m.Y H:i:s",strtotime($myrow['date']));
	
	 echo "<tr>";
	
     echo "<td style='width:5%'>".$i."</td><td style='width:10%'>".$myrow['number']."</td><td>".$myrow['fio']."</td><td>".$date."</td><td>".status($myrow['status'])."</td><td>
	 <form method='post' action=''><input class='form-control' type='hidden' name='update' value='".$myrow['id_good']."'>
	 ";
	 echo "<select class='form-control'  name='status' style='width: 150px;'>";
	 for ($ii=1; $ii<5;$ii++)
		{
		  echo "<option value=".$ii.">".status($ii)."</option>";
			
		}
	 echo "</select>";	
	 echo "<form method='post' action=''><input class='form-control' type='hidden' name='update' value='".$myrow['id_or']."'><button class='btn btn-primary' type='submit' style='margin:10px auto;'>Изменить</button></form>	</td>";
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
						$sql_3 = "SELECT `price` FROM `prices`, `goods`
						Where prices.id_good = goods.id_good and prices.id_good = ".$items['id_good']."
						Order By `date_added` DESC";
						$result_3 = mysqli_query($link,$sql_3) or die ("Query failed 3!");
						$price = mysqli_fetch_assoc($result_3);
					
						echo '<tr>';
						echo '<td>'.$k.'</td><td><a href="products.php?id='.$items['id_good'].'">'.$items['name_good'].'</a></td><td>'.$price['price'].' руб.</td><td>'.$items['count'].'</td><td>'.$price['price']*$items['count'].' руб.</td>';
						echo '</tr>';
						$k++;
					}
				echo '</table>';
	  
	  echo "</td></tr>";
	 $i++;
    }
	echo "</table>";
	
	
	
	
   }
   else
	echo "Список заказов пуст!";
?>

