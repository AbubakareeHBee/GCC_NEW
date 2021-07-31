<?php
session_start();



include "../php/Connections/gcc.php";

include "../php/enctp.php";

//$acco_id = $_SESSION['userEID'];

//user page visitation tracker
//include_once("page_visitation_tracker.php");

// $acco_id = decrtp($acco_id);

// $query_User_re = sprintf("SELECT * FROM learn_lessons WHERE topic_id='{$lesson_fetch_id}'");

// $User_re = mysqli_query($ai, $query_User_re) or die(mysqli_error());

// $row_User_re = mysqli_fetch_assoc($User_re);

// $totalRows_User_re = mysqli_num_rows($User_re);

// $query_User_reo = sprintf("SELECT * FROM subject_topics WHERE topic_id='{$lesson_fetch_id}'");

// $User_reo = mysqli_query($ai, $query_User_reo) or die(mysqli_error());

// $row_User_reo = mysqli_fetch_assoc($User_reo);

// $totalRows_User_reo = mysqli_num_rows($User_reo);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Learning Friend</title>

  <link rel="shortcut icon" href="img/icons/favicon.png" type="image/x-icon">
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/fontawesome/css/all.css">


</head>

<body>
  <section class="row">
    <aside class="sideMenu">
      <div class="row mt-5 avatarSide">
        <div class="avatarContainer col-sm-4">
          <img src="img/icons/gamer.png" alt="">
        </div>
        <div class="col-sm-8">
          <p class="userName"><?php echo $_SESSION['MM2_Username']; ?></p>
          <p class="regNo"><?php echo $_SESSION['MM_Username']; ?></p>
          <a href="../index.html">
          <p class="btn btn-danger"> Logout <i class="fas fa-power-off"></i>  </p>
        </a>
        </div>
      </div>

      <ul class="menuUl">
        <a href="index.html" class="active">
          <li><span class="iconify" data-icon="fluent:home-48-regular" data-inline="false"></span><span> Home</span></li>
        </a>
        <a href="#learningCollapse" data-bs-toggle="collapse">
          <li class="learningMenu"><span class="iconify" data-icon="fluent:learning-app-24-regular"
              data-inline="false"></span> <span>Learning</span></li>
        </a>
        <div class="collapse theLessonCollpase" id="learningCollapse">
          <a href="literacy.html">
            <li><span class="iconify" data-icon="mdi:book-alphabet" data-inline="false"></span> Literacy</li>
          </a>
          <a href="literacy.html">
            <li><span class="iconify" data-icon="fluent:keyboard-123-24-regular" data-inline="false"></span> Numeracy</li>
          </a>
          <a href="literacy.html">
            <li><span class="iconify" data-icon="eos-icons:atom-electron" data-inline="false"></span> Science</li>
          </a>
        </div>
        <a href="analysis.html">
          <li><span class="iconify" data-icon="bi:graph-up" data-inline="false"></span> <span>Learnig Analysis</span></li>
        </a>
        <a href="dictionary.html">
          <li><span class="iconify" data-icon="mdi:book-open-page-variant-outline" data-inline="false"></span> <span>Dictionary</span></li>
        </a>
      </ul>
    </aside>

    <main class="col-md-9 mainMenu">
      <div class="homeContent">

        <div class="d-flex justify-content-between">
          <h2 class="pageTitle">Home</h2>
          <div class="searchCont">
            <div class="input-group search">
              <span class="input-group-text search" id="basic-addon1"><i class="fas fa-search"></i></span>
              <input type="text" class="form-control" placeholder="Find a Lesson or Quest" aria-label="Username" aria-describedby="basic-addon1">
              <span class="input-group-text cancel" onclick="cancel();"><i class="fas fa-times"></i></span>
            </div>
            <span class="iconify icon" data-icon="cil:search" data-inline="false" onclick="search();"></span>
          </div>
        </div>

        <section class="lessonCards mt-5">
          <div class="row g-3">
            <a href="literacy.php?content=literacy" style="text-decoration: none;" class="col-sm-4 col-xs-3">
              <div class="cardo literacy">
                <span class="iconify" data-icon="mdi:book-alphabet" data-inline="false"></span>
                <p class="subjectName">Literacy</p>
              </div>
            </a>
            <!-- <a href="literacy.html" style="text-decoration: none;" class="col-sm-4 col-xs-3">
              <div href="" class="cardo numeracy">
                <span class="iconify" data-icon="fluent:keyboard-123-24-regular" data-inline="false"></span>
                <p class="subjectName">Numeracy</p>
              </div>
            </a>
            <a href="literacy.html" style="text-decoration: none;" class="col-sm-4 col-xs-3">
              <div href="" class="cardo science">
                <span class="iconify" data-icon="eos-icons:atom-electron" data-inline="false"></span>
                <p class="subjectName">Science</p>
              </div>
            </a> -->
          </div>
          <!-- <div class="row recent">
            <h5>Recently viewed lessons</h6>
              <div class="card mt-3" style="max-width: 340px;">
                <div class="row g-0">
                  <div class="col-md-4 mt-2">
                    <img src="./img/english.jpeg" class="img-fluid" style="border-radius: 10px;" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Literacy</h5>
                      <p class="card-text">Hey Numbers! The Development....</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 numeracy-card" style="max-width: 340px;">
                <div class="row g-0">
                  <div class="col-md-4 mt-2">
                    <img src="./img/english.jpeg" class="img-fluid" style="border-radius: 10px;" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Numeracy</h5>
                      <p class="card-text">Hey Numbers! The Development....</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 science-card" style="max-width: 340px;">
                <div class="row g-0">
                  <div class="col-md-4 mt-2">
                    <img src="./img/english.jpeg" class="img-fluid" style="border-radius: 10px;" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Science</h5>
                      <p class="card-text">Hey Numbers! The Development....</p>
                    </div>
                  </div>
                </div>
              </div>
          </div> -->
        </section>
      </div>
    </main>
  </section>




  <script src="js/jquery.js"></script>
  <script src="css/dist/js/bootstrap.bundle.js"></script>
  <script src="js/index.js"></script>
</body>

</html>