<?php require('header.php'); ?>
<div>
    
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>
			<? 
				$sql2="SELECT * FROM `users`";
					$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
					 $cnt = mysqli_num_rows($result2);
				$sql2="SELECT * FROM `users` WHERE date(`date_reg`)=date_add(curdate(),INTERVAL - 0 DAY)";
					$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
					 $cnt2 = mysqli_num_rows($result2);	 
			?>	
            <div>Количество сотрудников</div>
            <div><?=$cnt?></div>
            <span class="notification"><?=$cnt2?></span>
        </a>
    </div>


    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>
			<? 
				$sql2="SELECT sum(`count_all`) as sum FROM `goods` WHERE 1";
					$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
					 $cnt = mysqli_fetch_assoc($result2);
					 
			?>	
            <div>Товары на складе</div>
            <div><?=$cnt['sum']?></div>
            <span class="notification yellow"></span>
        </a>
    </div>

   
</div>




<div class="row">
   
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Статистика недели</h2>

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
                <ul class="dashboard-list">
				    <li>
					 <?
						$sql2="SELECT * FROM `orders` WHERE date(`date`)>date_add(curdate(),INTERVAL - 7 DAY)";
						$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
						$cnt2 = mysqli_num_rows($result2);	
					  ?>
                        <a href="orders.php">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span class="blue"><?=$cnt2?></span>
                            Новые заказы (Отгрузки)
                        </a>
                    </li>
                    <li>
					  <?
						$sql2="SELECT * FROM `warehouse` WHERE date(`date_added`)>date_add(curdate(),INTERVAL - 7 DAY)";
						$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
						 $cnt2 = mysqli_num_rows($result2);
					  ?>
                        <a href="suppl.php">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <span class="green"><?=$cnt2?></span>
                            Новые поставки товара
                        </a>
                    </li>

                    
                    
                </ul>
            </div>
        </div>
    </div>
	
	    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Товары, которые нужно заказать</h2>

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
                <ul class="dashboard-list">
				    
					 <?
						$sql2="SELECT * FROM `goods` WHERE `count_all`<5
							Order by `name_good` ASC";
						$result2 = mysqli_query($link, $sql2) or die ("Query failed2!");
						$cnt2 = mysqli_num_rows($result2);	
					 
                        while ($rows=mysqli_fetch_assoc($result2)) {
                            echo '<li><i class="glyphicon glyphicon-chevron-down"></i>  '.$rows['name_good'].'. Текущее количество: 
                            <span class="blue">'.$rows['count_all'].'</span></li>';
                            
                        }
                    
                    ?>

                    
                    
                </ul>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<?php require('footer.php'); ?>
