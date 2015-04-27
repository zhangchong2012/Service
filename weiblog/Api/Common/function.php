<?php
	function showErrorMsg($msg){
		echo $msg;
	}

	function initDatabases(){
		$hostName = C("DB_HOST");
		$dbName = C("DB_NAME");
		$dbPwd = C("DB_PWD");
		$con = mysql_connect($hostName,$dbName,$dbPwd);
		if (!$con){
			  die('Could not connect: ' . mysql_error());
		}

		
		mysql_close($con);
	}