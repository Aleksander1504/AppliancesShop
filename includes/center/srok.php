<h1>Срок хранения у товаров</h1>

<?php
	

	
	
?>
<div style = "margin:10px 8px auto;">
<h4>Товары с истекающим сроком хранения</h4>

<?php 

$sql="SELECT `id_group`, `name_good`, `date_izg`, `srok`, `img`, `description`, `date_add`, DATE(DATE_ADD(`date_izg`, INTERVAL `srok` DAY)) as srok_hr
FROM `goods` 
WHERE DATE(DATE_ADD(`date_izg`, INTERVAL `srok` DAY))<DATE(DATE_ADD(CURRENT_DATE, INTERVAL 10 DAY))
Order by srok_hr DESC";

	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Товар</th><th>Дата изготовления</th><th>Срок годности до</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$myrow['name_good']."</td><td>".date("d.m.Y",strtotime($myrow['date_izg']))."</td><td>".date("d.m.Y",strtotime($myrow['srok_hr']))."</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>
<h4>Срок хранения товаров</h4>

<?php 

$sql="SELECT `id_group`, `name_good`, `date_izg`, `srok`, `img`, `description`, `date_add`, DATE(DATE_ADD(`date_izg`, INTERVAL `srok` DAY)) as srok_hr
FROM `goods` 
Order by name_good ASC";

	//echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed!");
if (mysqli_num_rows($result))  {
echo "<table class='good'>";
	echo "<tr><th style='width:5%'>№</th><th>Товар</th><th>Дата изготовления</th><th>Срок годности до</th></tr>";
	$i=1;
while ($myrow = mysqli_fetch_assoc($result)) {
	 echo "<tr>";
     echo "<td style='width:5%'>".$i."</td><td>".$myrow['name_good']."</td><td>".date("d.m.Y",strtotime($myrow['date_izg']))."</td><td>".date("d.m.Y",strtotime($myrow['srok_hr']))."</td>";
	 echo "</tr>";
	 $i++;
}
	echo "</table>";
}
else
	echo "Нет заказов!";
?>
</div>


  