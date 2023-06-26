  <a id="center"></a>
  <?php require('header.php'); ?>
  <script type="text/javascript">
  function getXmlHttp() {
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }
  function change(id) {
    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'suppliers.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("id=" + encodeURIComponent(id)); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
          var sup = JSON.parse(xmlhttp.responseText); // Преобразуем JSON-строку в массив
          var text = ""; // Начинаем создавать элементы в select
          for (var i in sup) {
            /* Перебираем все элемены и создаём набор options */
            text += "<option value='" + i + "'>" + sup[i] + "</option>";
          }
          document.myform.goods.innerHTML = text; // Устанавливаем options в select
        }
      }
    };
  }
</script>	
  
   <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Оформление отгрузки товара</h2>

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
  if (isset($_POST['delete']))
	{
	$sql="DELETE FROM `carts` WHERE `session_id`='".session_id()."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query delete failed!");
	
	
	echo "Список удален!<br><br><br>";
	

	}	
 if (isset($_POST['new']))
	{
	
		$id = $_SESSION['user'];
		//echo $_SESSION['user']."dfdf";
	    $number = rand(60000,70000);
		$sql = "SELECT count_all FROM dirs, goods
		where dirs.id_group=goods.id_group and goods.id_good=".$_POST['goods'];
		$result=mysqli_query($link, $sql);
		$product = mysqli_fetch_assoc($result);
		
		$cnt = $product['count_all'];
		
		if ($_POST['count'] > $cnt)
			{
			 echo "<h2>Остаток на складе меньше требуемого количества!</h2>";
			
			}
		else
			{
				$sql="select sum(count) as cnt from carts where `session_id`='".session_id()."' and id_good=".$_POST['goods'];
				$result=mysqli_query($link,$sql) or die ("Query failed!");
				
				$count=$_POST['count'];
				$num=$count;
					if (mysqli_num_rows($result)>0) {
					 $products=mysqli_fetch_assoc($result);
					 $num=$products['cnt']+$count;
					 if ($num > $cnt)
						echo "<h2>Остаток на складе меньше требуемого количества!</h2>";
					 else {	
						$sql_3="select count from carts where `session_id`='".session_id()."' and cli_ =".$_POST['cl']." and id_good=".$_POST['goods'];
						$result_3=mysqli_query($link,$sql_3) or die ("Query failed_3!");
						if (mysqli_num_rows($result_3)>0)
							$sql_2="UPDATE `carts` SET `count`=".$num." WHERE `id_good`=".$_POST['goods']." and cli_ =".$_POST['cl']." and `session_id`='".session_id()."'";
						else
							$sql_2="INSERT INTO `carts`(`session_id`, `id_good`, `count`, `cli_`) VALUES ('".session_id()."',".$_POST['goods'].", ".$_POST['count'].", ".$_POST['cl'].")";
						$result_2=mysqli_query($link,$sql_2) or die ("Query failed_2!");
						}
					 //echo $sql;
				}
				else {
			
				$sql2="INSERT INTO `carts`(`session_id`, `id_good`, `count`, `cli_`) VALUES ('".session_id()."',".$_POST['goods'].", ".$_POST['count'].", ".$_POST['cl'].")";
	//echo $sql;
				$result2=mysqli_query($link,$sql2) or die ("Query failed2!");
				
	
				echo "Товар добавлен!<br>";
				}
		}
	
	echo "<br><br>";
	
	

	}
	 if (isset($_POST['add']))
		{
			
			$id = $_SESSION['user'];
			
			
			$cl = "";		
			$sql2="select * from carts, goods, client where carts.id_good=goods.id_good and cli_ = id_cl and session_id='".session_id()."'
			Order by id_cl ASC";
	//echo $sql;
			$result2=mysqli_query($link, $sql2) or die ("Query failed!-->".$sql2);
			if (mysqli_num_rows($result2))  { 
			while ($myrow = mysqli_fetch_assoc($result2)) {
					 if ($cl!=$myrow['cli_']) {
					    $number=rand(10000,90000);
						$sql="INSERT INTO `orders`(`number`, `user`, `cl`) VALUES (".$number.",".$id.",".$myrow['cli_'].")";
						$result=mysqli_query($link, $sql) or die ("Query failed 1!-->".$sql);
						$id_order=mysqli_insert_id($link);
					}	
						if ($myrow['count']<=$myrow['count_all']){
							$sql="INSERT INTO `items_in_order`(`id_order`, `item`, `count`) VALUES (".$id_order.",".$myrow['id_good'].",".$myrow['count'].")";
							$result=mysqli_query($link, $sql) or die ("Query failed3!-->".$sql);
							
							$sql="UPDATE `goods` SET `count_all`=(`count_all`-".$myrow['count'].") WHERE`id_good` = ".$myrow['id_good'];
							$result=mysqli_query($link, $sql) or die ("Query failed4!-->".$sql);
						}
						$cl=$myrow['cli_'];
						
						
						
					}
					
					$sql="DELETE FROM `carts` WHERE `session_id`='".session_id()."'";
						//echo $sql;
					$result=mysqli_query($link, $sql) or die ("Query delete failed!");
				}
				else
					echo "Добавьте товар для оформления заказа!";
		}
   
	?>
	

	<form  method="post" name="myform" id="myform">
	<input class="form-control" type="hidden" name="new" value="1" />
	<fieldset>
		  
			<div class="form-group">
			<label>Клиент<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM `client`
