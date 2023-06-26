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
          var text = "<option value=''>Выберите товар</option>"; // Начинаем создавать элементы в select
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
                <h2><i class="glyphicon glyphicon-edit"></i>Оформление поставки товара</h2>

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
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	
	echo "Список удален!<br><br><br>";
	

	}	
 if (isset($_POST['new']))
	{
	
		$id = $_SESSION['user'];
		//echo $_SESSION['user']."dfdf";
	    $number = rand(60000,70000);
		
		$sql="INSERT INTO `warehouse`(`id_good`, `id_supp`, `number`, `count_w`, `price`, `user`) VALUES('".$_POST['goods']."','".$_POST['supp']."',".$number.",'".$_POST['count']."','".$_POST['cost']."',".$id.")";
		$result=mysqli_query($link, $sql) or die ("Query failed!-->".$sql);
		
		$sql="UPDATE `goods` SET `count_all`=(`count_all`+".$_POST['count']."), price_new = '".$_POST['cost']."', price_old=0 WHERE`id_good` = ".$_POST['goods'];
		$result=mysqli_query($link, $sql) or die ("Query failed!-->".$sql);
	
		echo "Заказ №".$number." на поставку оформлен!<br>
	
	<br><br>";
	
	

	}
   
	?>
	

	<form  method="post" name="myform" id="myform">
	<input class="form-control" type="hidden" name="new" value="1" />
	<fieldset>
		  
			<div class="form-group">
			<label>Поставщик<span class="red">*</span></label>
			<?php
			$sql="SELECT * FROM `supplier`
Order by `name_s` ASC";
		//echo $sql;
			$result = mysqli_query($link,$sql) or die ("Query failed");
			$num=0;
			echo "<select class='form-control'  name='supp'>";
				if (mysqli_num_rows($result)==0)
					echo "Поставщиков не найдено!";
				else 
					 while ($dirs=mysqli_fetch_assoc($result))	
						echo '<option value="'.$dirs['id_s'].'">'.$dirs['name_s'].'(ИНН:'.$dirs['inn'].')</option>';
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
			<select class='form-control' id='goods' name='goods' class="form-control">
			</select>
			
			
        </div>

		
		<div class="form-group">
			<label for="label">Цена</label><br>
			<input type="text" name="cost" class="form-control">
        </div>
		
		<div class="form-group">
			<label for="label">Количество</label><br>
			<input type="number" name="count" min="1" class="form-control">
		</div>
		   
			
	
	
	<input class='form-control' type='hidden' name='new' value='1'>
	<button class='btn btn-primary' type='submit' style='margin:10px auto;'>Оформить поставку</button>
	</form>
	
	

</div>

  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
