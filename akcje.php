<html>
<head>
	<meta charset="UTF-8">
	<title>Akcje | OSP Wojszczyce</title>
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

<h3></h3>
  <div class="panel panel-primary">
  	<div class="panel-heading"><h3>Wybierz zakres: </h3></div>
    <div class="panel-body">

<div class="table-responsive">
	<table class="table table-bordered table-condensed">
		<form method='POST'>
<table class="table table-bordered table-condensed">
			<tr>
				<th><label for="email">Start rok :</label></th>
				<th><label for="email">Start miesiąc :</label> </th>
				<th><label for="email">Koniec rok :</label> </th>
				<th><label for="email">Koniec miesiąc :</label> </th>
			</tr>
			<tr>
			<td>
      		<select class="form-control " id="rokp" name="rokp">
		      	<option value="2015">2015</option>
		      	<option value="2016">2016</option>
		      	<option value="2017">2017</option>
		      	<option value="2018">2018</option>
	      	</select>
 			</td>
 			<td>
      		<select class="form-control" id="miesp" name="miesp">
		      	<option value="01">Styczeń</option>
		      	<option value="02">Luty</option>
		      	<option value="03">Marzec</option>
		      	<option value="04">Kwiecień</option>
		      	<option value="05">Maj</option>
		      	<option value="06">Czerwiec</option>
		      	<option value="07">Lipiec</option>
		      	<option value="08">Sierpień</option>
		      	<option value="09">Wrzesień</option>
		      	<option value="10">Październik</option>
		      	<option value="11">Listopad</option>
		      	<option value="12">Grudzień</option>
     		</select>
 			</td>
 			<td>   			
      		<select class="form-control" id="rokk" name="rokk">
		      	<option value="2015">2015</option>
		      	<option value="2016">2016</option>
		      	<option value="2017">2017</option>
		      	<option value="2018">2018</option>
     		 </select>
 			</td>
 			<td>
			<select class="form-control" id="miesk" name="miesk">
		      	<option value="01">Styczeń</option>
		      	<option value="02">Luty</option>
		      	<option value="03">Marzec</option>
		      	<option value="04">Kwiecień</option>
		      	<option value="05">Maj</option>
		      	<option value="06">Czerwiec</option>
		      	<option value="07">Lipiec</option>
		      	<option value="08">Sierpień</option>
		      	<option value="09">Wrzesień</option>
		      	<option value="10">Październik</option>
		      	<option value="11">Listopad</option>
		      	<option value="12">Grudzień</option>
     		</select>
 			</td>
     		</tr>
	</table>
	<center><button type="submit" name="submit" class="btn btn-primary btn-lg">Pokaż akcje</button></center>
</form>



		<?php
  		if(isset($_POST['submit'])){
    		$rokp = $_POST['rokp'];
    		$miesp = $_POST['miesp'];
    		$rokk = $_POST['rokk'];
    		$miesk = $_POST['miesk'];

    		$dats=''.$rokp.'-'.$miesp.'-00';
    		$datk=''.$rokk.'-'.$miesk.'-32';

    		?>
    		<h3></h3>
  <div class="panel panel-primary">
  	<div class="panel-heading"><h3>Akcje od <?php echo $rokp.'-'.$miesp.' do '.$rokk.'-'.$miesk ?> </h3></div>
    <div class="panel-body">
    		<div class="table-responsive">
				<table class="table table-bordered table-condensed">
					<tr><th>Start działań</th><th>Koniec działań</th><th>Zdarzenie</th><th>Miejsce</th>
					<th>Ratownik</th><th>Czas działań</th></tr>
					<?php
					$list_query = mysql_query("SELECT * FROM akcje where DSTART>='$dats' and DSTART<='$datk' ORDER BY DSTART DESC");
					while($run_list = mysql_fetch_array($list_query)){
						$a_id = $run_list['IDAKCJI'];
						$a_start = $run_list['DSTART'];
						$a_stop = $run_list['DSTOP'];
						$a_zdarz = $run_list['ZDARZENIE'];
						$a_miejsc = $run_list['MIEJSCE'];
						$a_czas = $run_list['CZAS'];

						?>
						<tr><td><?php echo $a_start ?></td><td><?php echo $a_stop ?></td>
						<td><?php echo $a_zdarz ?></td><td><?php echo $a_miejsc ?></td>
						<td><?php 
						$rat_query = mysql_query("SELECT IDKONTA FROM przydzial WHERE IDAKCJI='$a_id'");
						while($run_rat = mysql_fetch_array($rat_query)){
							$rat_id = $run_rat['IDKONTA'];
							$zapyt = mysql_query("SELECT * FROM konta WHERE ID='$rat_id'");
							$qlim = mysql_fetch_array($zapyt);
							$qlim_imie = $qlim['IMIE'];
							$qlim_nazwisko = $qlim['NAZWISKO'];
							?>
							<?php echo $qlim_imie ?> <?php echo $qlim_nazwisko ?> <br/>
							<?php
						}
						?></td>
						<td><?php echo $a_czas ?></td></tr>
						<?php
					}
				?>
	</table>
</div> 

		</div> 
    </div>
  </div>

		<?php
	}
		?>
</div>


</div>
<?php include ("includy/stopka.php");?>
</body>
</html>