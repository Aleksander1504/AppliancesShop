

<?php
  if (isset($_POST['delete']))
	{
	$sql="DELETE FROM `carts` WHERE `session_id`='".session_id()."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
	
	
	echo "Корзина очищена!<br><br><br>";
	

	}	
 if (isset($_POST['new']))
	{
	if(!$_SESSION['user_name']){
	
		$sql="INSERT INTO `client`(`FIO`, `phone_cl`, `adress_cl`, `login`, `pass`) VALUES ('".$_POST['name']."','".$_POST['tel']."','".$_POST['adress']."','".$_POST['login']."','".$_POST['pass']."')";
		//echo $sql;
		$result=mysqli_query($link, $sql) or die ("Query failed1!-->".$sql);
		$id=mysqli_insert_id($link);
	}
	else
		$id=$_SESSION['user_id'];
	$number=rand(10000,90000);
	$sql="INSERT INTO `orders`(`number`, `user`, `cl`) VALUES (".$number.",4,".$id.")";
	$result=mysqli_query($link, $sql) or die ("Query failed2!-->".$sql);
	$id_order=mysqli_insert_id($link);
	
	$sql2="select * from carts, goods where carts.id_good=goods.id_good and session_id='".session_id()."'";
	$result2=mysqli_query($link, $sql2) or die ("Query failed!");	
	
	while ($myrow = mysqli_fetch_assoc($result2)) {
		$sql="INSERT INTO `items_in_order`(`id_order`, `item`, `count`) VALUES (".$id_order.",".$myrow['id_good'].",".$myrow['count'].")";
		$result=mysqli_query($link, $sql) or die ("Query failed3!");
	}
	
	
	
	
	
	
	echo "Заказ №".$number." оформлен!<br>
	<p>Логин и пароль для входа: <b>".$_POST['login']." ".$_POST['pass']."</b></p>
	<br><br>";
	
	$sql="DELETE FROM `carts` WHERE `session_id`='".session_id()."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed4!");

	}
 
    $sql="select * from carts, goods where carts.id_good=goods.id_good and session_id='".session_id()."'";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
	 
		echo '<div class="cart-main-area bg__white" >
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Изображение</th>
                                            <th class="product-name">Название</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity">Количество</th>
                                            <th class="product-subtotal">Итог</th>
                                            <th class="product-remove">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
							$i=1;
	$sum=0;
    while ($myrow = mysqli_fetch_assoc($result)) {
	
	    $sql_count = "SELECT count_all FROM dirs, goods
		where dirs.id_group=goods.id_group and goods.id_good=".$myrow['id_good'];
		$result_=mysqli_query($link, $sql_count);
		$product_ = mysqli_fetch_assoc($result_);
		
		$cnt = $product_['count_all'];
		
		
		
		$sql_2 = "SELECT `price` FROM `warehouse`, `goods`
Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$myrow['id_good']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2");
$warehouse = mysqli_fetch_assoc($result_2);
	
	 
	 
	 if ($cnt<$myrow['count']) {
		$err="<span style='color:red;font-size:small;'>Остаток меньше требуемого количества</span>";
		$col = $cnt;
		}
	 else {
		$col = $myrow['count'];
		$err = "";
		}
      if ($myrow['img']=="")
		$img = '<img src="img/catalog/no-photo.jpg">';
	else	
		$img = '<img src="'.$myrow['img'].'">';
	  $sum+=$myrow['price_new']*$myrow['count'];
	   echo  '<tr id="product_'.$myrow['id_good'].'">
                                            <td class="product-thumbnail"><a href="products.php?id='.$myrow['id_good'].'">'.$img.'</a></td>
                                            <td class="product-name"><a href="products.php?id='.$myrow['id_good'].'">'.$myrow['name_good'].'</a></td>
                                            <td class="product-price"><span class="amount">'.$myrow['price_new'].'</span></td>
                                            <td class="product-quantity">'.$err.'<input class="form-control number" type="number" class="number" data-idc="'.$myrow['id_good'].'" min=1 max="'.$cnt.'" name="count" value="'.$col.'" style="width:150px;"></td>
                                            <td class="product-subtotal"><span class="tot_'.$myrow['id_good'].'">'.$myrow['price_new']*$col.'</span></td>
                                            <td class="product-remove"><button class="btn btn-primary" type="button" class="btn" data-id="'.$myrow['id_good'].'">Удалить</button></td>
                                        </tr>';
	 $i++;
    }		
                                    
                                        
                        echo '</tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Итоговая стоимость</h2><br>
                                        <table>
                                            <tbody>
                                                
                                                <tr class="order-total">
                                                    <th>Итого</th>
                                                    <td>
                                                        <strong><span class="amount"><span class="total">'.$sum.'</span></span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>';
	 
   
	
    
	echo "<form method='post' action=''>";

	if(!$_SESSION['user_name']){
	?>
	<fieldset>
		  <legend>Информация о покупателе</legend>
		   
			<label>ФИО<span class="red">*</span></label><input class="form-control" type="text" name="name" required>
			<label>Телефон<span class="red">*</span></label><input class="form-control" type="tel" name="tel" required>
			<label>Адрес<span class="red">*</span></label><input class="form-control" type="text" name="adress" required>
			<label>Логин<span class="red">*</span></label><input class="form-control" type="text" name="login" required>
			<label>Пароль<span class="red">*</span></label><input class="form-control" type="password" name="pass" required>
		</fieldset>
	
	
	<?php
	
	
	}
	
	echo "<input class='form-control' type='hidden' name='new' value='1'>
	<button class='buy__now__btn2' type='submit' style='margin:10px auto;'>Оформить заказ</button>
	</form>";
	
	echo "<form method='post' action=''><button class='buy__now__btn2' type='submit' style='margin:10px auto;'><input class='form-control' type='hidden' name='delete' value='1'>Очистить корзину</button></form>";
   }
   else
	echo "Ваша корзина пуста!";
?>

