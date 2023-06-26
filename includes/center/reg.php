<?
	if ($_POST['enter']==1)
		{
		$SQL = "INSERT INTO `user`(`fio`, `login`, `pass`, `adress`, `e-mail`, `tel`) VALUES  ('".$_POST['fio']."','".$_POST['login']."','".$_POST['pass']."','".$_POST['adress']."','".$_POST['e-mail']."','".$_POST['phone']."')";
				
		$result = mysqli_query($link, $SQL);
		$id=mysqli_insert_id($link);
		$_SESSION['name']=$_POST['fio'];
		$_SESSION['user']=$id;
				?>
<script>

window.open("index.php","_self");

</script>
				
				
				<?php			

			}
		
?>
<h1>Регистрация пользователя</h1>
<form method="post" action="">
	  <input type="hidden" name="enter" value="1">
      <div class="modal-body">
		  <div class="form-group">
            <label for="login" class="col-form-label">ФИО:</label>
            <input type="text" class="form-control" name="fio">
          </div>
		  <div class="form-group">
            <label for="login" class="col-form-label">e-mail:</label>
            <input type="text" class="form-control" name="e-mail">
          </div>
		  <div class="form-group">
            <label for="phone" class="col-form-label">Телефон:</label>
            <input type="text" class="form-control" name="phone">
          </div>
		  <div class="form-group">
            <label for="adress" class="col-form-label">Адрес:</label>
            <input type="text" class="form-control" name="adress">
          </div>
		  
          <div class="form-group">
            <label for="login" class="col-form-label">Логин:</label>
            <input type="text" class="form-control" name="login">
          </div>
          <div class="form-group">
            <label for="pass" class="col-form-label">Пароль:</label>
            <input type="password" class="form-control" name="pass">
          </div>
		  
		          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </div>
	  </form>


  