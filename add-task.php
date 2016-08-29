<?php 
session_start();
	$task = strip_tags( $_POST['task'] );
	$date = date('Y-m-d');
	$time = date('H:i:s');
    $ip = $_SESSION['login'];
	require("connect.php");
   
       if(!$task){
	   return false;
   }else{
	
	mysql_query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time','$ip')");

	$query = mysql_query("SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

	while( $row = mysql_fetch_assoc($query) ){
		$task_id = $row['id'];
		$task_name = $row['task'];
	}

	mysql_close();

	echo '<li><span class="task-name">'.$task_name.'</span><span id="'.$task_id.'" class="delete-button glyphicon glyphicon-trash" /></li>';
        }
	?>