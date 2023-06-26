<?php


if (isset($_POST['add']))
	{
	$sql="select count from carts where `session_id`='".session_id()."' and id_good=".$_POST['add'];
	$result=mysqli_query($link,$sql) or die ("Query failed!");
	
	$count=$_POST['count'];
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
	$result=mysqli_query($link,$sql) or die ("Query failed!");
	$result=mysqli_query($link,"select name_good from goods where id_good=".$_POST['add']);
	$myrow = mysqli_fetch_assoc($result);
	echo "<br><br><div><b>Товар ".$myrow['name_good']." добавлен в корзину!</b><br><br><br></div>";
	
	
	}

?>
     	
<?
 if(isset($_GET["id"])) {
   if (!is_int($_GET["id"]))
   {
    $good_id = htmlspecialchars($_GET["id"]);
	$result=mysqli_query($link,"SELECT * FROM dirs, goods,manafacturer
where dirs.id_group=goods.id_group and id_m=manafuc and id_good=".$good_id);
	$product = mysqli_fetch_assoc($result);
	
	$sql_2 = "SELECT `price` FROM `warehouse`, `goods`
Where warehouse.id_good = goods.id_good and warehouse.id_good = ".$_GET['id']."
Order By `date_added` DESC";
$result_2 = mysqli_query($link,$sql_2) or die ("Query failed 2");
$warehouse = mysqli_fetch_assoc($result_2);
    


	
   
 
	
	
	if ($product['img']=="")
		$img = '<img src="img/catalog/no-photo.jpg">';
	else	
		$img = '<img src="'.$product['img'].'">';
	
	?>
		<section class="htc__product__details pt--100 pb--100 bg__white">
            <div class="container">
                <div class="scroll-active">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-3 col-xs-12">
                            <div class="product__details__container product-details-5">
                                <div class="scroll-single-product mb--30">
                                    <?=$img?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="sidebar-active col-md-5 col-lg-5 col-sm-7 col-xs-12 xmt-30">
                            <div class="htc__product__details__inner ">
                                <div class="pro__detl__title">
                                    <h2><?=$product['name_good']?> </h2>
                                </div>
                                
                                <div class="pro__details">
                                    <p> Категория:
									<?
									echo '<a class="breadcrumb-item" href="dirs.php?id='.$product['id_group'].'">'.$product['name_group'].'</a>'; 
									?>
									</p>
                                </div>
                                <div class="pro__details">
                                    <p> Бренд:
									<?
									echo $product['name_m']; 
									?>
									</p>
                                </div>
                                <ul class="pro__dtl__prize">
                                    <li><?=$product['price_new']?> рублей</li>
                                    
                                </ul>
                                
                                <form action="" method="post">
                                <div class="product-action-wrap">
                                    <div class="prodict-statas"><span>Количество :</span></div>
                                    <div class="product-quantity">
                                       
                                            <div class="product-quantity">
                                                <div class="">
                                                    <input class="form-control" name="count" type="number" step="1" min="1" max="1000" value="1">
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                                <ul class="pro__dtl__btn">
                                    <li class="buy__now__btn">
									<?
									echo '<input class="form-control" name="add" type="hidden" value="'.$product['id_good'].'">
				
				
									
									<input class="buy__now__btn2" type="submit" value="Купить" >';
									
									
									?>
									</li>
                                    
                                </ul>
								</form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	
	
	<?
	
	
	
	
		
        ?>
		   <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
			<div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Описание</a>
                            </li>
                            
                            <li role="presentation">
                                <a href="#reviews" role="tab" data-toggle="tab">Отзывы</a>
                            </li>
                        </ul>
                    </div>
                </div>
				
				 <div class="row">
                    <div class="col-md-8">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">Описание</h2>
                                        <p><?=$product['description']?></p>
                                    </div>
                                   
                                </div>
                            </div>
                            
                           
                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    <!-- Start Single Review -->
                                    <div class="pro__review">
                                        <div class="review__thumb">
                                            <img src="images/review/1.jpg" alt="review images">
                                        </div>
                                        <div class="review__details">
                                            <div class="review__info">
                                                <h4><a href="#">Сергей Иванов</a></h4>
                                                <ul class="rating">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                </ul>
                                                <div class="rating__send">
                                                    <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="review__date">
                                                <span>12.03.2021</span>
                                            </div>
                                            <p>Отличный товар. Очень рекомендую</p>
                                        </div>
                                    </div>
 
                                  
                                </div>
                                <!-- Start RAting Area -->
                                <div class="rating__wrap">
                                    <h2 class="rating-title">Написать отзыв</h2>
                                    <h4 class="rating-title-2">Рейтинг товара</h4>
                                    <div class="rating__list">
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                    </div>
                                </div>
                                <!-- End RAting Area -->
                                <div class="review__box">
                                    <form id="review-form">
                                        <div class="single-review-form">
                                            <div class="review-box name">
                                                <input type="text" placeholder="Введите Ваше имя">
                                                <input type="email" placeholder="Введите Ваш email">
                                            </div>
                                        </div>
                                        <div class="single-review-form">
                                            <div class="review-box message">
                                                <textarea placeholder="Введите Ваш отзыв"></textarea>
                                            </div>
                                        </div>
                                        <div class="review-btn">
                                            <a class="fv-btn" href="#">Отправить отзыв</a>
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
			</div>

		  </section>	
           
		
		<?
	
   }
   else
	die("Параметр не является числом!");
  }
  else
	die("Товар не найден!");
 
   
   ?>
   
