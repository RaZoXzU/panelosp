<html>
<head>
	<meta charset="UTF-8">
	<title>OSP Wojszczyce</title>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<?php include ("includy/baza.php");?>
<?php include ("includy/funkcje.php");?>
<?php include ("includy/tytul.php");?>

<div class="container">

<h3></h3>
  <div class="panel panel-primary">
  	<div class="panel-heading"><h3>Zaloguj się</h3></div>
    <div class="panel-body">
    	<form method='post'>
<?php
	if(isset($_POST['submit'])){
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		if(empty($login) or empty($haslo)){
			?><div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Pola puste!
			</div><?php
		} else {
			$check_login=mysql_query("SELECT ID, TYP FROM konta WHERE LOGIN='$login' AND HASLO='$haslo'");
			if (mysql_num_rows($check_login) == 1) {
				$run = mysql_fetch_array($check_login);
				$ID = $run['ID'];
			} else {
				?>
				<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Błędny login lub hasło!
				</div>
				<?php
			}
		}
	}
?>

    <div class="form-group">
      <label for="email">Login:</label>
      <input type="text" class="form-control" name="login" id="login" placeholder="Podaj login">
    </div>
    <div class="form-group">
      <label for="pwd">Hasło:</label>
      <input type="password" class="form-control" name="haslo" id="haslo" placeholder="Podaj hasło">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Zaloguj się</button>
</form>



	</div> 
   </div>
  </div>

</div>
<?php include ("includy/stopka.php");?>
</body>
</html>