<?php
include ("../includy/baza.php");
include ("../includy/funkcje.php");

$u_id = $_GET['u_id'];

if(isset($_GET['type']) && !empty($_GET['type'])){
	$type = $_GET['type'];
	if($type == 'a'){
		mysql_query("UPDATE konta SET typ='d' WHERE ID='$u_id'");
		header('location: ../admin.php');
	}elseif($type == 'd'){
		mysql_query("UPDATE konta SET typ='a' WHERE ID='$u_id'");
		header('location: ../admin.php');	
	};
};

if(isset($_GET['kasuj']) && !empty($_GET['kasuj'])){
	$kasuj = $_GET['kasuj'];
	if($kasuj==k){
			mysql_query("DELETE FROM konta WHERE ID='$u_id'");
			header('location: ../admin.php?konto=del');
	}elseif($kasuj==f){
			mysql_query("DELETE FROM funkcja WHERE ID='$u_id'");
			header('location: ../admin_funkcje.php?f=del');
	}elseif($kasuj==s){
			mysql_query("DELETE FROM stopnie WHERE ID='$u_id'");
			header('location: ../admin_stopnie.php?s=del');
	}elseif($kasuj==a){
			mysql_query("DELETE FROM akcje WHERE IDAKCJI='$u_id'");
			header('location: ../admin_akcje.php?akcja=del');
	};};
?>