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
	echo "<table class='good'>";
	echo "<tr><th style='width:10%'>№</th><th>Название товара</th><th>Цена</th><th>Изменить</th><th>Удалить</th></tr>";
    
	$i=1;
	$sum=0;
	$cat="";
    while ($myrow = mysqli_fetch_assoc($result)) {
	if ($cat!=$myrow['name_group']) {
	echo "<tr><td colspan='3' style='padding:0px 20px; font-weight:600'>".$myrow['name_group']."</td><td>";
	 ?>
	 <form method='post' action=''><button class="btn btn-primary" type='button' onclick="location.href='update_cat.php?id=<?php echo $myrow['id_group'] ?>'"style='margin:10px auto;'>Изменить категорию</button></form></td>
	 <?php
	 echo "<td><form method='post' action=''><input class='form-control' type='hidden' name='delete_cat' value='".$myrow['id_group']."'><button class='btn btn-primary' type='submit' style='margin:10px auto;'>Удалить категорию</button></form></td></tr>";
	 }
	 echo "<tr>";
	
     echo "<td style='width:10%'>".$i."</td><td>".$myrow['name_good']."</td><td>".$myrow['cost']."</td><td>
	 <form method='post' action=''><input class='form-control' type='hidden' name='update' value='".$myrow['id_good']."'>
	 ";
	 ?>
	 <button class="btn btn-primary" type='button' onclick="location.href='update.php?id=<?php echo $myrow['id_good'] ?>'"style='margin:10px auto;'>Изменить товар</button></form>	</td>
	 <?php
	 echo "<td><form method='post' action=''><input class='form-control' type='hidden' name='delete' value='".$myrow['id_good']."'><button class='btn btn-primary' type='submit' style='margin:10px auto;'>Удалить товар</button></form>	</td>";
	  echo "</tr>";
	 $i++;
	 $cat=$myrow['name_group'];
    }
	echo "</table>";
	
	
	
	
   }
   else
	echo "Ваша корзина пуста!";
?>

