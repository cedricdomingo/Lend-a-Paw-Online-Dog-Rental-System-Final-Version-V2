<?php 
session_start();

	include("db_connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$time = $_POST['time'];
		$date = date('Y-m-d',strtotime($_POST['date']));

		if(!empty($user_name)&&!empty($email)&&!empty($time)&&!empty($date)&& !is_numeric($user_name))
		{

			
			$user_id = random_num(20);
			$query = "insert into appointment (user_id,user_name,email,time,date) values ('$user_id','$user_name','$email','$time','$date')";

			mysqli_query($con, $query);

			header("Location: mainpage.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Book An Appointment</title>
	<?php include 'header.php'?>
</head>
<body>
   
	<style type="text/css">
	#box{

		background-color: #FFF0F5;
		margin: auto;
		width: 400px;
		padding: 20px;
		
	}
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #FFF0F5;
		width: 50%;
		margin-bottom: -65px;
		
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: #FFB6C1;
		border: none;
		position: absolute;
        right: 400px;
        top:450px
	}
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;text-align:center;">Appointment</div>
            <div>Username</div>
			<input id="text" type="text" name="user_name">
			 <div>Email</div>
			<input id="text" type="email" name="email">
			 <div>Date</div>
			<input id="text" type="date" name="date">
			 <div>Time</div>
			<input id="text" type="time" name="time"><br>

			<input id="button" type="submit" value="Book">
						
		</form>
	</div>
</body>
<?php include 'footer.php'?>
</html>