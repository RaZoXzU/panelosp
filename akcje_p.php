<html>
<head>
	<meta charset="UTF-8">
	<title>Nasze akcje | OSP Wojszczyce</title>
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
<h3></h3>
  <div class="panel panel-primary">
  	<div class="panel-heading"><h3>Nasze akcje:</h3></div>
    <div class="panel-body">
<div class="table-responsive">
	<table class="table table-condensed">
		<tr><th>Numer</th><th>Start działań</th><th>Zdarzenie</th><th>Miejsce</th></tr>
		<?php
		$list_query = mysql_query("SELECT * FROM akcje ORDER BY DSTART DESC");
		while($run_list = mysql_fetch_array($list_query)){
			$num_a = $run_list['NUMER'];
			$a_start = $run_list['DSTART'];
			$a_zdarz = $run_list['ZDARZENIE'];
			$a_miejsc = $run_list['MIEJSCE'];


		?>
		<tr><td><?php echo $num_a ?></td><td><?php echo $a_start ?></td>
		<td><?php echo $a_zdarz ?></td><td><?php echo $a_miejsc ?></td></tr>
		<?php
		}
		?>
	</table>
</div> 

		</div> 
    </div>
  </div>

</div>
<?php include ("includy/stopka.php");?>
</body>
</html>