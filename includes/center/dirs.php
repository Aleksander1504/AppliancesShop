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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product__menu">
                                   <a href="dirs.php" class="is-checked">Все</a>
                                    <?php
											   $sql="SELECT * FROM dirs order by name_group ASC";
												//echo $sql;
												$result = mysqli_query($link,$sql) or die ("Query failed");
												$num=0;
if (mysqli_num_rows($result)==0)
														echo "Категорий не найдено!";
													else 
	while ($dirs=mysqli_fetch_assoc($result)) {
	$active='';
     if ($dirs['id_group']==$_GET['id'])
		$active='class="is-checked"';
echo '<a href="dirs.php?id='.$dirs['id_group'].'"" '.$active.'>'.$dirs['name_group'].'</a>';}
													
												?>
									
									
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

<?

 if(isset($_GET["id"])) {
   if (!is_int($_GET["id"]))
   {
    $group_id = htmlspecialchars($_GET["id"]);	
		
	
	$sql="select * from goods, dirs
Where goods.`id_group`=dirs.`id_group` and dirs.id_group=".$group_id." Order by name_good ASC";
	
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
														';
														if ($products['price_old']!=0 && $products['price_old']!=$products['price_new'])
															echo '<li class="old__price">'.$products['price_old'].' рублей</li>';
														echo '
                                                            <li class="new__price">'.$products['price_new'].' рублей</li>
                                                        </ul>
                                                    </div>
													
                                                </div>
											 </div>

									   ';
		
  }
	
   }
   else
	die("Параметр не является числом!");
  }
    ?>
	</div>
 </div>	
  <?
  }
  
else 
   {
    $group_id = htmlspecialchars($_GET["id"]);	
		
	
	$sql="select * from goods, dirs
Where goods.`id_group`=dirs.`id_group`
Order by name_good ASC
";
	
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
														';
														if ($products['price_old']!=0 && $products['price_old']!=$products['price_new'])
															echo '<li class="old__price">'.$products['price_old'].' рублей</li>';
														echo '<li class="new__price">'.$products['price_new'].' рублей</li>
                                                        </ul>
                                                    </div>
													
                                                </div>
											 </div>

									   ';
		
  }
	    ?>
	</div>
 </div>	
  <?
   }
   else
	die("Параметр не является числом!");
  }


   
   ?>				<!--div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                <a href="#">Загрузить больше</a>
                            </div>
                        </div>
                    </div-->
   
                   </div>
            </div>
        </section>