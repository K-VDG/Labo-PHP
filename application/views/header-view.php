<!DOCTYPE html>
<html>
 <head>
    <link href="http://localhost/workingspace/labo-php/public/css/style.css" rel="stylesheet">
    <title><?php echo $titel; ?></title>
 </head>
 <body>
 	<header>
 		<nav>
 			<ul>
	 			<li><a href="http://localhost/workingspace/Labo-PHP" title="Naar de homepagina">Home</a></li>

	 			<?php if(!isset($_SESSION['logged_in'])): ?>
	 				<li><a href="http://localhost/workingspace/Labo-PHP/index.php/Login" title="">Login</a></li>
	 			 	<li><a href="http://localhost/workingspace/Labo-PHP/index.php/Registreer" title="">Registreer</a></li>
				<?php endif; ?>

	 			<?php if(isset($_SESSION['logged_in'])): ?>
	 				<li><a href="http://localhost/workingspace/Labo-PHP/index.php/dashboard" title="Dashboard">Dashboard</a></li>
	 			 	<li><a href="http://localhost/workingspace/Labo-PHP/index.php/todo/" title="Je persoonlijke to do-lijst">ToDo's</a></li>
	 				<li><a href="http://localhost/workingspace/Labo-PHP/index.php/dashboard/logout" title="Log uit">Logout(<?= $_SESSION['logged_in']['username'] ?>)</a></li>
				<?php endif; ?>
			</ul>
 		</nav>
 	</header>
 	<div class="container">




 
 	

