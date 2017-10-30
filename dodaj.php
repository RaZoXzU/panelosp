<html>
<head>
  <meta charset="UTF-8">
  <title>Dodawanie | OSP Wojszczyce</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>


<!–//
-----------------------
//------Dodawanie konta
//-----------------------
–>
<?php 
include ("includy/baza.php");
include ("includy/funkcje.php");
include ("includy/tytul.php");

if($user_lvl != 1){
  header('location: profil.php');
}


if(isset($_GET['konto']) && !empty($_GET['konto'])){
?> 
<div class="container">
  <h3></h3>
    <div class="panel panel-primary"> 
      <div class="panel-heading"><h3>Dodawanie konta: </h3></div>
        <div class="panel-body">


<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $plogin = $_POST['login'];
    $phaslo = $_POST['haslo'];
    $pimie = $_POST['imie'];
    $pnazwisko = $_POST['nazwisko'];
    $ptelefon = $_POST['telefon'];
    $pbadania = $_POST['badania'];
    $pubezpieczenie = $_POST['ubezpieczenie'];
    $pstart = $_POST['start'];
    $plvl = $_POST['funkcja'];
    $pstopien = $_POST['stopien'];
    if(empty($plogin) or empty($phaslo)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Login lub hasło puste
      </div><?php
    } else {
      $check=mysql_query("SELECT LOGIN FROM konta WHERE LOGIN='$plogin'");
      if (mysql_num_rows($check) == 0) {
        mysql_query("INSERT INTO konta VALUES('','$plogin','$pimie','$pnazwisko','$phaslo','$ptelefon','$pbadania','$pubezpieczenie','$pstart','$plvl','a','$pstopien')");
        header('location: ../admin.php?konto=add');
      }else{?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Login już istnieje!
        </div><?php
      }
    }
  }
?>

<label for="email">Login:</label>
<input type="text" class="form-control" name="login" id="login" placeholder="Podaj login">
 <label for="email">Imię:</label>
<input type="text" class="form-control" name="imie" id="imie" placeholder="Podaj imię">
 <label for="email">Nazwisko:</label>
<input type="text" class="form-control" name="nazwisko" id="nazwisko" placeholder="Podaj nazwisko">
 <label for="email">Hasło:</label>
<input type="password" class="form-control" name="haslo" id="haslo" placeholder="Podaj haslo">
 <label for="email">Telefon:</label>
<input type="text" class="form-control" name="telefon" id="telefon" placeholder="XXX-XXX-XXX">
<label for="email">Badania:</label>
<input type="text" class="form-control" name="badania" id="badania" placeholder="rrrr-mm-dd">
 <label for="email">Ubezpieczenie:</label>
<input type="text" class="form-control" name="ubezpieczenie" id="ubezpieczenie" placeholder="rrrr-mm-dd">
 <label for="email">Start od:</label>
<input type="text" class="form-control" name="start" id="start" placeholder="Podaj rok wstąpienia">
 <label for="email">Funkcja (lvl):</label>      
      <select class="form-control" id="funkcja" name="funkcja">
          <?php
          $f_query = mysql_query("SELECT * FROM funkcja");
          while($f_list = mysql_fetch_assoc($f_query)){
            $f_id = $f_list['ID'];
            $f_nazwa = $f_list['NAZWA'];
            echo '<option value="'.$f_id.'">'.$f_nazwa.'</option>';
            } 
            ?>
      </select>
<label for="email">Stopień:</label>
      <select class="form-control" id="stopien" name="stopien">
          <?php
          $s_query = mysql_query("SELECT * FROM stopnie");
          while($s_list = mysql_fetch_assoc($s_query)){
            $s_id = $s_list['ID'];
            $s_nazwa = $s_list['NAZWA'];
            echo '<option value="'.$s_id.'">'.$s_nazwa.'</option>';
            } 
            ?>
      </select>

<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Dodaj konto</button></center>
</form>

<?php
}
if(isset($_GET['s']) && !empty($_GET['s'])){
?>  
<!–//
-----------------------
//------Dodawanie stopnia
//-----------------------
–>
<div class="container">
  <h3></h3>
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Dodawanie stopnia: </h3></div>
        <div class="panel-body">
<form method='post'>
<?php
  if(isset($_POST['submit'])){
    $nazwa = $_POST['nazwa'];
    if(empty($nazwa)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Nazwa pusta
      </div><?php
    } else {
      mysql_query("INSERT INTO stopnie VALUES('','$nazwa')");
      header('location: ../admin_stopnie.php?s=add');
    }
  }
?>
<label for="email">Nazwa:</label>
<input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="Podaj nazwe">
<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Dodaj stopień</button></center>
</form>
<?php
}
if(isset($_GET['f']) && !empty($_GET['f'])){
?>  
<!–//
-----------------------
//------Dodawanie funkcji
//-----------------------
–>
<div class="container">
  <h3></h3>
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Dodawanie funkcji: </h3></div>
        <div class="panel-body">
<form method='post'>
<?php
  if(isset($_POST['submit'])){
    $nazwa = $_POST['nazwa'];
    if(empty($nazwa)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Nazwa pusta
      </div><?php
    } else {
      mysql_query("INSERT INTO funkcja VALUES('','$nazwa')");
      header('location: ../admin_funkcje.php?f=add');
    }
  }
?>
<label for="email">Nazwa:</label>
<input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="Podaj nazwe">
<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Dodaj funkjcę</button></center>
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