Order by `FIO` ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='cl'>";
				if (mysqli_num_rows($result)==0)
					echo "Клиентов не найдено!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result)) {
 					   if ($_POST['cl']==$dirs['id_cl'])
							echo '<option value="'.$dirs['id_cl'].'" selected>'.$dirs['FIO'].'</option>';
					   else
							echo '<option value="'.$dirs['id_cl'].'">'.$dirs['FIO'].'</option>';
					}	
			echo "</select>";
			?>
			</div>
			<div class="form-group">
			<label>Категория товара<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM dirs order by name_group ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='dirs' onchange='change(this.value)'>";
			echo "<option value=''>Выберите категорию товара</option>";
				if (mysqli_num_rows($result)==0)
					echo "Категорий не найдено!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result))	
						echo '<option value="'.$dirs['id_group'].'">'.$dirs['name_group'].'</option>';
			echo "</select>";
			?>
			</div>
			
		<div class="form-group">
			<label for="label">Название товара</label><br>
			<select class='form-control' id='goods' name='goods' class="form-control" required>
				<option value='' disabled>Выберите категорию товара</option>
			</select>
			
			
        </div>

		
				
		<div class="form-group">
			<label for="label">Количество</label><br>
			<input type="number" name="count" min="1" value ="<?=$_POST['count']?>" class="form-control" required>
		</div>
		   
			
	
	<button class='btn btn-info'  type='submit' style='margin:10px auto;'>Добавить товар в заказ</button>
	</form>
	
	<form action="" method="post">
		<input class='form-control' type='hidden' name='delete' value='1'>
		<button class='btn btn-success' type='submit' style='margin:10px auto;'>Очистить корзину</button>	
	</form>
	<hr>
	<?
	//$sql="select * from carts, goods where carts.id_good=goods.id_good and session_id='".session_id()."' and cli_ = ".$_POST['cl'];
	$sql="select * from carts, goods, client where carts.id_good=goods.id_good and cli_ = id_cl and session_id='".session_id()."'
	Order by id_cl ASC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!-->".$sql);
     if (mysqli_num_rows($result))  {
		echo "<h3>Добавленные товары</h3>";
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
		echo "<tr><th style='width:10%'>№</th><th>Клиент</th><th>Название товара</th><th>Количество</th><th>Цена</th><th>Стоимость</th></tr>";
    
	$i=1;
	$sum=0;
    while ($myrow = mysqli_fetch_assoc($result)) {
		$sql_2 = "SELECT `price` FROM `warehouse`
		Where id_good = ".$myrow['id_good']."
		Order By `date_added` DESC";
		$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2-->".$sql_2);
		$prices = mysqli_fetch_assoc($result_2);
			if ($myrow['count']>$myrow['count_all']){
				 echo "<tr id='product_".$myrow['id_good']."'>";
				 $sum+=$prices['price']*$myrow['count'];
				 echo "<td style='width:10%'>".$i."</td><td>".$myrow['FIO']."</td><td>".$myrow['name_good']."</td><td colspan='3'>Товар закончился</td>";
				  echo "</tr>";
			}
			else
				{
					echo "<tr id='product_".$myrow['id_good']."'>";
				 $sum+=$prices['price']*$myrow['count'];
				 echo "<td style='width:10%'>".$i."</td><td>".$myrow['FIO']."</td><td>".$myrow['name_good']."</td><td>".$myrow['count']."</td><td>".$prices['price']."</td><td><span class='tot_".$myrow['id_good']."'>".$prices['price']*$myrow['count']."</span></td>";
				  echo "</tr>";	
				}
			 $i++;
			}
		echo "</table>";
	}
	
	?>
	<form action="" method="post">
		<input class='form-control' type='hidden' name='add' value='1'>
		<button class='btn btn-primary' type='submit' style='margin:10px auto;'>Оформить отгрузку</button>
	</form>
	
	

</div>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
