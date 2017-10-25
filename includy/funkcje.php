<?php
session_start();

function zalogowany(){
	if(isset($_SESSION['ID'])&& !empty($_SESSION['ID'])){
		return true;
		} else {
		return false;
	}
}

if(zalogowany()){
	$my_id = $_SESSION['ID'];
	$user_query = mysql_query("SELECT * FROM konta WHERE ID='$my_id'");
	$run_user = mysql_fetch_array($user_query);
	$login = $run_user['LOGIN'];
	$user_lvl = $run_user['LVL'];
	$user_stop = $run_user['STOPIEN'];
	$user_imie = $run_user['IMIE'];
	$user_nazwisko = $run_user['NAZWISKO'];
	$user_telefon = $run_user['TELEFON'];
	$user_badania = $run_user['BADANIA'];
	$user_ubezpieczenie = $run_user['UBEZPIECZENIE'];
	$user_start = $run_user['START'];

	$query_stop = mysql_query("SELECT NAZWA FROM stopnie WHERE ID = '$user_stop'");
	$run_stop = mysql_fetch_array($query_stop);
	$stop_name = $run_stop['NAZWA'];

	$query_lvl = mysql_query("SELECT NAZWA FROM funkcja WHERE ID = '$user_lvl'");
	$run_lvl = mysql_fetch_array($query_lvl);
	$lvl_name = $run_lvl['NAZWA'];

}

?>