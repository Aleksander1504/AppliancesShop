<section class="htc__store__area bg__white" style="height:500px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
            <?            if (isset($_POST['new']))
	{
		$name=$_POST['name'];
		$tel=$_POST['tel'];
		$descr=$_POST['message'];
		
		$message="Сообщение от ".$name."\r\n"."Телефон: ".$tel."\r\nСообщение:".$descr;
		
		if (mail('smarteagle@mail.ru', 'Сообщение с сайта', $message,"From: smarteagle@mail.ru"))
			echo "<p>Почта отправлена!</p>";
		
		else
			echo "<p>Почта не отправлена!</p>";

		

	}
 
    
	 
   	?>
    
		
						<div class="checkout-form">
							<form action="" method="post">
                                <h2 class="section-title-3">Заполните форму</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" name="name" placeholder="Введите Ваше имя">
                                        <input type="text" name="tel" placeholder="Введите Ваш номер телефона">
                                    </div>
                                    
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Введите Ваше сообщение"></textarea>
                                    </div>
									
									<input class="buy__now__btn2" type="submit" value="Отправить">
                                    
                                </div>
								</form>
                            </div>
                    </div>
                </div>
            </div>
        </section>

<?php


 

