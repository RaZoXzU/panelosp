<html>
<head>
  <meta charset="UTF-8">
  <title>Ustawienia kont | OSP Wojszczyce</title>
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
              if(isset($_GET['konto']) && !empty($_GET['konto'])){
                $e = $_GET['konto'];
                if ($e=='edit'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Zapisano zmiany
                  </div>
                <?php
                }elseif($e=='add'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Dodano konto
                  </div><?php
                }elseif($e=='del'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Usunięto konto
                  </div><?php
          }}?>
<p><center>
  <a class="btn btn-success" href="dodaj.php?konto=$u_id"><i class="fa fa-user-plus fa-fw"></i> Dodaj konto</a>
  </center>
 <div class="table-responsive">
  <table class="table table-condensed">
    <tr><th width="25px">NR</th><th width="350px">Konto</th>       
      <th></th><th>Opcje</th><th></th></tr>
    <?php
    $list_query = mysql_query("SELECT ID, LOGIN, IMIE, NAZWISKO, TYP FROM konta");
    while($run_list = mysql_fetch_array($list_query)){
      $u_id = $run_list['ID'];
      $u_login = $run_list['LOGIN'];
      $u_imie = $run_list['IMIE'];
      $u_nazwisko = $run_list['NAZWISKO'];
      $u_type = $run_list['TYP'];
    ?>
    <tr>
      <td><?php echo $u_id ?></td><td>[<?php echo $u_login ?>] <?php echo $u_imie ?> <?php echo $u_nazwisko ?></td>
      <td><i class="fa fa-pencil-square-o"></i> <?php
        echo "<a href='edycja.php?konto=$u_id'>Edytuj</a>";
      ?></td>
      <td><i class="fa fa-trash-o"></i> <?php
        echo "<a href='includy/opcje.php?u_id=$u_id&kasuj=k'>Kasuj</a>";
      ?></td>
      <td>
              <?php
      if($u_type == 'a'){
        ?><i class="fa fa-toggle-on"></i><?php
        echo " <a href='includy/opcje.php?u_id=$u_id&type=$u_type'>Dezaktywuj</a>";
      }else{
        ?><i class="fa fa-toggle-off"></i><?php
        echo " <a href='includy/opcje.php?u_id=$u_id&type=$u_type'>Aktywuj</a>";
      }
      ?>
      </td> 
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

</div>
<?php include ("includy/stopka.php");?>
</body>
</html>