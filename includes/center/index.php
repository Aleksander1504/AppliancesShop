    <?
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

    <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-md-12 col-lg-12 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/new1.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    
                                                    <div class="slider__btn">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/new2.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>Стильная техника <span class="text--theme">Haier</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="dirs.php">Купить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">

					</div>
                    
                </div>
            </div>
        </section>
 
        <section class="htc__product__area bg__white" style="padding-top:25px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                                                <div class="categories-menu mrg-xs">
                            <div class="category-heading">
                               <h3> Категории</h3>
                            </div>
                            <div class="category-menu-list">
								<ul>
									<?php
											   $sql="SELECT * FROM dirs order by name_group ASC";
												//echo $sql;
												$result = mysqli_query($link,$sql) or die ("Query failed");
												$num=0;
if (mysqli_num_rows($result)==0)
														echo "Категорий не найдено!";
													else 
	while ($dirs=mysqli_fetch_assoc($result))	
echo '<li><a href="dirs.php?id='.$dirs['id_group'].'">'.$dirs['name_group'].'</a></li>';													
												?>
								</ul>
							</div>
                        </div>
                    
					
                    </div>
                    <div class="col-md-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                               
                                <h2>Новые поступления</h2>
                            </div>
                            <div class="tab-content another-product-style jump">
								<div class="tab-pane active" id="home1">
                                   <div class="row"> 
										<div class="product-slider-active owl-carousel">
							   <?php
							$sSQL = "SELECT * FROM dirs, goods
							where dirs.id_group=goods.id_group
							Order by date_add DESC
							limit 0,6";

							$result = mysqli_query($link,$sSQL) or die ("Query failed!-->".$sSQL);


							  while ($products=mysqli_fetch_assoc($result))
							  {
								$sql_2 = "SELECT `price` FROM `warehouse`, `goods`
							Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$products['id_good']."
							Order By `date_added` DESC";
							$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2-->".$sql_2);
							$prices = mysqli_fetch_assoc($result_2);
								
								echo '	
                                        
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">  
                                                <div class="product">
												
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
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
								</div>	
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="only-banner ptb--100 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <a href="about.php"><img src="images/slider/bg/2.jpg" alt="Услуги"></a>
                </div>
            </div>
        </div>

       
     
       
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Новости</h2>
                            <p>Представляем Вашему вниманию самые свежие новости</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <?
							$months = array(
							 "янв",
							 "фев",
							 "мар",
							 "апр",
							 "мая",
							 "июн",
							 "июл",
							 "авг",
							 "сен",
							 "окт",
							 "ноя",
							 "дек"
							);
							
							$sql="SELECT fio, news_table.id as ids, name,image, date_news FROM `news_table`,users
							Where users.id=user
					order by `date_news` DESC
					Limit 0,3";	
							//echo $sql;
							$result = mysqli_query($link, $sql) or die ("Query failed!");
							 if (mysqli_num_rows($result)>0){
								while ($rows=mysqli_fetch_assoc($result)) {
									echo '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="news.php?id='.$rows['ids'].'">
                                            <img src="'.$rows['image'].'"">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
											
                                                <span class="date">'.date("d",strtotime($rows['date_news'])).'</span>
                                                <span class="month">'.$months[date("n",strtotime($rows['date_news']))-1].'</span>
												
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="news.php?id='.$rows['ids'].'">'.$rows['name'].'</a></p>
                                            <ul class="bl__meta">
                                                <li>Автор :'.$rows['fio'].'</li>
                                                
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="news.php?id='.$rows['ids'].'">Читать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
								}
							 
							 }
						
						?>
						
                        
                        
						
                        
                    </div>
                </div>
            </div>
        </section>

     