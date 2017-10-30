<html>
<head>
  <meta charset="UTF-8">
  <title>Ustawienia funkcji | OSP Wojszczyce</title>
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
    <div class="panel-heading"><h3><i class="fa fa-users fa-fw"></i> Ustawienia funkcji</h3></div>
    <div class="panel-body">


          <?php
              if(isset($_GET['f']) && !empty($_GET['f'])){
                $e = $_GET['f'];
                if ($e=='edit'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Zapisano zmiany
                  </div>
                <?php
                }elseif($e=='add'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Dodano funkcję
                  </div><?php
                }elseif($e=='del'){?>
                  <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Usunięto funkcję
                  </div><?php
          }}?>

<p><center>
  <a class="btn btn-success" href="dodaj.php?f=$f_id"><i class="fa fa-pencil-square-o fa-fw"></i>Dodaj funkcję</a>
  </center>
 <div class="table-responsive">
  <table class="table table-condensed">
    <tr><th width="25px">NR</th><th width="350px">Nazwa</th>
      <th></th><th></th></tr>
    <?php
    $list_query = mysql_query("SELECT * FROM funkcja");
    while($run_list = mysql_fetch_array($list_query)){
      $f_id = $run_list['ID'];
      $f_nazwa = $run_list['NAZWA'];
    ?>
    <tr>
      <td><?php echo $f_id ?></td><td><?php echo $f_nazwa ?></td>
      <td><i class="fa fa-pencil-square-o"></i> <?php
        echo "<a href='edycja.php?f=$f_id'>Edytuj</a>";
      ?></td>
      <td><i class="fa fa-trash-o"></i> <?php
        echo "<a href='includy/opcje.php?u_id=$f_id&kasuj=f'>Kasuj</a>";
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

</div>
<?php include ("includy/stopka.php");?>
</body>
</html>