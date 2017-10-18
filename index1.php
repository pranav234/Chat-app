<!DOCTYPE html>
<html>
<head>
	<title>Pranav Chat App</title>
	<link rel="stylesheet" href="style.css" media="all" />

   <script> 
   function chat_ajax()
{ 
	var req = new XMLHttpRequest();
 req.onreadystatechange = function()
  { 
  	if(req.readyState == 4 && req.status == 200)
  { 
  	document.getElementById('chat_box').innerHTML = req.responseText; }
   } 
req.open('GET', 'chat.php', true);
 req.send(); 
}
 setInterval(function(){chat_ajax()}, 1000)






  </script>







</head>
<style>
* {
	margin: 0;
	padding:0;
	border: 0;

}

#container{ width: 40%; background: white; margin: 0 auto; padding: 20px; } 
#chat_box{ width: 90%; height: 400px; } #chat_data{ width: 100%; padding: 5px; margin-bottom: 5px; border-bottom: 1px solid silver; font-weight: bold; } 
input[type="text"]{ width: 100%; height: 40px; border: 1px solid grey; border-radius: 5px; } input[type="submit"]{ width: 100%; height: 40px; border: 1px solid grey; border-radius: 5px; } 
textarea{ width: 100%; height: 40px; border: 1px solid grey; border-radius: 5px; }
.my{
  width:30%;
  text-align: center;
  border: 1px solid;
}



</style>
<?php
include 'db.php';

?>
<body>
   

	<div id="container">
		<div id="chat_box">
			
			</div>
				</div>

	<form method="post" action="index1.php">
		<input type="text" name="name" placeholder="Enter name :">
		<textarea name="enter message" placeholder="Enter message"></textarea>
        <input type="Submit" name="submit" value="Send!"/>
         
     

        </form>

     <form method="post" action="index1.php">
     <input type="text" name="user1" placeholder="Enter name to be deleted">
             <input type="Submit" name="submit1" value="Delete" class="my"  />
     </form>   

        <?php
          if(isset($_POST['submit'])) {

          	$name=$_POST['name'];
          	$msg=$_POST['enter_message'];

          	$query="INSERT INTO chat (name,msg) VALUES ('$name','$msg')";
          	$run=$conn->query($query);
          }

         ?>

         
     
     
     <?php 
       if(isset($_POST['submit1'])) {
       	$user=$_POST['user1'];

       $query="DELETE FROM chat WHERE name='$user' ";
       $run=$conn->query($query);



       }


     ?>

    </div>

	

</body>
</html>


