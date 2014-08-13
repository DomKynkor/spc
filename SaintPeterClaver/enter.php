<?php
	include('db.php');
	if(isset($_POST['submitEntry']))
	{
		$student=$_POST["student"];
		$student= ucfirst ($student);
		$grade=$_POST["grade"];
		$time=$_POST["time"];
		$infra=$_POST["infraction"];
		$other=$_POST["other"];
		$lvl=$_POST["infractionLevel"];
		$desc=$_POST["description"];

		/* Form error checking */
		$error = array();
		if(strlen($student) < 6 || strlen($student) > 40 ) 
		{
			$error['student'] = "Name between 6-40 characters.";
			unset($_POST["student"]);
		}
		if(!is_numeric($grade) || strlen($grade) != 1 || $grade== 9) 
		{
			$error['grade'] = "Must be in grades 1-8";
			unset($_POST["grade"]);
		}
		/*How to check for errors in time?*/
		if($infra=='none') 
		{
			$error['infraction'] = "infraction unset";
			/*set drop down to error*/
		}
		if($infra=='other')
		{
			if((strlen($other) < 3 || strlen($other) > 20 ))
			{
				$error['other']='Option must be between 3 and 20 characters';
			}
			else{
				$infra=$other;
			}
		}
		
		if(count($error) === 0) 
		{
			//Set up for Query
			$stmt = $mysqli->prepare("INSERT INTO Entries (student, time, description, type, grade, level) VALUES ('$student', '$time', '$desc', '$infra', '$grade', '$lvl')");
		
    		$stmt->bind_param("s", $student);
    		$stmt->bind_param("s", $time);
    		$stmt->bind_param("s", $desc);
    		$stmt->bind_param("s", $infra);
    		$stmt->bind_param("s", $lvl);

    		$stmt->execute();

    		$stmt->close();

    		$mysqli->close();
		}


	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<title>Saint Peter Claver Behaviour Management - Enter</title>
</head>

<body>

<?php include('templates/header.php');?><?php include('templates/nav.php');?>

<div class="content">

    <h2>New Entry</h2>
	<form name="enter" method="POST">
		<!--Student-->
		<label class="loginLabel">Student:</label><input class="textform" type="text" name="student" value="<?php if(isset($_POST['student'])) echo $_POST['student'] ?>" placeholder="<?php if(isset($error['student'])) echo $error['student']; ?>" />  <br />
		<!--Grade-->
		<label class="loginLabel">Grade:</label><input class="textform" type="number" min="1" max="8" name="grade" value="<?php if(isset($_POST['grade'])) echo $_POST['grade'] ?>" placeholder="<?php if(isset($error['grade'])) echo $error['grade']; ?>" /><br />
		<!--Time-->
		<label class="loginLabel">Date:</label><input class="textform" type="text" name="time" value="<?php if(isset($_POST['time'])) echo $_POST['time'] ?>" placeholder="<?php if(isset($error['time'])) echo $error['time']; ?>" /><br /> 
 		<!--Infraction-->
		<label class="loginLabel">Infraction:</label>
		<select id='list' class="textform" name="infraction">
			<option value="none">Select</option><!--Error setup as well as default-->
			<option value="fighting">Fighting</option>
			<option value="bullying">Bullying</option>
			<option value="gum">Gum</option>
			<option value="name">Name-calling</option>
			<option value="other">Other</option>
		</select>
		<script>
			document.getElementById("list").onchange=function test()
			{
				if(document["enter"]["infraction"].value=='other')
				{
					document.getElementById("other").style.visibility="visible"
					document.getElementById("otherlabel").style.visibility="visible"
				}
				else
				{
					document.getElementById("other").style.visibility="hidden"
					document.getElementById("otherlabel").style.visibility="hidden"
				}
			}
		</script>

		<label id="otherlabel" style="visibility:hidden" class="loginLabel">Other:</label><input id="other" type = text name ='other' class="textform" style="visibility:hidden" placeholder="<?php if(isset($error['other'])) echo $error['other']; ?>">
		<label class="loginLabel">Level:</label>
		<select id='list' class="textform" name="infractionLevel">
			<option value="Minor">Minor</option><!--Error setup as well as default-->
			<option value="Major">Major</option>
		</select>

		<br />
		<!--Description-->
		<label class="loginLabel">Description:</label><textarea class="textform" name="description" cols="70" rows="5" placeholder="Optional"></textarea><br /><br /><br /><br /><br /><br />
		<!--Submit-->
		<button class="formSubmit" type="submit" name="submitEntry" value="submitEntry">Submit</button>
		</form>


</div>

<?php include('templates/footer.php');?>   
</body>
</html>