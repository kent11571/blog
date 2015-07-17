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
		<h1>
			Кулинарный блог
		</h1>
	</div>
	<div class="content">
		<div class="mid">
			<div class="fon">
				<center><p class="registraciya" >РEГИСТРАЦИЯ</p></center>
			<center><div class="reg">
			
				<?php
			require_once("db.php"); 
			if(isset($_POST['registr'])){
				$mail=$_POST['mail'];
				$parol=$_POST['password'];
				$parol2=$_POST['password2'];
				$proverka1=mysql_query("select * from users where email='$mail'", $link) or die(mysql_error());
					$proverka=mysql_num_rows($proverka1);
					if($proverka<1){
				if($parol == $parol2){
					$parol=md5($parol);
					$kod = md5(uniqid(rand(),true));
					$query=mysql_query("INSERT INTO users(email,password,kod,status) VALUES('$mail','$parol','$kod','0') ", $link) or die(mysql_error());			
					
					echo"Для завершения регистрации перейдите по ссылке: <a href=\"index.php?kods=$kod\">http://blog/index.php</a>";
					
				}
				else{ echo"<p style=\"color:red;\" >Пароли не совпадают!</p>";}	
			}
			else{echo"<p style=\"color:red;\" >Данный логин уже занят!</p>";}
			}
			?>
			<form method="post" action="registraciya.php">
				<p><label>E-mail:</label> <p><input class="comment" type ="email" name="mail" id="mail" required /></p>
				<p><label>Пароль:</label><p><input class="comment" type ="password" name="password" id="password" required /></p>
				<p><label>Повторите пароль:</label><p><input class="comment" type ="password" name="password2" id="password2" required /></p>
		
			</div></center>
				<center><p class="center"><input class="knopka" type = "submit" name="registr" id="registr" value ="Зарегестрироваться"/></p></center>
				
			</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="mid"></div>
	</div>	
</body>
</html>
