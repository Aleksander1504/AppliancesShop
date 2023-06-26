<?
$base_host="localhost";
$base_name="comp_db";
$user_name='root';
$user_pass='';



$link = mysqli_connect($base_host, $user_name, $user_pass);
mysqli_query($link,"SET NAMES 'utf8';");
mysqli_query($link,"SET CHARACTER SET 'utf8';");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';");
if (!$link){
$er_text='В данный момент на сервере ведутся технические работы, повторите запрос позднее!';
echo ('
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
       <td class="bad_message">'.$er_text.'</td>
  </tr>
</table>
');
exit;
};


if (!mysqli_select_db ($link,$base_name)){
$er_text='В данный момент на сервере ведутся технические работы, повторите запрос позднее!';
echo ('
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td class="bad_message">'.$er_text.'</td>
  </tr>
</table>
<img src="images/pixel.gif" height="5" border=0>
');
exit;
};
?>