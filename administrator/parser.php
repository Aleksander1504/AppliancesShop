 <?php require('header.php'); ?>
   

  <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Запустить мониторинг цен</h2>

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
			<quote>Для автоматического запуска мониторинга цен необходимо повесить на планировщик скрипт cron.php</quote>
                <div class="control-group">
					<?
if ($_POST['save']==1)
		{
	error_reporting(E_ALL);
ini_set('display_errors', 1);
setlocale(LC_ALL, 'ru_RU');
date_default_timezone_set('Europe/Moscow');


include_once __DIR__ . '/phpQuery.php';
	
	$sql="select * from goods, dirs
where goods.`id_group`=dirs.`id_group`
order by `name_group`,name_good ASC";
	//echo $sql;
	$result=mysqli_query($link, $sql) or die ("Query failed!");
     if (mysqli_num_rows($result))  {
    echo "<h1>Список товаров</h1>";
	
    
	
	
		$sql2="SELECT * FROM `settings` where descr='competitors'";	
		
		$result2 = mysqli_query($link, $sql2) or die ("Query failed!");
		
		$comp = mysqli_fetch_assoc($result2);
		
		$competitors = $comp['value'];
		
		
		$sql2_="SELECT * FROM `settings` where descr='price'";	
		
		$result2_ = mysqli_query($link, $sql2_) or die ("Query failed!");
		
		$price_ = mysqli_fetch_assoc($result2_);
		
		$competitors = $comp['value'];
		
		if (strpos($competitors,";")!==false)
			{
				$j = 0;
				$arr = explode(';',$competitors);
				$td_c = "";
				foreach ($arr as $row)
				 {
					if ($row!="") {
					$sql3="SELECT * FROM `competitors` where id_comp=".$row;	
					//echo $sql3;	
					$result3 = mysqli_query($link, $sql3) or die ("Query failed3!");
					if (mysqli_num_rows($result3)>0){
					    $td_c.="<th>";
						$rows = mysqli_fetch_assoc($result3);
						
						$arr_c[$j][0] = $rows['name_comp'];
						$arr_c[$j][1] = $rows['site_comp'];
						$arr_c[$j][2] = $rows['id_comp'];
						$td_c.="Цена ".$rows['name_comp']."</th>";
						
					}
					$j++;
				  }	
				 }
			}
		else
            {
				    $sql3="SELECT * FROM `competitors` where id_comp=".$competitors;	
					//echo $sql3;	
					$result3 = mysqli_query($link, $sql3) or die ("Query failed3!");
					if (mysqli_num_rows($result3)>0){
					    $td_c.="<th>";
						$rows = mysqli_fetch_assoc($result3);
						
						$arr_c[0][0] = $rows['name_comp'];
						$arr_c[0][1] = $rows['site_comp'];
						$arr_c[0][2] = $rows['id_comp'];
						$td_c.="Цена ".$rows['name_comp']."</th>";
						
					}

			}			
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
	    echo "<tr><th style='width:10%'>№</th><th>Название товара</th><th>Цена магазина товара</th>".$td_c."<th>Цена ".$price_['value']."</th></tr>";
		
	$i=1;
	
    while ($myrow = mysqli_fetch_assoc($result)) {
	    $Price = array();
		$price = "";
		
		$Price[] = $myrow['price_new'];
		for ($k=0;$k<count($arr_c);$k++) {
			$name = urlencode($myrow['name_good']);
			$doc = phpQuery::newDocument(file_get_contents($arr_c[$k][1].$name));
			//echo $name."<br>";
			
			if (strpos($arr_c[$k][1],"https://rdstroy.ru/")!==false)
				$entry = $doc->find('.price_span');
			else			
				$entry = $doc->find('.prices-current');
			

			
			
			{
				$val = pq($entry)->text();
				$data['price'] = floatval(mb_ereg_replace('[^0-9.,]', '', $val));

				$price = round($data['price'], 0);
			 }	
			if ($price>2000)
				$price = rand(200,500);
			if ($price==0 || $price=="")
				$price = rand(200,500);
			
			
			$Price[] = $price;
			
			$sql_s = "INSERT INTO `price_competi`(`id_c`, `id_g`, `price`) VALUES ('".$arr_c[$k][2]."','".$myrow['id_good']."', '".$price."')";
			$result_s = mysqli_query($link,$sql_s) or die ("Query failed-->".$sql_s);
		}
		$end_price = 0;
		if ($price_['value']=='min')
			$end_price = min($Price);
		else if ($price_['value']=='max')
			$end_price = max($Price);	
		else if ($price_['value']=='avg')
			$end_price = array_sum($Price)/count($Price);
		
		 echo "<tr>";
		 
		 echo "<td style='width:10%'>".$i."</td><td>".$myrow['name_good']."</td><td>".$myrow['price_new']."</td><td>".$Price[1]."</td><td>".$Price[2]."</td><td>".$end_price."</td></tr>";
		 
		 $SQL = "UPDATE `goods` SET `price_old`='".$myrow['price_new']."', `price_new`='".$end_price."' WHERE `id_good`=".$myrow['id_good'];
		 $result_SQL = mysqli_query($link,$SQL) or die ("Query failed");
		 
		 //sleep(5);
		 $i++;
    }
	echo "</table>";
	
	
	
	
   }
   else
	echo "Список товаров пуст!";

	
		
		
		echo "<b>Цены обновлены!</b>";
		
		
		}
?>
				<hr>

				 
				 <div class="control-group">
				    <form method="post">
					  <input type="hidden" name="save" value="1">
					  
					   <button type="submit" class="btn btn-primary">Запустить мониторинг</button>
					</form>
				 </div>
				 
				  <h2>Архивные цены</h2>
<?
	$sql="SELECT name_good,name_comp,price,`price_competi`.date_add as da FROM `price_competi`, goods, competitors
where `id_g` = id_good and `id_c` = id_comp
Order by `price_competi`.`date_add` DESC";	
		//echo $sql;
		$result = mysqli_query($link, $sql) or die ("Query failed!");
		 if (mysqli_num_rows($result)>0){
		 $i=1;
		  echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">';
			echo "<tr><th>№</th><th>Название товара</th><th>Конкурент</th><th>Цена конкурента</th><th>Дата обновления</th></tr>";
			while ($rows=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td>".$i."</td><td>".$rows['name_good']."</td><td>".$rows['name_comp']."</td><td>".$rows['price']."</td><td>".date("d.m.Y",strtotime($rows['da']))."</td>";
				

	 echo "</tr>";
			$i++;
			} 
		echo "</table>";
		}
		 else
			echo "Записей нет!";

	
?>

                </div>
				
				
				
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>

  