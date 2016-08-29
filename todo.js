        add_task();
		delete_task(); 
        add_task_noauth();
		
		function add_task() {

			$('.add-btn').click(function(){
		
            var x=document.forms["task-value"]["new-task"].value;
			if(x.length==0){
				document.getElementById("namef").innerHTML = "Please, add your task...";
				return false;
			}else{

				var new_task = $('.add-new-task input[name=new-task]').val();

				if(new_task != ''){

					$.post('add-task.php', { task: new_task }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');

						$(data).appendTo('.task-list ul').hide().fadeIn();

						delete_task();
					});}
			}

				return false; 
			});
			}
			
			
		function delete_task() {

			$('.delete-button').click(function(){

				var current_element = $(this);

				var id = $(this).attr('id');

				$.post('delete-task.php', { task_id: id }, function() {

					current_element.parent().fadeOut("fast", function() { $(this).remove(); });
				});
			});
		}
		
		
		function add_task_noauth() {

			$('.add-btn').click(function(){
		
            var x=document.forms["task-value"]["new-task"].value;
			if(x.length==0){
				document.getElementById("namef").innerHTML = "Please, add your task...";
				return false;
			}else{

				var new_task = $('.add-new-task input[name=new-task]').val();

				if(new_task != ''){

					$.post('add-task-noauth.php', { task: new_task }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');

						$(data).appendTo('.task-list ul').hide().fadeIn();

						delete_task();
					});}
			}

				return false;
			});
			}
