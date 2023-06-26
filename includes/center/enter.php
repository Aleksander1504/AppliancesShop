<?php
	if ($_POST['enter']==1)
		{
		
		{
		$SQL = "SELECT * FROM client WHERE login = '".$_POST['login']."'
				and pass = '".($_POST['pass'])."'";
		
		$result=mysqli_query($link,$SQL);
			if (mysqli_num_rows($result)>0)
		{
				
				$info=mysqli_fetch_assoc($result);
				$_SESSION['user_name']=$info['FIO'];
				$_SESSION['user_id']=$info['id_cl'];
				
				
			?>	
				<script>

window.open("index.php","_self");

</script>
			<?php
			}
			
		else 
			echo "<div>Логин или пароль введены не правильно!</div>";
			
		}
		
		}
?>
<?
	if ($_POST['reg']==1)
		{
		$SQL = "INSERT INTO `client`(`FIO`, `phone_cl`, `adress_cl`, `login`, `pass`) VALUES  ('".$_POST['fio']."','".$_POST['phone']."','".$_POST['adress']."','".$_POST['login']."','".$_POST['pass']."')";
		
		
		echo $SQL;
				
		$result = mysqli_query($link, $SQL);
		$id=mysqli_insert_id($link);
		$_SESSION['user_name']=$_POST['fio'];
		$_SESSION['user_id']=$id;
				?>
				<script>

window.open("index.php","_self");

</script>
			<?php
			}

?>

        <div class="htc__login__register bg__white" style="min-height:600px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Войти</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Регистрация</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
							 
                                <form method="post" class="login" action="enter.php">
								    <input type="hidden" name="enter" value="1">
                                    <input type="text" name="login" placeholder="Логин">
                                    <input type="password" name="pass" placeholder="Пароль">
                                
                                
                                <div class="htc__login__btn mt--30">
                                    <button class='buy__now__btn2' type='submit' style='margin:10px auto;'>Войти</button>
                                </div>
								</form>

                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form class="login" action="enter.php" method="post">
								<input type="hidden" name="reg" value="1">
                                    <input type="text" placeholder="ФИО" name="fio">
									<input type="text" placeholder="e-mail"  name="e-mail">

									<input type="text" placeholder="телефон"  name="phone">

									<input type="text" placeholder="Адрес"  name="adress">

									<input type="text" placeholder="Логин"  name="login">

									<input type="password" placeholder="Пароль" name="pass">
                                
                               
                                <div class="htc__login__btn">
                                    <button class='buy__now__btn2' type='submit' style='margin:10px auto;width:200px'>Зарегистрироваться</button>
                                </div>
								
								</form>

                            </div>
                          
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
       


  