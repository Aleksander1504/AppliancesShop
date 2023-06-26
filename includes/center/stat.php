<h1>Статистика продаж</h1>

<?php
	

	
	
?>
<div style = "margin:10px 8px auto;">
<h4>Стоимость заказов по покупателям</h4>
<?php 
$sql="SELECT sum(price*count) as sum, fio
FROM items_in_order, orders,user, goods, prices
where 
goods.id_good=item
and prices.id_good=item
and goods.id_good=prices.id_good
and user=user.id and items_in_order.id_order=orders.id_order

and status=2
Group by fio ASC";
	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed1!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Покупатель</th><th>Стоимость</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$myrow['fio']."</td><td>".$myrow['sum']." руб.</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>

<h4>Стоимость заказов по товарам</h4>
<?php 

$sql="SELECT 
sum(price*count) as sum, name_good
FROM items_in_order, orders,user, goods, prices
where 
goods.id_good=item
and prices.id_good=item
and goods.id_good=prices.id_good
and user=user.id and items_in_order.id_order=orders.id_order

and status=2
group by name_good
Order by name_good ASC";

	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Товар</th><th>Стоимость</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$myrow['name_good']."</td><td>".$myrow['sum']." руб.</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>


<h4>Стоимость заказов по месяцам</h4>
<?php 
$months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
$sql="SELECT orders.id_order as id_or, month(date) as m, sum(price*count) as sum, `date`,`status`,name_good FROM items_in_order, orders,user, goods, prices
where 
goods.id_good=item
and prices.id_good=item
and goods.id_good=prices.id_good
and user=user.id and items_in_order.id_order=orders.id_order and
status=2
Group by m
Order by m ASC";

	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Товар</th><th>Стоимость</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$months[$myrow['m']-1]."</td><td>".$myrow['sum']." руб.</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>

<h4>Средняя стоимость товара за месяц</h4>
<?php 

$sql="SELECT avg(`price`) as avg, name_good 
FROM `prices`, `goods`
Where prices.id_good = goods.id_good
Group by name_good
Order By `name_good` ASC";

	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Товар</th><th>Стоимость</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$myrow['name_good']."</td><td>".round($myrow['avg'],1)." руб.</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>
</div>


  