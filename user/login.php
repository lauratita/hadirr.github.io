<?php 

include '../koneksi.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM ketua WHERE username='$username' AND password='$password'";
	$result = mysqli_query($koneksi, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: index.php");
	} else {
		echo "<script>alert('Username or Password is Wrong.');window.location.href='login.php'</script>";
	}
}

if(isset($_POST['btnWa'])) {
	$no_wa = $_POST['noWa'];
	echo $no_wa;
	header("location:https://api.whatsapp.com/send?phone=$no_wa");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hadirr</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<!-- Sweetalert 2 CSS -->
	<link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST" class="login-username">
				<img src="../img/smea.jpg">
				<h2 class="title">Hadirr</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>

           		   <div class="input-group">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input" value="<?php echo $username; ?>" required >
           		   </div>

           		</div>
           		<div class="input-div pass">

           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>

           		   <div class="input-group">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input" value="<?php echo $_POST['password']; ?>" required>
            	   </div>

            	</div>
			
            	<!-- <a href="register.php">Don't Have an Account?</a> -->
				<a href="https://api.whatsapp.com/send?phone=6283833092724" type="submit" name="btnWa" target="_blank">Help?</a>

					<div class="input-group">
            			<button type="submit" name="submit" class="btn">Login</button>
					</div>
            </form>
        </div>
    </div>

	<!-- Must put our javascript files here to fast the page loading -->
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Sweetalert2 JS -->
	<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Page Script -->
	<script src="../assets/js/scripts.js"></script>S
    <script type="text/javascript" src="../js/main.js"></script>

</body>
</html>
