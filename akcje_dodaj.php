<html>
<head>
	<meta charset="UTF-8">
	<title>Ustawienia akcji | OSP Wojszczyce</title>
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
if($user_lvl != 1){
  header('location: profil.php');
}


if(isset($_GET['akcja']) && !empty($_GET['akcja'])){
?> 
<div class="container">
  <h3></h3>
    <div class="panel panel-primary"> 
      <div class="panel-heading"><h3>Dodaj akcję: </h3></div>
        <div class="panel-body">


<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $numer = $_POST['numer'];
    $dstart = $_POST['dstart'];
    $dstop = $_POST['dstop'];
    $zdarzenie = $_POST['zdarzenie'];
    $miejsce = $_POST['miejsce'];
    $a_time =((strtotime($dstop) - strtotime($dstart)));
    $czas = date('H:i:s', $a_time -3600);


    if(empty($numer) or empty($dstart) or empty($dstop) or empty($zdarzenie) or empty($miejsce)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Pola puste
      </div><?php
    } else {
      $check_akcja=mysql_query("SELECT NUMER FROM akcje WHERE NUMER='$numer'");
      if (mysql_num_rows($check_akcja) == 0) {
      mysql_query("INSERT INTO akcje VALUES('','$numer','$dstart','$dstop','$zdarzenie','$miejsce','$czas')");
      header('location: ../admin_akcje.php?akcja=add');
     }else{?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Numer akcji już istnieje!
      </div><?php      
     }
    }
  }
?>
<div class="table-responsive">
  <table class="table table-bordered text-center table-condensed">
<tr><th>
  <label for="email">Numer akcji (nr/rok):</label>
</th><th>
<label for="email">Data start (rrrr-mm-dd hh:mm:ss):</label>
</th><th>
<label for="email">Data stop (rrrr-mm-dd hh:mm:ss):</label>
</th><th>
 <label for="email">Zdarzenie:</label>
</th><th>
 <label for="email">Miejsce:</label>
</th></tr>
<tr><td>
  <input type="text" class="form-control" name="numer" id="numer" placeholder="Podaj numer akcji">
</td><td>
<input type="text" class="form-control" name="dstart" id="dstart" placeholder="Podaj start akcji">
</td><td>
<input type="text" class="form-control" name="dstop" id="dstop" placeholder="Podaj koniec akcji">
</td><td>
<input type="text" class="form-control" name="zdarzenie" id="zdarzenie" placeholder="Podaj zdarzenie">
</td><td>
<input type="text" class="form-control" name="miejsce" id="miejsce" placeholder="Podaj miejsce">
</td></tr>
</div>
</table>

<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Dodaj akcję</button></center>
</form>

<?php
}
?>


    		</div>
    	</div>
	</div>
</div>
<?php include ("includy/stopka.php");?>
</body>
</html>