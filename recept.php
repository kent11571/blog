<?php
session_start();
?>
<html>
<head>
		<link rel ="stylesheet" href="style.css" media="all">
</head>
<body>
	<div class="header">
	<div class="left">
<a href="index.php">&larr;Назад</a>
</div>
	<?php
		if(isset($_SESSION['name'])){
			 $log = $_SESSION['name'];
			echo"	<form method=\"post\" action=\"index.php\">
		            <div class='menu'><p><label>$log<label>
		   <input class=\"knopka\" type =\"submit\" name=\"vihod\" id=\"vihod\" value=\"Выйти\" /></p></div>
		   </form>";
		   if(isset($_POST['vihod'])){
			unset($_SESSION['name']);
			session_destroy();
			echo "<meta http-equiv='Refresh' content='0; URL=avtoriz.php'>";	 	
		   }
		}
else{
			echo"	
<div class='menu'>
<a href='registraciya.php'>Регистрация</a>
</div>
<div class='menu'>
<a href='avtoriz.php'>Вход</a>
</div>";}
		   ?>
		<h1>
			Рецепт
		</h1>
	</div>
		<div class ="mid" >
			<div class="recept">
				<?php 
					$id=$_GET["id"];
					require_once("db.php"); 
					$query=mysql_query("SELECT recept FROM recept WHERE id_z=$id", $link) or die(mysql_error());
					$zag1=mysql_fetch_row($query);
					$zag=$zag1[0];
				?>
				<p><img src="images/<?php echo "$id" ?>.jpg" alt = "рецепт"><?php echo "$zag"?></p>
				
				<form name="comment" action="recept.php?id=<?php echo "$id"; ?>" method="post">
  
  <p>
  <div class="com">
    <label>Комментарий:</label>
    <br/>
    <textarea name="text_comment" cols="40" rows="7"></textarea>
	</div>
  </p>
  <p>
    <input type="submit" name="submit" value="Отправить" />
  </p>
</form>
<?php
  /* Принимаем данные из формы */
  require_once("db.php"); 
  if (isset($_POST['submit'])){
 $text_comment = $_POST["text_comment"];
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $query=mysql_query("INSERT INTO `komment` (`id`,`komment`) VALUES ('$id','$text_comment') ", $link);}// Добавляем комментарий в таблицу
  ?>
  <?php
   require_once("db.php"); 
   $query=mysql_query("SELECT * FROM `komment` WHERE `id`='$id'"); //Вытаскиваем все комментарии для данной страницы
  while ($row = mysql_fetch_array($query)) {
		echo"<p><div class='com'>$row[komment]</div></p>";
    echo "<br/>";
  }
  
?>

			</div>
		</div>
		
</body>
</html>