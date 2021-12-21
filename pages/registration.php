<!DOCTYPE html>

<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
        body {

            /* background: #C5E1A5; */
            background-image: url("../images/man.jpg");

        }


        form {

            width: 30%;

            margin: 60px auto;

            background: #efefef;

            padding: 60px 120px 80px 120px;

            text-align: center;

            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);

            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);

        }

        label {

            display: block;

            position: relative;

            margin: 40px 0px;

        }


        .label-txt {

            position: absolute;

            top: -1.6em;

            padding: 10px;

            font-family: sans-serif;

            font-size: .8em;

            letter-spacing: 1px;

            color: rgb(120, 120, 120);

            transition: ease .3s;

        }

        .input {

            width: 100%;

            padding: 10px;

            background: transparent;

            border: none;

            outline: none;

        }

        .line-box {

            position: relative;

            width: 100%;

            height: 2px;

            background: #BCBCBC;

        }


        .line {

            position: absolute;

            width: 0%;

            height: 2px;

            top: 0px;

            left: 50%;

            transform: translateX(-50%);

            background: #8BC34A;

            transition: ease .6s;

        }


        .input:focus+.line-box .line {

            width: 100%;

        }


        .label-active {

            top: -3em;

        }


        .registerbtn {

            display: inline-block;

            padding: 12px 24px;

            background: rgb(220, 220, 220);

            font-weight: bold;

            color: rgb(120, 120, 120);

            border: none;
            outline: none;

            border-radius: 3px;

            cursor: pointer;

            transition: ease .3s;

        }


        button:hover {

            background: #8BC34A;

            color: #ffffff;

        }
    </style>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form With Html & Css</title>

    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light p-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="C:\Users\HP\OneDrive\Desktop\javascript projects\Mini project\slider_for_images.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="C:\Users\HP\OneDrive\Desktop\javascript projects\Mini project\Facility.html">Facilities</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link "
                            href="C:\Users\HP\OneDrive\Desktop\javascript projects\Mini project\pricing.html">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>

    <?php
        require_once "../backend/connection.php";

        if(isset($_POST['registerUser'])){
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $registerSQL = "INSERT INTO `guest` (`guest_email`, `guest_password`) VALUES ('$email', '$pwd')";

            $registerUser = mysqli_query($conn,$registerSQL);
            if($registerUser){
                echo "<script>alert('Guest register successfully');</script>";
                header("location: login.php");
            }else{
                echo "<script>alert('Not Registered! Please try again');</script>";
            }
        }
    ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <h4 class="text-warning text-center pt-5">SIGN UP FORM</h4>
            <label>
                <input type="text" class="input" name="email" placeholder="EMAIL" />
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <input type="password" class="input" name="password" placeholder="PASSWORD" />
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <input type="password" class="input" name="confirm" placeholder="CONFIRM PASSWORD" />
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <input class="registerbtn" type="submit" name="registerUser" value="Register">
            <center><a style="margin-top: 50px;" href="login.php">Login to continue</a></center>
        </form>


    </div>
    <div class="container-fluid">
        <footer class="py-3 my-4 bg-dark">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a
                        href="/"
                        class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a
                        href="Facility.html "
                        class="nav-link px-2 text-muted">Facilities</a></li>

                <li class="nav-item"><a href="Faq.html"
                        class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a
                        href="About_us.html"
                        class="nav-link px-2 text-muted">About us</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

</body>

</html>