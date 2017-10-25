<div>
<center>
<?php

if (zalogowany()){
	?>
	<div class="btn-group">
	<a class="btn btn-primary" href="index.php"><i class="fa fa-home fa-fw"></i> Strona Główna</a>
	<a class="btn btn-primary" href="https://www.facebook.com/ospwojszczyce/"><i class="fa fa-facebook-square"></i> Facebook</a>
	<a class="btn btn-primary" href="profil.php"><i class="fa fa-user fa-fw"></i> Profil</a>
	<a class="btn btn-primary" href="akcje.php"><i class="fa fa-fire-extinguisher fa-fw"></i> Zobacz akcje</a>
	<?php if($user_lvl == 1){?>
	<div class="btn-group">
  	<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-caret-down fa-fw"></i> Administracja</a>
  	<ul class="dropdown-menu">
    <li><a href="admin_stopnie.php"><i class="fa fa-krw fa-fw"></i> Ustawienia stopni</a></li>
    <li><a href="admin_funkcje.php"><i class="fa fa-users fa-fw"></i> Ustawienia funkcji</a></li>
    <li><a href="admin.php"><i class="fa fa-pencil-square-o fa-fw"></i> Ustawienia kont</a></li>
    <li class="divider"></li>
    <li><a href="admin_akcje.php"><i class="fa fa-fire fa-fw"></i> Ustawienia akcji</a></li>
  	</ul>
	</div>
	<?php } ?>
	<a class="btn btn-primary" href="wyloguj.php"><i class="fa fa-sign-out fa-fw"></i> Wyloguj się</a>
	<?php
} else {
	?>
	<div class="btn-group">
	<a class="btn btn-primary" href="index.php"><i class="fa fa-home fa-fw"></i> Strona Główna</a>
	<a class="btn btn-primary" href="https://www.facebook.com/ospwojszczyce/"><i class="fa fa-facebook-square"></i> Facebook</a>
	<a class="btn btn-primary" href="akcje_p.php"><i class="fa fa-fire-extinguisher fa-fw"></i> Nasze akcje</a>
	<a class="btn btn-primary" href="login.php"><i class="fa fa-sign-in fa-fw"></i> Zaloguj się</a>
	</div>
	<?php
}

?>

</center>
</div>
</div>