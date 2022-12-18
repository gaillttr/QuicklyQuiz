<?php session_start(); ?>
<?php include "connection.php";
echo '	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.js" integrity="sha512-WIOVolj8KELSkxn4SIHIg7BTbviPhxAJ+aeMKNqECrve8KH35ubZtlXgQRzMs7v12qIgxAMjt+w4C21khZ61yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
if(isset($_GET['subjectid'])) {
	$subjectid = $_GET['subjectid'];
	$query = "SELECT * FROM subjects WHERE snum = '$subjectid'";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($run);
}

$quizid = "SELECT * FROM quizzes WHERE snum = '$subjectid'";
$runquiz = mysqli_query($conn , $quizid) or die(mysqli_error($conn));
$quizrow = mysqli_fetch_array($runquiz);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Member</title>

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
						<h3><?php echo $_SESSION['name']; ?></h3>
					</div>

					<div class="nav-dropdown-icon">
						<i class="material-symbols-outlined">arrow_drop_down</i>

						<!-- nav dropdown content -->
						<div class="nav-dropdown-content hidden" id="nav-dropdown-content">
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
								<a href="logout.php">Logout</a>
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

            <!-- back and forward button -->
			<div class="back-forward-btn">
				<div class="back-btn">
					<a onclick="history.go(-1);"><i class="material-symbols-outlined">arrow_back</i></a>
				</div>
				
				<div class="forward">
					<a onclick="history.go(1);"><i class="material-symbols-outlined">arrow_forward</i></a>
				</div>
			</div>
    
            <div class="container-menu">
			<a href="home.php" class="active"><?php echo $row['sname']; ?></a>
			<a href="allquizzes.php?subjectid=<?php echo $row['snum'];?>" class="start">All Quizzes</a>
			<a href="allquestion.php?subjectid=<?php echo $row['snum'];?>&qno=<?php echo $quizrow['qno']; ?>" class="start">All Questions</a>
			<a href="#" class="start">Dashboard</a>
			<a href="member.php?subjectid=<?php echo $row['snum'];?>" class="start">Members</a>
            </div>
    
        <!-- =========================== MEMBER =========================== -->
        <section class="allquizzes" id="allquizzes">

            <div class="container">
                
                <!-- container title -->
                <div class="container-title">
                    <h1>Members</h1>
                </div>

                <!-- all member table -->
                <table class="members-table">
                     <thead>
                          <tr>
                               <th>No.</th>
                               <th>Name/Email</th>
                               <th>ID</th>
                               <th>Sent Quiz</th>
                               <th>Score</th>
                          </tr>
                     </thead>

                     <tbody>
                          <tr class="untitled">
                               <td>1.</td>
                               <td>Thawanrat Ruangrattanamatee</td>
                               <td>6309650890</td>
                               <td>2022-10-27 07:41:07</td>
                               <td>40/50</td>
                          </tr>

                     </tbody>
     
                </table>
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

				
		</script>
    </body>
</html>