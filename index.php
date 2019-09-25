<?php session_start(); ?>
<!DOCTYPE HTML>
	<html>
		<head>
			<title>Educate the Children | Working to improve the lives of women and children in Nepal</title>
			<link rel = "stylesheet" href = "stylesheets/css/main.css">
			<?php include "content/includes/header.php"; ?>
		</head>
		<body id="home">
			<?php include "content/includes/nav.php"; ?>

			<!-- Intro block -->
			<div class='container' id="content-1">
				<h2>Working to improve the lives of women and children in Nepal.</h2>
				<p class='center-text'>Fostering health, welfare, and self-sufficiency for later generations.</p>
				<a href="content/pages/sub/approach.php" id = 'button-1' class = 'home-button'>Learn More</a>
			</div>

			<!-- Programs block -->
			<div class ='container' id='content-4'>
				<div class = 'textsection'>
					<h1>What We Do</h1>
					<p class='center-text'>ETC's model builds self-reliance in dalit and janajati communities by ensuring quality 
						education for children and adults through programs that build awareness and foster 
						sustainable and improvements over the standard of living.</p>
				</div>
				<div id = 'programs-container'>
					<a href="content/pages/sub/empowerment.php">
						<div class="img-container">
							<h2 id = 'women'> Women's <br> Empowerment</h2>
							<img src = "assets/img/programs/programs-1.jpg" class="vert-img" id = 'program1' alt = 'program-1'>
						</div>
					</a>
					<a href="content/pages/sub/education.php">
						<div class="img-container">
							<h2 id = 'education'> Children's <br> Education</h2>
							<img src = "assets/img/programs/programs-2.jpg" class="horiz-img" id = 'program2' alt = 'program-2'>
						</div> 
					</a>
					<a href="content/pages/sub/development.php">
						<div class="img-container">
							<h2 id = 'agriculture'> Agricultural <br> Development</h2>
							<img src = "assets/img/programs/programs-3.jpg" class="horiz-img" id = 'program3' alt = 'program-3'>
						</div>
					</a>
				</div>
			</div>

			<!-- Newsletter Block -->
			<div class ='container' id='content-5'>
				<div id = 'newsletter'>
					<h2 id = 'title'>Stay in the loop!</h2>
					<p class='center-text'>Sign up for our newsletter to get the most recent updates and photos from
					our programs in Nepal</p>
				</div>
				<form method = 'post'>
					<input type = 'text' id = 'email' name = 'email' placeholder = 'Your Email'/>
					<input type = 'submit' name = 'signin' class = 'home-button' value = 'sign up'><p id ='email_warning'></p>
					<script type="text/javascript">
					var email_input = document.getElementById('email');
					var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					email_input.onblur = function(){
						if (email_input.value == ''){
							document.getElementById('email_warning').innerHTML = "Please type in an email";
						}
						else if(!re.test(email_input.value)){
							document.getElementById('email_warning').innerHTML = "Please enter a valid email";
						}
						else{
							document.getElementById('email_warning').innerHTML = "";
						}
					}
					</script>
				</form>
			</div>
			<?php

			if(isset($_POST['signin'])){
				if(!empty($_POST['email']) && preg_match("/^[A-z0-9;!,\.\-\$\#()' *]+$/", $_POST['email']) && strlen(trim($_POST['email']))<500){
					$email = strip_tags(htmlentities($_POST['email']));
					require_once "content/includes/config.php";
					$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
					if ($mysqli->connect_error) {
				    	die("Connection failed: " . $mysqli->connect_error);
					}
					$query = "INSERT INTO subscribers(`email`) VALUES ('".$email."')";
	       		    $mysqli -> query($query);
        		    $mysqli -> close();

				}
				else{
					$message = "Please enter a valid email";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			}
			?>

			<?php include("content/includes/footer.php"); ?>
		</body>
	</html>