
<?
	if ($_GET['id']=="")
		{
		  echo '        <div class="htc__blog__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="blog__wrap blog--page clearfix">';
					
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
					";	
							//echo $sql;
							$result = mysqli_query($link, $sql) or die ("Query failed!");
							 if (mysqli_num_rows($result)>0){
								while ($rows=mysqli_fetch_assoc($result)) {

							echo '<div class="col-md-4 col-lg-5 col-sm-6 col-xs-12">
									<div class="blog foo">
										<div class="blog__inner">
											<div class="blog__thumb">
												<a href="news.php?id='.$rows['ids'].'">
													<img src="'.$rows['image'].'"" alt="blog images">
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
						
		  echo '</div></div></div></div>';				
		
		}
		
		else 
			{
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
							
							$sql="SELECT fio, news_table.id as ids, name,image, date_news, description FROM `news_table`,users
							Where users.id=user and news_table.id = ".$_GET['id']."
					order by `date_news` DESC
					";	
							//echo $sql;
							$result = mysqli_query($link, $sql) or die ("Query failed!");
							 
								while ($rows=mysqli_fetch_assoc($result))
			
			
				echo '        <section class="blog-details-wrap bg__white">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="blog-details-left-sidebar mrg-blog">
                            <div class="blog-details-top">
                                   <div class="blog-details-thumb-wrap">
                                    <div class="blog-details-thumb">
                                        <img src="'.$rows['image'].'"">
                                    </div>
                                    <div class="upcoming-date">
                                        '.date("d",strtotime($rows['date_news'])).'<span class="upc-mth">'.$months[date("n",strtotime($rows['date_news']))-1].'<br>'.date("Y",strtotime($rows['date_news'])).'</span>
                                    </div>
                                </div>
                                <!--End Blog Thumb -->
                                <h2>'.$rows['name'].'</h2>
                                <div class="blog-admin-and-comment">
                                    <p>Автор: '.$rows['fio'].'</p>
                                    
                                </div>
                                <!-- Start Blog Pra -->
                                <div class="blog-details-pra">
                                    '.$rows['description'].'

                                   
                                </div>
                                
             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
			
			}


?>


 

