<?php
session_start();
?>
<html>
<head>
<link rel ="stylesheet" href="style.css" media="all">
</head>
<body>
<div class="header">
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
			Кулинарный блог
		</h1>
	</div>
		<div class ="mid" >
			<?php
				require_once("db.php"); 
				$query=mysql_query("SELECT zagolovok FROM zogolovki WHERE id_z=1", $link) or die(mysql_error());
				$zag1=mysql_fetch_row($query);
				$zag=$zag1[0];
				$query=mysql_query("SELECT text FROM zogolovki WHERE id_z=1", $link) or die(mysql_error());
				$tex1=mysql_fetch_row($query);
				$tex=$tex1[0];
			?>
			<div class="sec">
				<h1>
					<a href="recept.php?id=1"><?php echo"$zag"?></a>
				</h1>
				<p><?php echo"$tex"?><a href="recept.php?id=1">Читать далее</a></p>	
		  <?php
          require_once("db.php"); 
          $query=mysql_query("SELECT * FROM komment WHERE id='1'");
          $summa = mysql_num_rows($query);?>	
          <?php echo "$summa" ?> <label> comments</label>   
			</div>
			<div class = "sec">
				<img src="images/1.jpg" alt="Новость-1" title="Новость-1">
			</div>
			<?php
				$query=mysql_query("SELECT zagolovok FROM zogolovki WHERE id_z=2", $link) or die(mysql_error());
				$zag1=mysql_fetch_row($query);
				$zag=$zag1[0];
				$query=mysql_query("SELECT text FROM zogolovki WHERE id_z=2", $link) or die(mysql_error());
				$tex1=mysql_fetch_row($query);
				$tex=$tex1[0];
			?>
			<div class="sec">
				<img src="images/2.jpg" alt="Новость-2" title="Новость-2">
				
			</div>
			<div class = "sec">
				<h1>
					<a href="recept.php?id=2"><?php echo "$zag" ?></a>	
				</h1>
				<p><?php echo"$tex"?><a href="recept.php?id=2">Читать далее</a></p>
				<?php
                require_once("db.php"); 
                $query=mysql_query("SELECT * FROM komment WHERE id='2'");
                $summa = mysql_num_rows($query);?>	
                <?php echo "$summa" ?> <label> comments</label>  
			</div>	
			<?php
				$query=mysql_query("SELECT zagolovok FROM zogolovki WHERE id_z=3", $link) or die(mysql_error());
				$zag1=mysql_fetch_row($query);
				$zag=$zag1[0];
				$query=mysql_query("SELECT text FROM zogolovki WHERE id_z=3", $link) or die(mysql_error());
				$tex1=mysql_fetch_row($query);
				$tex=$tex1[0];
			?>
			<div class = "sec">
				<h1>
					<a href="recept.php?id=3"><?php echo "$zag" ?></a>	
				</h1>
				<p><?php echo"$tex"?><a href="recept.php?id=3">Читать далее</a></p>
				<?php
               require_once("db.php"); 
               $query=mysql_query("SELECT * FROM komment WHERE id='3'");
               $summa = mysql_num_rows($query);?>	
      <?php echo "$summa" ?> <label> comments</label>  
			</div>	
			<div class="sec">
				<img src="images/3.jpg" alt="Новость-3" title="Новость-3">	
			</div>
			<?php
				$query=mysql_query("SELECT zagolovok FROM zogolovki WHERE id_z=4", $link) or die(mysql_error());
				$zag1=mysql_fetch_row($query);
				$zag=$zag1[0];
				$query=mysql_query("SELECT text FROM zogolovki WHERE id_z=4", $link) or die(mysql_error());
				$tex1=mysql_fetch_row($query);
				$tex=$tex1[0];
			?>
			<div class="sec">
				<img src="images/4.jpg" alt="Новость-4" title="Новость-4">	
			</div>
			<div class = "sec">
				<h1>
					<a href="recept.php?id=2"><?php echo "$zag" ?></a>	
				</h1>
				<p><?php echo"$tex"?><a href="recept.php?id=4">Читать далее</a></p>
				<?php
                require_once("db.php"); 
                $query=mysql_query("SELECT * FROM komment WHERE id='4'");
                $summa = mysql_num_rows($query);?>	
               <?php echo "$summa" ?> <label> comments</label>  
		</div>
		<?php
				$query=mysql_query("SELECT zagolovok FROM zogolovki WHERE id_z=5", $link) or die(mysql_error());
				$zag1=mysql_fetch_row($query);
				$zag=$zag1[0];
				$query=mysql_query("SELECT text FROM zogolovki WHERE id_z=5", $link) or die(mysql_error());
				$tex1=mysql_fetch_row($query);
				$tex=$tex1[0];
			?>
			<div class = "sec">
				<h1>
					<a href="recept.php?id=3"><?php echo "$zag" ?></a>	
				</h1>
				<p><?php echo"$tex"?><a href="recept.php?id=5">Читать далее</a></p>
				<?php
               require_once("db.php"); 
               $query=mysql_query("SELECT * FROM komment WHERE id='5'");
               $summa = mysql_num_rows($query);?>	
      <?php echo "$summa" ?> <label> comments</label>
	  </div>	
			<div class="sec">
				<img src="images/5.jpg" alt="Новость-5" title="Новость-5">	
			</div>
</body>
</html>