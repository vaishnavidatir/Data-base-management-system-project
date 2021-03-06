

<!DOCTYPE html>
<html>
<head>
	

	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style type="text/css">
		body{
	margin: 0 auto;
	background-image: url("../images/luxury.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

.container{
	width: 500px;
	height: 450px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light p-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Facility.html">Facilities</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="pricing.html">Pricing</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php

require_once "../backend/connection.php";

session_start();
if(isset($_POST['loginUser'])){
    $uname=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM `guest` WHERE guest_email='$uname' AND guest_password='$password'";
    $result=mysqli_query($conn,$sql);

    if($result){
      if(mysqli_num_rows($result)>0){
		  $_SESSION['username'] = $uname;
		  echo $_SESSION['username'];
		  header("location: ../guest/dashboard.php");
	  }else{
		echo "<script>alert('Guest Login failed! Try again');</script>";
	  }
    }else{
		echo "<script>alert('Something went wrong! Try again');</script>";
    }
    
}

?>

	<div class="container">
	<img src="../images/food.jpg"/>
		<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-input">
				<input type="text" name="email" placeholder="Enter the Email ID"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" name="loginUser" value="LOGIN" class="btn-login"/>
		</form>

		<center><a href="registration.php" style="color:white;">Or Create an account to book a room</a></center>
	</div>
	 <div class="container-fluid">
  <footer class="py-3 my-4 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="Facility.html " class="nav-link px-2 text-muted">Facilities</a></li>
     
      <li class="nav-item"><a href="Faq.html" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="About_us.html"  class="nav-link px-2 text-muted">About us</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
  </footer>
</div>
</body>
</html>