<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("location: /");
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title></title>
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
      box-sizing: inherit;
    }

    html {
      font-size: 1rem;
      box-sizing: border-box;
    }

    body {
      width: 100%;
      height: 100%;
      color: #272727;
      line-height: 1.9;
      background-color: #f7f5f5;
      font-family: Arial, Helvetica, sans-serif;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      line-height: 3.5;
    }

    .slider {
      position: relative;

      max-width: 100%;
      height: 75vh;
      margin: 0 auto;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      top: 0;
      width: 100%;
      height: 50vh;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 1s;
    }

    .slide img {
      width: 100%;
      /* height: 100%;
    object-fit: cover;*/
    }

    button {
      background: none;
      border: none;
    }

    button .fas {
      color: rgba(255, 255, 255, .5);
    }

    .btn-slide {
      position: absolute;
      top: 50%;
      z-index: 10;

      height: 5.5rem;
      width: 5.5rem;
      cursor: pointer;
    }

    .prev {
      left: 3rem;
      transform: translate(-50%, -50%);
    }

    .next {
      right: 3rem;
      transform: translate(50%, -50%);
    }

    .dots-container {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .dot {
      width: 25px;
      height: 5px;
      /*margin: 15px 5px;*/
      border-radius: .5rem;
      background: rgba(39, 39, 39, .5);
      cursor: pointer;
    }

    .dot.active {
      background: #272727;
    }
  </style>


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light p-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">WELCOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/Facility.html">Facilities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Room Number</th>
          <th scope="col">Room Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
               require_once "../backend/connection.php";
               //show popup when guest select the room
               if (isset($_POST['selectRoom'])) {

                session_start();
                echo $_SESSION;
                  
               }
               
                $fetchRoom = "SELECT * FROM rooms";
                $getRooms = mysqli_query($conn,$fetchRoom);
                if(mysqli_num_rows($getRooms) > 0){
                while($row = mysqli_fetch_assoc($getRooms)){
                  ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <tr>
            <th scope="row">
              <?php echo $row['id']; ?>
            </th>
            <td>
              <?php echo $row['room_number']; ?>
            </td>
            <td>
              <?php echo $row['room_type']; ?>
            </td>
            <td>
              <input type="submit" name="selectRoom" class="btn btn-primary" value="Select room">
            </td>
          </tr>
        </form>

        <?php
                }
              }
              ?>
      </tbody>
    </table>
  </div>
  <footer class="py-3 my-4 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="pages/Facility.html " class="nav-link px-2 text-muted">Facilities</a></li>

      <li class="nav-item"><a href="pages/Faq.html" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="pages/About_us.html" class="nav-link px-2 text-muted">About us</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
  </footer>

  <script type="text/javascript">

    function commingSoon() {
      alert("This feature is comming soon.")
    }
    function Slider() {
      const carouselSlides = document.querySelectorAll('.slide');
      const btnPrev = document.querySelector('.prev');
      const btnNext = document.querySelector('.next');
      const dotsSlide = document.querySelector('.dots-container');
      let currentSlide = 0;

      const activeDot = function (slide) {
        document.querySelectorAll('.dot').forEach(dot => dot.classList.remove('active'));
        document.querySelector(`.dot[data-slide="${slide}"]`).classList.add('active');
      };
      activeDot(currentSlide);

      const changeSlide = function (slides) {
        carouselSlides.forEach((slide, index) => (slide.style.transform = `translateX(${100 * (index - slides)}%)`));
      };
      changeSlide(currentSlide);

      btnNext.addEventListener('click', function () {
        currentSlide++;
        if (carouselSlides.length - 1 < currentSlide) {
          currentSlide = 0;
        };
        changeSlide(currentSlide);
        activeDot(currentSlide);
      });
      btnPrev.addEventListener('click', function () {
        currentSlide--;
        if (0 >= currentSlide) {
          currentSlide = 0;
        };
        changeSlide(currentSlide);
        activeDot(currentSlide);
      });

      dotsSlide.addEventListener('click', function (e) {
        if (e.target.classList.contains('dot')) {
          const slide = e.target.dataset.slide;
          changeSlide(slide);
          activeDot(slide);
        }
      });
    };
    Slider();


  </script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>



</body>

</html>