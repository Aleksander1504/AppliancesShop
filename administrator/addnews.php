  <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
  <a id="center"></a>
  <?php require('header.php'); ?>
   <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> </h2>

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
                <div class="control-group">
<h1>Добавление новости</h1>
<script>
  window.onload = function() {
    var max=500;
	var description=document.getElementById("description");
	description.onkeyup = function(){
	//alert(max);
	   if (description.value.length<500) {
	    //max-=description.value.length;
		document.getElementById("min").innerHTML=max-description.value.length;
		}
	   else {
		description.value = description.value.substr(0, 500);
		document.getElementById("min").innerHTML=max-description.value.length;
		}
	};
	

	
  };
</script>
<?php
	$text = "";
	function translit($s) {
		  $s = (string) $s; 
		  $s = strip_tags($s);
		  $s = str_replace(array("\n", "\r"), " ", $s);
		  $s = preg_replace("/\s+/", ' ', $s);
		  $s = trim($s); 
		  $s = strtolower($s); 
		  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
		  $s = str_replace(" ", "-", $s); 
		  return $s; 
		}
	
	
	function parse_bb_code($text)	{
	$text = preg_replace('/\[(\/?)(b|i|u|s)\s*\]/', "<$1$2>", $text);
	
	$text = preg_replace('/\[code\]/', '<pre><code>', $text);
	$text = preg_replace('/\[\/code\]/', '</code></pre>', $text);
	
	$text = preg_replace('/\[(\/?)quote\]/', "<$1blockquote>", $text);
	$text = preg_replace('/\[(\/?)quote(\s*=\s*([\'"]?)([^\'"]+)\3\s*)?\]/', "<$1blockquote>Цитата $4:<br>", $text);
	
	$text = preg_replace('/\[url\](?:http:\/\/)?([a-z0-9-.]+\.\w{2,4})\[\/url\]/', "<a href=\"http://$1\">$1</a>", $text);
	$text = preg_replace('/\[url\s?=\s?([\'"]?)(?:http:\/\/)?([a-z0-9-.]+\.\w{2,4})\1\](.*?)\[\/url\]/', "<a href=\"http://$2\">$3</a>", $text);
	
	
	$text = preg_replace('/\[img\s*\]([^\]\[]+)\[\/img\]/', "<img src='$1'/>", $text);
	$text = preg_replace('/\[img\s*=\s*([\'"]?)([^\'"\]]+)\1\]/', "<img src='$2'/>", $text);
	
	return $text;
}
	
	function replace_tags($text) {
		
		$text=htmlspecialchars($text, ENT_QUOTES);
		
		$text=parse_bb_code($text);
		
		return $text;
	
	}	

	if ($_POST['new_post']==1)
		{
		$name=$_POST['name'];
		$descr=$_POST['description'];
		
		$name=replace_tags($name);
		
		$descr=replace_tags($descr);
		
		$url=translit($name);
		
		if (basename($_FILES['file']['name'])!="") {
			$uploaddir = '../img/news/';
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			$uploaddir2 = 'img/news/';
			$uploadfile2 = $uploaddir2 . basename($_FILES['file']['name']);
				
			move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
		}
		else
			$uploadfile2="";
		
		$SQL = "INSERT INTO `news_table`( `name`, `description`,`image`, `user`) VALUES 
		('".$name."','".$descr."','".$uploadfile2."', ".$_SESSION['user'].")";
		$result = mysqli_query($link,$SQL) or die ("Query failed-->".$SQL);
		echo "Новость '".$_POST['name']."' добавлена!";
		}
?>
<div style = "margin:10px 8px auto;">
<div class="error"><? echo $text; ?></div>
<form enctype="multipart/form-data" action="addnews.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input type="hidden" name="new_post" value="1" />
<fieldset>
		  <legend>Информация о новосте</legend>
		  <div class="form-group">
			<label>Название<span class="red">*</span></label><input type="text" class="form-control"  name="name" required>
		  </div>
		  <div class="form-group">
			<label>Текст<span class="red">*</span></label><textarea id="editor1" cols="100" rows="20" class="form-control"  name="description"></textarea required>
			
  <script type="text/javascript">
 var ckeditor1 = CKEDITOR.replace( 'editor1' );
 AjexFileManager.init({
 returnTo: 'ckeditor',
 editor: ckeditor1
 });
  </script>
	      </div>
		  <div class="form-group">	
			<label>Изображение</label><input type="file" name="file">
		  </div>	
			
		</fieldset>
	<div class="center">
		<button type="submit" id="send">Отправить</button>
		<button type="reset">Сброс</button>
	</div>	
		
</form>

</div>


  
                </div>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


 
<?php require('footer.php'); ?>
		
  