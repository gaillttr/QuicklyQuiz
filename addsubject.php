<?php session_start(); ?>
<?php include "connection.php";

echo '	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.js" integrity="sha512-WIOVolj8KELSkxn4SIHIg7BTbviPhxAJ+aeMKNqECrve8KH35ubZtlXgQRzMs7v12qIgxAMjt+w4C21khZ61yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';

if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
    $name =htmlentities(mysqli_real_escape_string($conn , $_POST['subject-name']));
    $description =htmlentities(mysqli_real_escape_string($conn , $_POST['subject-description']));

	// Check if subject already exists
	$check = "SELECT sname FROM subjects WHERE sname = '$name' ";
	$result = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		echo '<script>
		setTimeout(function() {
			Swal.fire({
				icon: "error",
				title: "Subject already exists",
				text: "Please try again",
				confirmButtonText: "Try again"
			});
		}, 100);
		</script>';
	} else {
		// Insert subject into database
		$query = "INSERT INTO subjects(sname, sdescription) VALUES ('$name', '$description') " ;
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
		if(mysqli_affected_rows($conn) > 0){
		echo '<script>
		setTimeout(function() {
			Swal.fire({
				icon: "success",
				title: "Subject Added Successfully",
				showConfirmButton: false,
				timer: 1500
			}).then(function() {
				window.location = "home.php";
			});
		}, 100);
	</script>';
	}
}
}
?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add subject</title>

		<!-- =========================== CSS =========================== -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

				<!-- nav icon -->
				<div class="nav-icon">
					<div class="nav-admin">
						<h3>
							<?php echo $_SESSION['name']; ?>
						</h3>
					</div>

					<div class="nav-dropdown-icon">
						<i class="material-symbols-outlined">arrow_drop_down</i>

						<!-- nav dropdown content -->
						<div class="nav-dropdown-content" id="nav-dropdown-content">
							<a href="#"><?php echo $_SESSION['name']; ?></a>
							<a href="#"><?php echo $_SESSION['email']; ?></a>
							<hr>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">account_circle</i>
								<a href="#">Profile</a>
							</div>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">settings</i>
								<a href="#">Settings</a>
							</div>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">logout</i>
								<a href="#">Logout</a>
							</div>
						</div>
					</div>

					<div class="nav-account-icon">
						<i class="material-symbols-outlined">account_circle</i>
					</div>
				</div>
			</nav>
		</header>

        <!-- =========================== MAIN =========================== -->
        <main>

            <div class="container-menu">
				<a href="home.php" class="start">Home</a>
			</div>

            <!-- =========================== ADD SUBJECT =========================== -->
            <section class="addsubject" id="addsubject">

                <div class="container">

                    <!-- create new subject content -->
					<form method="post" action="">	
                        <!-- form title -->
                        <div class="form-title">
                            <h2>Create new subject</h2>
                        </div>
                        
                        <!-- form subtitle -->
						<div class="form-subtitle">
							<h3>Subject name</h3>
						</div>
						
                        <!-- form input filed -->
					    <div class="input-field">
						    <input type="text" name="subject-name" required>
						</div>
						
                        <!-- form subtitle -->
						<div class="form-subtitle">
							<h3>Description</h3>
						</div>
		
                        <!-- form input filed -->
						<div class="input-field">
							<input type="text" name="subject-description">
						</div>
						  
                        <!-- form buttons -->
						<div class="form-btns">
							<a href="#"><input type="submit" name="submit" value="Create"></a>
							<a href="home.php"><input type="button" name="close" value="Close"></a>
						</div>
					</form>

                </div>

            </section>

        </main>
		<script>
			$(document).ready(function(){
				$("a[href='logout.php']").click(function(e){
					e.preventDefault();
					Swal.fire({
							title: 'Are you sure?',
							text: "You won't be able to revert this!",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes, logout!'
						}).then((result) => {
							if (result.isConfirmed) {
									Swal.fire(
										'Logout!',
										'You have been logged out.',
										'success'
									).then(function(){
										window.location = "index.php";
									});
								}
							})
						});
				});
				
				$(document).ready(function(){
					$("input[name='close']").click(function(e){
						e.preventDefault();
						Swal.fire({
							title: 'Are you sure?',
							text: "You won't be able to revert this!",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes, close!'
						}).then((result) => {
							if (result.isConfirmed) {
									Swal.fire(
										'Close!',
										'You have been closed.',
										'success',

									).then(function(){
										window.location = "home.php";
									});
								}
							})
						});
					});
				
		</script>
    </body>
</html>





<?php } 
else {
header("location: index.php");
}
?>