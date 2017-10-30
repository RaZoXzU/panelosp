<html>
<head>
  <meta charset="UTF-8">
  <title>Edycja | OSP Wojszczyce</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

<!–//
-----------------------
//------Edycja konta
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
  $u_id = $_GET['konto'];
  $edit_query = mysql_query("SELECT * FROM konta WHERE ID='$u_id'");
  $run_edit = mysql_fetch_array($edit_query);
  $edit_login = $run_edit['LOGIN'];
  $edit_haslo = $run_edit['HASLO'];
  $edit_lvl = $run_edit['LVL'];
  $edit_stop = $run_edit['STOPIEN'];
  $edit_imie = $run_edit['IMIE'];
  $edit_nazwisko = $run_edit['NAZWISKO'];
  $edit_telefon = $run_edit['TELEFON'];
  $edit_badania = $run_edit['BADANIA'];
  $edit_ubezpieczenie = $run_edit['UBEZPIECZENIE'];
  $edit_start = $run_edit['START'];
?>

<div class="container">
  <h3></h3>
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Edycja konta: <b><?php echo $edit_login ?></b></h3></div>
        <div class="panel-body">



<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $phaslo = $_POST['haslo'];
    $pimie = $_POST['imie'];
    $pnazwisko = $_POST['nazwisko'];
    $ptelefon = $_POST['telefon'];
    $pbadania = $_POST['badania'];
    $pubezpieczenie = $_POST['ubezpieczenie'];
    $pstart = $_POST['start'];
    $plvl = $_POST['funkcja'];
    $pstopien = $_POST['stopien'];
    if(empty($phaslo)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         Hasło puste
      </div><?php
    } else {
      mysql_query("UPDATE konta SET  IMIE='$pimie', NAZWISKO='$pnazwisko', HASLO='$phaslo', TELEFON='$ptelefon', BADANIA='$pbadania', UBEZPIECZENIE='$pubezpieczenie', START='$pstart',LVL='$plvl', STOPIEN='$pstopien' WHERE ID='$u_id'");
	  header('location: ../admin.php?konto=edit');
    }
  }
?>


 <label for="email">Imię:</label>
<input type="text" class="form-control" name="imie" id="imie" placeholder="Podaj imię" value="<?php echo $edit_imie ?>">
 <label for="email">Nazwisko:</label>
<input type="text" class="form-control" name="nazwisko" id="nazwisko" placeholder="Podaj nazwisko" value="<?php echo $edit_nazwisko ?>">
 <label for="email">Hasło:</label>
<input type="password" class="form-control" name="haslo" id="haslo" placeholder="Podaj haslo" value="<?php echo $edit_haslo ?>">
 <label for="email">Telefon:</label>
<input type="text" class="form-control" name="telefon" id="telefon" placeholder="XXX-XXX-XXX" value="<?php echo $edit_telefon ?>">
<label for="email">Badania:</label>
<input type="text" class="form-control" name="badania" id="badania" placeholder="rrrr-mm-dd" value="<?php echo $edit_badania ?>">
 <label for="email">Ubezpieczenie:</label>
<input type="text" class="form-control" name="ubezpieczenie" id="ubezpieczenie" placeholder="rrrr-mm-dd" value="<?php echo $edit_ubezpieczenie ?>">
 <label for="email">Start od:</label><br/>
<input type="text" class="form-control" name="start" id="start" placeholder="Podaj rok wstąpienia" value="<?php echo $edit_start ?>">
  <label for="email">Funkcja (lvl):</label>      
      <select class="form-control" id="funkcja" name="funkcja">
          <?php
          echo '<option value="'.$edit_lvl.'">Obecna</option>';
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
          echo '<option value="'.$edit_stop.'">Obecny</option>';
          $s_query = mysql_query("SELECT * FROM stopnie");
          while($s_list = mysql_fetch_assoc($s_query)){
            $s_id = $s_list['ID'];
            $s_nazwa = $s_list['NAZWA'];
            echo '<option value="'.$s_id.'">'.$s_nazwa.'</option>';
            } 
            ?>
      </select>
<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Zapisz zmiany</button></center>
</form>

<?php
}
if(isset($_GET['s']) && !empty($_GET['s'])){
  $s_id = $_GET['s'];
          $s_query = mysql_query("SELECT NAZWA FROM stopnie WHERE ID='$s_id'");
          while($s_list = mysql_fetch_assoc($s_query)){
            $s_nazwa = $s_list['NAZWA'];
          }
?>
<!–//
-----------------------
//------Edycja stopnia
//-----------------------
–>
<div class="container">
  <h3></h3>
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Edycja stopnia: <b><?php echo $s_nazwa ?></b></h3></div>
        <div class="panel-body">

<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $ps_nazwa = $_POST['nazwa'];
      mysql_query("UPDATE stopnie SET NAZWA='$ps_nazwa' WHERE ID='$s_id'");
      header('location: ../admin_stopnie.php?s=edit');
  }
?>
<label for="email">Nowa nazwa:</label>
<input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="Podaj nową nazwę" value="<?php echo $s_nazwa ?>">
<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Zapisz zmiany</button></center>
</form>

<?php
}
if(isset($_GET['f']) && !empty($_GET['f'])){
  $f_id = $_GET['f'];
          $f_query = mysql_query("SELECT NAZWA FROM funkcja WHERE ID='$f_id'");
          while($f_list = mysql_fetch_assoc($f_query)){
            $f_nazwa = $f_list['NAZWA'];
          }
?>
<!–//
-----------------------
//------Edycja funkcji
//-----------------------
–>
<div class="container">
  <h3></h3>
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Edycja funkcji: <b><?php echo $f_nazwa ?></b></h3></div>
        <div class="panel-body">

<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $pf_nazwa = $_POST['nazwa'];
      mysql_query("UPDATE funkcja SET NAZWA='$pf_nazwa' WHERE ID='$f_id'");
      header('location: ../admin_funkcje.php?f=edit');
  }
?>
<label for="email">Nowa nazwa:</label>
<input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="Podaj nową nazwę" value="<?php echo $f_nazwa ?>">
<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Zapisz zmiany</button></center>
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