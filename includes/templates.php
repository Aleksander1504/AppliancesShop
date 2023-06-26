<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Интернет-магазин бытовой и компьютерной техники</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/core.css">

    <link rel="stylesheet" href="css/shortcode/shortcodes.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/responsive.css">
  
    <link rel="stylesheet" href="css/custom.css">



    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

	

<script src = "http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){ 
 
 $('.btn').click (function(){ // кликаем по кнопке 
           var btn = $(this); // кликнутая кнопка в переменной
           var id=btn.attr('data-id');// получаем id товара
		   
        var action ="2"; // переменная $action = $_POST['action'];
 $.ajax({
             type: "POST",
             url: "carthelper.php", // страница обработчика
              data: {id: id, action:action}, // передаём id и код операции -2
         }).done (function(data){ 
                  btn.parents('#product_'+id).remove();
				  $('.total').html(data);
              });
 });  
	$('.number').change (function(){ 
		var num = $(this);
		var id=num.attr('data-idc');
		var count=num.val();
		 var action ="1"; // переменная $action = $_POST['action'];
			 $.ajax({
						 type: "POST",
						 url: "carthelper.php", // страница обработчика
						  data: {id: id, action:action, count:count},
						 
						  // передаём id и код операции -2
					 }).done (function(data){ 
							   data=$.parseJSON(data);
							   $('.tot_'+id).html(data[0]);
							   $('.total').html(data[1]);
						  });
			 });  
});
</script>

<script>
	$('#enter').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})
		
	
</script>
    
   
	
</head>
<body>
   
    
    <div class="wrapper fixed__footer">
        
        <header id="header" class="htc-header header--3 bg__white">
            
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="">
                                    <img src="images/logo.jpg" alt="logo" style="height:100px">
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
								<li><a href="index.php">Главная</a></li>
								<li><a href="about.php">О нас</a></li>
								<li class="drop"><a href="dirs.php">Каталог</a>
									<ul class="dropdown">
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
								  </li>	
								<li><a href="news.php">Новости</a></li>
								<li><a href="guest.php">Обратная связь</a></li>
								
                                   
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.php">Главная</a></li>
										<li><a href="about.php">О нас</a></li>
								<li class="drop"><a href="dirs.php">Каталог</a>
									<ul class="dropdown">
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
								  </li>	
								<li><a href="news.php">Новости</a></li>
								<li><a href="guest.php">Обратная связь</a></li>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                       
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra main__menu">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                
								<?php if($_SESSION['user_name']){
									echo '<li class="drop"><span class="ti-user"></span>';
									?>
									   <ul class="private_menu dropdown">
										<li><a href="private.php">Информация</a></li>
										<li><a href="my_orders.php">Заказы</a></li>
										<li><a href="exit.php">Выйти</a></li>
										</ul>
										
										</li>
										
										<li><a href="exit.php"><span class="ti-close" title="Выход"></span></a></li>
									 <?php
										}
										 else
											echo '<li><a href="enter.php"><span class="ti-user"></span></a>
								</li>';
									 ?>	
										
								
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
         
        </header>
       
        
        <div class="body__overlay"></div>
        
        <div class="offset__wrapper">
            
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Найти товар... " name ="search" type="text" required>
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        
                            <?
								$sql="select * from carts, goods where carts.id_good=goods.id_good and session_id='".session_id()."'";
	//echo $sql;
								$result=mysqli_query($link, $sql) or die ("Query failed!");
								 if (mysqli_num_rows($result))  {
									while ($myrow = mysqli_fetch_assoc($result)) {
										echo '<div class="shp__single__product">';
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
								
								 
								 $sum+=$myrow['price_new']*$myrow['count'];
								 
								 echo '<div class="shp__pro__thumb">
                                <a href="products.php?id='.$myrow['id_good'].'">';
										if ($myrow['img']=="")
											echo '<img src="img/catalog/no-photo.jpg" style="width:250px">';
										else	
											echo '<img src="'.$myrow['img'].'" style="width:250px">';
                                echo '</a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="products.php?id='.$myrow['id_good'].'">'.$myrow['name_good'].'</a></h2>
                                <span class="quantity">Количество: '.$myrow['count'].'</span>
                                <span class="shp__price">Цена: '.$myrow['price_new'].'</span>
                            </div>
                            ';
								 
								 $i++;
								 echo "</div>";
								}
								 
								 }
								 
								 else
									echo "Корзина пуста";
							
							?>
							
				                      
                        
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Итого:</li>
                        <li class="total__price"><?=$sum?></li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">Просмотр корзины</a></li>
                       
                    </ul>
                </div>
            </div>
        
        </div>
       
	   
	   <?
	   $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	  if (substr_count($_SERVER['REQUEST_URI'], 'index') ||$_SERVER['REQUEST_URI']=="/comp-shop/"){
		require_once($includes['center_file']);
	   }

	   else {
	   
	   ?>
		<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title"><?=$header?></h2>
                                <nav class="bradcaump-inner">
                                  <?=$bread?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

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
					 <?	require_once($includes['center_file']);	 ?>
				   </div>
                </div>
            </div>
        </section>
     
	   
	   <?
		 }
	   
	   ?>
   
		<footer class="htc__foooter__area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="ft__widget">
                                <div class="ft__logo">
                                    <a href="index.php">
                                        <img src="images/logo.png" alt="footer logo">
                                    </a>
                                </div>
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>ул. Карла Маркса, 42</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="address-text">
                                                <a href="#"> info@comp.ru</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-phone-in-talk"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>8 (800) 100-33-90</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="social__icon">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Категории</h2>
                                <ul class="footer-categories">
                                    
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
                       
                        <div class="col-md-3 col-lg-3 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Информация</h2>
                                <ul class="footer-categories">
                                
								<li><a href="about.php">О нас</a></li>
								
								<li><a href="news.php">Новости</a></li>
								<li><a href="guest.php">Обратная связь</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© <?=date('Y')?> <a href="index.php">Интернет-магазин бытовой и компьютерной техники</a>
                                    Все права защищены.</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="index.php">Главная</a></li>
                                    <li><a href="dirs.php">Каталог</a></li>
                                    <li><a href="guest.php">Связаться с нами</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </footer>
      
    </div>
   
   
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    
    <script src="js/waypoints.min.js"></script>
    
    <script src="js/main.js"></script>

</body>






</html>

    

	

	 