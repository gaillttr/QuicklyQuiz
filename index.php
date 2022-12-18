<?php
session_start();
include "connection.php";

echo '	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.js" integrity="sha512-WIOVolj8KELSkxn4SIHIg7BTbviPhxAJ+aeMKNqECrve8KH35ubZtlXgQRzMs7v12qIgxAMjt+w4C21khZ61yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
if (isset($_POST['password']))  {
	if (isset($_POST['submit'])) {
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE password = '$password'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		if (mysqli_num_rows($result) > 0) {
			$_SESSION['name'] = $row['name'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['admin'] = "active";
			echo '<script>
			setTimeout(function () { 
				Swal.fire({
					icon: "success",
					title: "Login Success",
					text: "Welcome to QuicklyQuiz",
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					window.location = "home.php";
				});
			}, 10);
			</script>';
		} else {
			echo '<script type="text/javascript">
					setTimeout(function () { 
						Swal.fire({
							icon: "error",
							title: "error",
							text: "Wrong Password",
							confirmButtonText: "Retry"
						}) 
					}, 100);
				</script>';
		}
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		
		<!-- =========================== CSS =========================== -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>

		<!-- =========================== HEADER =========================== -->
		<header class="header" id="header">
			<!-- nav -->
			<nav class="nav">
				<!-- nav logo -->
				<div class="nav-logo">
					<img src="css/img/Quickly Quiz LOGO.png">
				</div>
			</nav>
		</header>

		<!-- =========================== MAIN =========================== -->
		<main>

			<!-- =========================== LOGIN =========================== -->
			<section class="login" id="login">
				<div class="container padd-15">
					<!-- login title-->
					<div class="login-title">
						<h2>Enter Password</h2>
					</div>
	
					<!-- login form -->
					<div class="login-container">
						<form method="POST">
							<input type="password" name="password" required="">
							<input type="submit" name="submit" value="Login">
						</form>
					</div>
					
				</div>
			</section>

		</main>
	</body>
</html>