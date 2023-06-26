<?php
if (isset($_POST['add']))
	{
	$sql="select count from carts where `session_id`='".session_id()."' and id_good=".$_POST['add'];
	$result=mysqli_query($link,$sql) or die ("Query failed!-->".$sql);
	
	$count=$_POST['count'];
	if ($count=="")
		$count = 1;
	$num=$count;
		if (mysqli_num_rows($result)>0) {
		 $products=mysqli_fetch_assoc($result);
		 $num=$products['count']+$count;
		 
		 $sql="UPDATE `carts` SET `count`=".$num." WHERE `id_good`=".$_POST['add']." and `session_id`='".session_id()."'";
		 //echo $sql;
	}
	else 
		$sql="INSERT INTO `carts`(`session_id`, `id_good`, count) VALUES ('".session_id()."',".$_POST['add'].", ".$num.")";
	//echo $sql;
	$result=mysqli_query($link,$sql) or die ("Query failed!-->".$sql);
	$result=mysqli_query($link,"select name_good from goods where id_good=".$_POST['add']);
	$myrow = mysqli_fetch_assoc($result);
	echo "<br><br><div><b>Товар ".$myrow['name_good']." добавлен в корзину!</b><br><br><br></div>";
	
	
	}
?>
        <section class="htc__product__area shop__page bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                   
                    

<?

 if(isset($_GET["search"])) {
   
   {
    	
		
	
	$sql="select * from goods, dirs
Where goods.`id_group`=dirs.`id_group` and name_good like '%".$_GET['search']."%' Order by name_good ASC";
	echo "<h1>Вы искали ".$_GET['search']."</h1>";
	
	$result=mysqli_query($link,$sql);

 ?>
  
                      <div class="row">
                        <div class="product__list another-product-style">
  <?    

    
if (mysqli_num_rows($result)>0){
  while ($products=mysqli_fetch_assoc($result))
  {
  
 
	$sql_2 = "SELECT `price` FROM `warehouse`, `goods`
Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$products['id_good']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2-->".$sql_2);
$warehouse = mysqli_fetch_assoc($result_2);
	echo '	
                                        
                                           <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                 
                                                <div class="product foo">
												
                                                    <div class="product__inner">
                                                        <div class="pro__thumb" style="text-align:center;">
                                                            <a href="products.php?id='.$products['id_good'].'">';
												if ($products['img']=="")
													echo '<img src="img/catalog/no-photo.jpg" style="height:100px"></a>';
												else	
													echo '<img src="'.$products['img'].'" style="height:100px"></a>';
                                                        
														echo '</div>
                                                        <div class="product__hover__info">
                                                           <form action="" method="post">
															<input class="form-control" name="add" type="hidden" value="'.$products['id_good'].'">
															<ul class="product__action">
                                                                
                                                               
																<li><input class="btn btn-primary" type="submit" class="btn btn-primary" value="Купить" ></li>
																
                                                                
                                                            </ul>
															</form>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="products.php?id='.$products['id_good'].'"><b>'.$products['name_good'].'</b></a></h2>
                                                        <ul class="product__price">
                                                            <li class="new__price">'.$warehouse['price'].' рублей</li>
                                                        </ul>
                                                    </div>
													
                                                </div>
											 </div>

									   ';
		
  }
	
   }
   else
	echo "Ничего не найдено!";
  }
    ?>
	</div>
 </div>	
  <?
  }
?>
                   </div>
            </div>
        </section>
   
 