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
    <aside class="col-md-3 sideMenu">
      <div class="row mt-5 avatarSide">
        <div class="avatarContainer col-sm-4">
          <img src="img/icons/gamer.png" alt="">
        </div>
        <div class="col-sm-8">
          <p class="userName">Aliyu Kamilu</p>
          <p class="regNo">GCC/TRN/002</p>
          <p class="btn btn-danger"> Logout <i class="fas fa-power-off"></i> </p>
        </div>
      </div>

      <ul class="menuUl">
        <a href="index.html">
          <li><span class="iconify" data-icon="fluent:home-48-regular" data-inline="false"></span> Home</li>
        </a>
        <a href="#learningCollapse" data-bs-toggle="collapse">
          <li class="learningMenu"><span class="iconify" data-icon="fluent:learning-app-24-regular" data-inline="false"></span> Learning</li>
        </a>
        <div class="collapse theLessonCollpase" id="learningCollapse">
          <a href="literacy.html">
            <li><span class="iconify" data-icon="mdi:book-alphabet" data-inline="false"></span> Literacy</li>
          </a>
          <a href="literacy.html">
            <li><span class="iconify" data-icon="fluent:keyboard-123-24-regular" data-inline="false"></span> Numeracy
            </li>
          </a>
          <a href="literacy.html">
            <li><span class="iconify" data-icon="eos-icons:atom-electron" data-inline="false"></span> Science</li>
          </a>
        </div>
        <a href="analysis.html">
          <li><span class="iconify" data-icon="bi:graph-up" data-inline="false"></span> Learnig Analysis</li>
        </a>
      </ul>
    </aside>

    <main class="col-md-9 mainMenu">
      </div>
      <div class=" d-flex justify-content-between">
        <div>
          <p class="timer" id="timer"></p>
        </div>
        <button class="btn" style="background: url('img/scoreboard.png')no-repeat scroll 0 0 transparent; background-size: contain; width: 150px; height: 50px;">
          <p class="score">0</p>
        </button>
      </div>
      <div class="homeContent d-flex justify-content-center">
        <section class="quiz_cont">
          <p class="instruction">Choose the Correct answer from the Options Below :</p>
          <p class="the_question">Question Loading ........ ?</p>
          <div class="optionsCont" id="optionsCont">
            <!-- displaying option  -->
          </div>
          <audio src="sounds/wrong.mp3" id="wrongsound"></audio>
          <audio src="sounds/correct.mp3" id="correctsound"></audio>
        </section>

      </div>
      <div class="d-flex justify-content-center">
        <button id="nextQues" class="btn btn-primary">Next</button>
      </div>

    </main>
  </section>




  <script src="js/jquery.js"></script>
  <script src="css/dist/js/bootstrap.bundle.js"></script>
  <script src="js/quiz.js"></script>
  <script src="js/index.js"></script>

</body>

</html>