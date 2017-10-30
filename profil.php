<html>
<head>
	<meta charset="UTF-8">
	<title>Profil | OSP Wojszczyce</title>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

<?php include ("includy/baza.php");?>
<?php include ("includy/funkcje.php");?>
<?php include ("includy/tytul.php");?>

<?php
if(!isset($my_id)){
  header('location: index.php');
}
?>

<div class="container">
<h3></h3>
  <div class="panel panel-primary">
  	<div class="panel-heading"><h3>Profil: <b><?php echo $login ?></b></h3></div>
    <div class="panel-body">

<!–//
-----------------------
//------Fragment zmiany hasla
//-----------------------
–>
<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $haslo = $_POST['haslo'];
    if(empty($haslo)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Hasło puste
      </div><?php
    } else {

      mysql_query("UPDATE konta SET HASLO='$haslo' WHERE ID='$my_id'");
      ?>
      <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Zmieniono
      </div><?php
    }
  }
?>
<!–//
//-----------------------
//---reszta na dole
//-----------------------
–>


    	<div class="table-responsive">
  			<table class="table">
  				<tr><th width="200px">Imię:</th><th><?php echo $user_imie ?></th></tr>
  				<tr><th>Nazwisko:</th><th><?php echo $user_nazwisko ?></th></tr>
          <tr><th>Telefon:</th><th><?php echo $user_telefon ?></th></tr>
          <tr><th>Funkcja:</th><th><?php echo $lvl_name ?></th></tr>
  				<tr><th>Stopień:</th><th><?php echo $stop_name ?></th></tr>
  				<tr><th>Badania:</th><th><?php echo $user_badania ?></th></tr>
  				<tr><th>Ubezpieczenie:</th><th><?php echo $user_ubezpieczenie ?></th></tr>
          <tr><th>Wstąpił:</th><th><?php echo $user_start ?></th></tr>
  			</table>
        <center><a class="btn btn-primary" data-toggle="modal" data-target="#haslo"><i class="fa fa-key fa-fw"></i> Zmień hasło</a></center>
		</div> 
    </div>
  </div>

<!–//
//-----------------------
//--------------Tutaj
//-----------------------
–>


  <div class="modal fade" id="haslo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Zmien hasło</h4>
        </div>
        <div class="modal-body">
          <p>


<label for="email"> Nowe hasło:</label>
<input type="password" class="form-control" name="haslo" id="haslo" value="<?php echo $user_haslo ?>" placeholder="Podaj haslo">
<center><button type="submit" name="submit" class="btn btn-primary ">Zmień hasło</button></center>
</form>
          </p>
        </div>
      </div>
      
    </div>
  </div>




</div>
<?php include ("includy/stopka.php");?>
</body>
</html>