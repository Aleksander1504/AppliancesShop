<?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавление сотрудника</h2>

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
					<h3>Все сотрудники</h3>
				<h3>Сотрудники</h3>
 <a id="center"></a>
 <?
	if ($_POST['delete']!="")
  
  {
	$sql="UPDATE `shtat` SET `date_uv`=NOW() WHERE `tab_s`=".$_POST['delete'];
	$result=mysqli_query( $link,$sql) or die ("Query failed!");
	
	
	
	echo "Сотрудник уволен!";
  }
 ?>
 <button type='button' class="btn btn-primary" onclick="location.href='add.php#center'"style='margin:10px auto;'>Добавить сотрудника</button><br><br>
 <h1>Текущие сотрудники</h1>
<?
	$sql="SELECT * FROM `sotrudnik`, otdel, doljnost,shtat
where tab=tab_s and id_otd=id_o and id_d=id_dolj
and date_uv is NULL
Order by name_otd ASC, `FIO` ASC";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
		 $i=1;
		  echo "<table>";
			echo "<tr><th>№</th><th>ФИО</th><th>Дата рождения</th><th>Отдел</th><th>Должность</th><th colspan='3'>Действие</th></tr>";
			while ($rows=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td><a href='info.php?id=".$rows['tab']."#center'>".$i."</a></td><td><a href='info.php?id=".$rows['tab']."#center'>".$rows['FIO']."</a></td>
				<td>".date("d.m.Y",strtotime($rows['date_birth']))."</td>
				<td>".$rows['name_otd']."</td>
				<td>".$rows['name_dolj']."</td>
				";
				
				?>
	 <td>
	 <form method='post' action=''><button type='button' class="btn btn-primary" onclick="location.href='update.php?id=<?echo $rows['tab'] ?>#center'"style='margin:10px auto;'>Изменить</button></form></td>
	 <td>
	 <form method='post' action=''><button type='button' class="btn btn-primary" onclick="location.href='perevod.php?id=<?echo $rows['tab'] ?>#center'"style='margin:10px auto;'>Перевод</button></form></td>
	 <?
	 echo "<td><form method='post' action=''><input type='hidden' name='delete' value='".$rows['tab']."'><button type='submit' class='btn btn-primary' style='margin:10px auto;'>Уволить</button></form></td></tr>";
			$i++;
			} 
		echo "</table>";
		}
		 else
			echo "Записей нет!";

	
?>
<h1>Уволенные сотрудники</h1>
<?
	$sql="SELECT * FROM `sotrudnik`, otdel, doljnost,shtat
where tab=tab_s and id_otd=id_o and id_d=id_dolj
and date_uv is not NULL and tab not in (SELECT `tab_s` FROM `shtat` WHERE `date_uv` is NULL)
Order by name_otd ASC, `FIO` ASC";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
		 $i=1;
		  echo "<table>";
			echo "<tr><th>№</th><th>ФИО</th><th>Дата рождения</th><th>Отдел</th><th>Должность</th><th colspan='3'>Действие</th></tr>";
			while ($rows=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td><a href='info.php?id=".$rows['tab']."#center'>".$i."</a></td><td><a href='info.php?id=".$rows['tab']."#center'>".$rows['FIO']."</a></td>
				<td>".date("d.m.Y",strtotime($rows['date_birth']))."</td>
				<td>".$rows['name_otd']."</td>
				<td>".$rows['name_dolj']."</td>
				";
				
				?>
	 <td>
	 <form method='post' action=''><button type='button' class="btn btn-primary" onclick="location.href='update.php?id=<?echo $rows['tab'] ?>#center'"style='margin:10px auto;'>Изменить</button></form></td>
	 <td>
	 <form method='post' action=''><button type='button' class="btn btn-primary" onclick="location.href='perevod.php?id=<?echo $rows['tab'] ?>#center'"style='margin:10px auto;'>Перевод</button></form></td>
	 <?
	 echo "<td><form method='post' action=''><input type='hidden' name='delete' value='".$rows['tab']."'><button type='submit' class='btn btn-primary' style='margin:10px auto;'>Уволить</button></form></td></tr>";
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