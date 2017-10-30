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

<div class="container">

<?php
if($user_lvl != 1){
  header('location: profil.php');
}
?>

<h3></h3>
  <div class="panel panel-primary">
    <div class="panel-heading"><h3><i class="fa fa-pencil-square-o fa-fw"></i> Ustawienia kont</h3></div>
    <div class="panel-body">
           <?php
              if(isset($_GET['akcja']) && !empty($_GET['akcja'])){
                $e = $_GET['akcja'];
                if ($e=='edit'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Zapisano zmiany
                  </div>
                <?php
                }elseif($e=='add'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Dodano akcję
                  </div><?php
                }elseif($e=='del'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Usunięto akcję
                  </div><?php
          }}?>
<p><center>
  <a class="btn btn-success" href="akcje_dodaj.php?akcja=$u_id"><i class="fa fa-user-plus fa-fw"></i> Dodaj akcję</a>
  </center>
 <div class="table-responsive">
  <table class="table table-condensed">
    <tr><th width="25px">NR</th><th width="350px">Zdarzenie</th>       
      <th>Miejsce</th><th>Opcje</th><th></th></tr>
    <?php
    $list_query = mysql_query("SELECT * FROM akcje ORDER BY DSTART DESC");
    while($run_list = mysql_fetch_array($list_query)){
      $a_id = $run_list['NUMER'];
      $a_start = $run_list['DSTART'];
      $a_stop = $run_list['DSTOP'];
      $a_zdarzenie = $run_list['ZDARZENIE'];
      $a_miejsce = $run_list['MIEJSCE'];
      $a_czas = $run_list['CZAS'];
    ?>
    <tr>
      <td><?php echo $a_id ?></td><td><?php echo $a_zdarzenie ?></td>
      <td><?php echo $a_miejsce ?></td>
      <td><i class="fa fa-pencil-square-o"></i> <?php
        echo "<a href='edycja.php?konto=$u_id'>Edytuj</a>";
      ?></td>
      <td><i class="fa fa-trash-o"></i> <?php
        echo "<a href='includy/opcje.php?u_id=$a_id&kasuj=a'>Kasuj</a>";
      ?></td>
  </tr>
    <?php
    } 
    ?>
    
  </table>
</div> 
</p>

    </div>
  </div>
</div>


  <div class="modal fade" id="dodaj" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Dodaj</h4>
        </div>
        <div class="modal-body">


<form method='POST'>
<?php
  if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];
    $badania = $_POST['badania'];
    $ubezpieczenie = $_POST['ubezpieczenie'];
    $start = $_POST['start'];
    $lvl = $_POST['funkcja'];
    $stopien = $_POST['stopien'];
    if(empty($login) or empty($haslo)){?>
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Login lub hasło puste
      </div><?php
    } else {
      mysql_query("INSERT INTO konta VALUES('','$login','$imie','$nazwisko','$haslo','$telefon','$badania','$ubezpieczenie','$start','$lvl','d','$stopien')");
      ?>
      <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Zarejestrowano
      </div><?php
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
      <select class="form-control" id="funkcja">
          <?php
          $f_query = mysql_query("SELECT * FROM funkcja");
          while($f_list = mysql_fetch_array($f_query)){
            $f_id = $f_list['ID'];
            $f_nazwa = $f_list['NAZWA'];
          ?>
            <option value="<?php $f_id ?>"><?php echo $f_nazwa ?></option>
            <?php
            } 
            ?>
      </select>
 <label for="email">Stopień:</label>
      <select class="form-control" id="stopien">
          <?php
          $s_query = mysql_query("SELECT * FROM stopnie");
          while($s_list = mysql_fetch_array($s_query)){
            $s_id = $s_list['ID'];
            $s_nazwa = $s_list['NAZWA'];
          ?>
            <option value="$s_id ?>"><?php echo $s_nazwa ?></option>
            <?php
            } 
            ?>
      </select>

<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Dodaj konto</button></center>
</form>


    </div>
  </div>
</div>




</div>
<?php include ("includy/stopka.php");?>
</body>
</html>