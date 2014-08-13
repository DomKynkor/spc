<?php
	include('db.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<title>Saint Peter Claver Behaviour Management - Search</title>
</head>

<body>

<?php include('templates/header.php');?>
<?php include('templates/nav.php');?>

<div class="content">
	<form name="search" method="POST">
		<!--Student-->
		<label class="loginLabel">Search:</label><input class="textform" type="text" name="search" value="<?php if(isset($_POST['search'])) echo $_POST['search'] ?>" placeholder="<?php if(isset($error['search'])) echo $error['search']; ?>" /> 
		
		<label class="loginLabel">By:</label>
		<select id='list' class="textform" name="type">
			<option value="student">Student</option><!--Error setup as well as default-->
			<option value="infraction">Infraction</option>
			<option value="date">Date</option>
		</select>
		<br /><br /><br />
		<button class="formSubmit" type="submit" name="submitSearch" value="submitSearch">Search</button>
	</form>
</div>
<?php

	if(isset($_POST['submitSearch']))
	{
		$search=$_POST['search'];
		$type=$_POST['type'];
		//Errors
		$error = array();
		

		if(count($error) === 0) 
		{
			/*
			if ($type === 'student') {
				$stmt = $mysqli->query("SELECT * FROM Entries WHERE student = '$search'");
			}
			if ($type === 'infraction') {
				$stmt = $mysqli->query("SELECT * FROM Entries WHERE type = '$search'");
			}
			if ($type === 'date') {
				$stmt = $mysqli->query("SELECT * FROM Entries WHERE time = '$search'");
			}
			*/

			if ($type === 'student') {
				$stmt = $mysqli->prepare("SELECT student, id, time, description, type, grade, level FROM Entries WHERE student = ?");
			}
			if ($type === 'infraction') {
				$stmt = $mysqli->prepare("SELECT student, id, time, description, type, grade, level FROM Entries WHERE type = ?");
			}
			if ($type === 'date') {
				$stmt = $mysqli->prepare("SELECT student, id, time, description, type, grade, level FROM Entries WHERE time = ?");
			}
			$stmt->bind_param('s', $search);

			$stmt -> execute();
			$stmt -> bind_result($student,$id,$time,$description,$infratype,$grade,$lvl);

			while ($stmt->fetch()) 
			{
				//$student=$result['student'];

				//To Be Formatted and Properly CSS'd

	   			print("<div class='result'><h4>$student (Grade:$grade)</h4>");
	   			print("<h4>$time ($infratype) $lvl</h4>");
	   			print("<p>$description</p></div>");
			}
			$stmt->close();
			$mysqli->close();
	}

	}

?>
<?php include('templates/footer.php');?>   
</body>
</html>