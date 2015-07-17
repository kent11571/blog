<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
    <link rel ="stylesheet" href="style.css" media="all">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="header">
<div class="left">
<a href="index.php">&larr;Назад</a>
</div>
<div class="menu">
<?php
		if(isset($_SESSION['name'])){
			 $log = $_SESSION['name'];
			echo"	<form method=\"post\" action=\"index.php\">
		            <p><label>$log<label>
		   <input class=\"knopka\" type =\"submit\" name=\"vihod\" id=\"vihod\" value=\"Выйти\" /></p>
		   </form>";
		   if(isset($_POST['vihod'])){
			unset($_SESSION['name']);
			session_destroy();
			echo "<meta http-equiv='Refresh' content='0; URL=avtoriz.php'>";	 	
		   }
		}
		   ?>
</div>
		<h1>
			Кулинарный блог
		</h1>
	</div>
	<div class="content">
		<div class="mid">
			<div class="fon">
				<center><p class="registraciya" >АВТОРИЗАЦИЯ</p></center>
			<center><div class="reg">
			<?php
		require_once("db.php"); 
		if(isset($_POST['vhod'])){
			$mail=$_POST['mail'];
			$parol=md5($_POST['password']);
			$query=mysql_query("SELECT * FROM users WHERE email='$mail'", $link) or die(mysql_error());
			$usersdata=mysql_fetch_array($query);
			if($usersdata['password']==$parol){
				$chek=true;
				$_SESSION['name']=$mail;
			}
			else{
				echo"<p style=\"color:red;\" >Неверный логин или пароль!</p>";
			}
		}
	?>
			<form method="post" action="avtoriz.php">
				<p><label>E-mail:</label> <p><input class="comment" type ="email" name="mail" id="mail" required /></p>
				<p><label>Пароль:</label><p><input class="comment" type ="password" name="password" id="password" required /></p>
		
			</div></center>
				<center><p class="center"><input class="knopka" type = "submit" name="vhod" id="vhod" value ="Войти"/></p></center>	
			</form>

			</div>
		</div>
	</div>
	<div class="footer">
		<div class="mid"></div>
	</div>	
</body>
</html>
