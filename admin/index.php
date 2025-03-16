<?php session_start();
//error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$password=md5($_POST['password']);
	echo $password;
$ret=mysqli_query($con,"SELECT * FROM admin WHERE UserId='$id' && password='$password' ");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['alogin']=$_POST['id'];
$_SESSION['aid']=$num['id'];
header("location:dashboard.php");
}else{
echo "<script>alert('Invalid id or password');</script>";

//header("location:index.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CMS | Admin login</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h4>INQUIRY MANAGEMENT SYSTEM <hr /><span style="color:#fff;"> Admin Login</span></h4>
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
					<div class="card-body">
					
						<div class="form-group mb-3">
							<input class="form-control" id="id" name="id" type="text" placeholder="User Id" required />
						</div>
						<div class="form-group mb-4">
							<input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
						</div>
						
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Signin</button>
						<hr>
						<p class="mb-2 text-muted">Forgot password? <a href="reset-password.php" class="f-w-400">Reset</a></p>
					
					</div></form>
					  <i class="fa fa-home" aria-hidden="true"><a class="" href="../index.php">
		                    Back Home
		                </a></i>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>


</body>

</html>
