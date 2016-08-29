<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<title>To-Do List</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="todo.js"></script>
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="jumbotron">
    <div id="reg_log"><a href="login.php">Login</a> <a href="registration.php">Registration</a></div><br/>
	
	<header id="header_text">
	<p id="todolist">simple todo list </p>
	<p id="rubygarage">from ruby garage</p>
    </header>
	
	
	<div class="conteiner">
	<div class="panel panel-primary">
	<div class="  panel-heading" >
			   
	  	      <p> <span class="task-name">Simple TODO List</span></p>
			  <br>
		      	
    </div>
	
	<div class="panel-body jumbotron">
	<form name="task-value" class="add-new-task" autocomplete="off" onsubmit="return validateForm()" method="post">
	        <span id="addTaskPlus" class="add-btn glyphicon glyphicon-plus" aria-hidden="true"></span>
			<div  class="input-group">
			<input id="task-input" type="text" name="new-task" class="form-control" placeholder="Start typing here to create a task..." aria-describedby="basic-addon2" required />
			 <span class="input-group-btn">
			<button type="submit" class="add-btn btn btn-success">Add Task</button>
			</span>
			</div>
	</form>
	</div>
	
		<div class="task-list">
			<ul>

			<?php 
				require("connect.php");
				$ip = $_SERVER["REMOTE_ADDR"];
                
				$query = mysql_query("SELECT * FROM tasks WHERE ip LIKE '$ip' ORDER BY date ASC, time ASC");
				$numrows = mysql_num_rows($query);

				if($numrows>0){
					while( $row = mysql_fetch_assoc( $query ) ){

						$task_id = $row['id'];
						$task_name = $row['task'];

						echo '<li>
								<span class="task-name">'.$task_name.'</span>
								<span id="'.$task_id.'" class="delete-button glyphicon glyphicon-trash"/>
							  </li>';
					}
				}

			?>
				
			</ul>
		</div>
		</div>
		
		
		
	</div>
	<div id="btn_add">
	<button name="send_button_2" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add TODO List</button>
	</div>
</body>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		add_task_noauth();
		delete_task();
	</script>

	<footer>
	<p> <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>Ruby Garage</p>
</footer>
</html>