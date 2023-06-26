<?php
$no_visible_elements = true;


include('header.php'); 

	
	if ($_POST['enter']==1)
		{
		$SQL = "SELECT * FROM users WHERE login = '".$_POST['login']."'
				and pass = '".($_POST['pass'])."'";
		
		//echo $SQL;	
		$result = mysqli_query($link, $SQL);
			if (mysqli_num_rows($result)>0)
		{
				
				$info=mysqli_fetch_assoc($result);
				
				$_SESSION['name']=$info['fio'];
				$_SESSION['user']=$info['id'];
				$_SESSION['role']=$info['role'];
			
				//echo $_SESSION['admin'];
				
			?>	
				<script>

window.open("index.php#center","_self");

</script>
			<?
			}
		else 
			echo "<div>Логин или пароль введены не правильно!</div>";
			
		}

?>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Добро пожаловать в администраторскую часть</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Пожалуйста, введите логин и пароль
            </div>
            <form method="post" action="login.php">
				<input type="hidden" name="enter" value="1">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" name="login" placeholder="Логин">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" name="pass" placeholder="Пароль">
                    </div>
                    <div class="clearfix"></div>

                   
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
<?php require('footer.php'); ?>