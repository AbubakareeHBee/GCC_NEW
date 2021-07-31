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
<?php
          #array of level in every subject

          $sub_level_count = array("literacy"=>6);

          $module_In_each_levels = array("literacy_phonics","literacy_spelling","literacy_reading","literacy_vocabulary","literacy_writing","literacy_grammar");

          $content_fetch = "";
          
          $content_fetch_on_content = "";
          foreach ($sub_level_count as $title_sub => $level_value) {
              if ($_GET['content']==$title_sub) {
                  $content_fetch .= '
                      <ul class="nav nav-tabs levelsTab" role="tablist">';
                      for ($x = 1; $x <= $level_value; $x++) {
                        
                        if ($x == 1) {
                            $content_fetch .= '<li class="nav-item"><a href="#pri'.$x.'" class="nav-link active" data-bs-toggle="tab">Level '.$x.'</a></li>';
                            $content_fetch_on_content .= '<div id="pri'.$x.'" class="tab-pane fade active show"><div class="lessonDiv">';
                            $level_count = "level_".$x;
                                foreach ($module_In_each_levels as $key => $module_value) {
                                  $query_User_re = sprintf("SELECT * FROM $module_value WHERE level_id='{$level_count}'");
                                  $User_re = mysqli_query($gcc, $query_User_re) or die(mysqli_error());
                                  $row_User_re = mysqli_fetch_assoc($User_re);
                                  $totalRows_User_re = mysqli_num_rows($User_re);

                                  $get_module = explode("_",$module_value);
                                  $get_module = ucwords($get_module[1]);

                                  $content_fetch_on_content .= '
                                    <div class="lesInfo d-flex justify-content-between">
                                      <div>
                                        <p class="lesNum">  Lessons:</p>
                                        <p class="lesName">'.$get_module.'</p>
                                      </div>
                                      <div class="d-flex justify-content-end">
                                        <a href="quiz.html" class="btn btn-primary"> Assessment</a>
                                      </div>
                                      <div></div>
                                    </div>

                                    <section class="levelSections">
                                    <div class="row mt-3 theRow">
                                  
                                  ';

                                  do {
                                   
                                    $content_fetch_on_content .='
                                        <a href="video.php?fetch='.$module_value.'_'.$level_count.'_'.$row_User_re['id'].'" style="text-decoration: none;color: black" class="LitCards col-sm-3 text-center">
                                          <div class="d-flex justify-content-center" style="height: 80px;">
                                            <img src="img/icons/block.png" alt="">
                                          </div>
                                          <p class="font-Itim mt-3">'.$row_User_re['lesson'].'</p>
                                          <div class="d-flex justify-content-center">
                                            <div class="progress">
                                              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </a>
                                    ';
                                  } while ($row_User_re = mysqli_fetch_assoc($User_re));


                                  $content_fetch_on_content .='</div></section>';
                                  $content_fetch_on_content .= '<hr>';
                                }
                                
                            

                            $content_fetch_on_content .='</div></div>';
                        }else{
                            $content_fetch .= '<li class="nav-item"><a href="#pri'.$x.'" class="nav-link" data-bs-toggle="tab">Level '.$x.'</a></li>';
                            $content_fetch_on_content .= '<div id="pri'.$x.'" class="tab-pane fade"><div class="lessonDiv">';
                            $level_count = "level_".$x;
                                foreach ($module_In_each_levels as $key => $module_value) {
                                  $query_User_re = sprintf("SELECT * FROM $module_value WHERE level_id='{$level_count}'");
                                  $User_re = mysqli_query($gcc, $query_User_re) or die(mysqli_error());
                                  $row_User_re = mysqli_fetch_assoc($User_re);
                                  $totalRows_User_re = mysqli_num_rows($User_re);

                                  $get_module = explode("_",$module_value);
                                  $get_module = ucwords($get_module[1]);

                                  $content_fetch_on_content .= '
                                    <div class="lesInfo d-flex justify-content-between">
                                      <div>
                                        <p class="lesNum">  Lessons:</p>
                                        <p class="lesName">'.$get_module.'</p>
                                      </div>
                                      <div class="d-flex justify-content-end">
                                        <a href="quiz.html" class="btn btn-primary"> Assessment</a>
                                      </div>
                                      <div></div>
                                    </div>

                                    <section class="levelSections">
                                    <div class="row mt-3 theRow">
                                  
                                  ';

                                  do {
                                    $content_fetch_on_content .='
                                        <a href="video.php?fetch='.$module_value.'_'.$level_count.'_'.$row_User_re['id'].'" style="text-decoration: none;color: black" class="LitCards col-sm-3 text-center">
                                          <div class="d-flex justify-content-center" style="height: 80px;">
                                            <img src="img/icons/block.png" alt="">
                                          </div>
                                          <p class="font-Itim mt-3">'.$row_User_re['lesson'].'</p>
                                          <div class="d-flex justify-content-center">
                                            <div class="progress">
                                              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </a>
                                    ';
                                  } while ($row_User_re = mysqli_fetch_assoc($User_re));


                                  $content_fetch_on_content .='</div></section>';
                                  $content_fetch_on_content .= '<hr>';
                                }
                                
                            

                            $content_fetch_on_content .='</div></div>';
                        }

                      }
                  $content_fetch .= '</ul>';
                        
                  
              }
          }

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
    <aside class="col-md-3 sideMenu">
      <div class="row mt-5 avatarSide">
        <div class="avatarContainer col-sm-4">
          <img src="img/icons/gamer.png" alt="">
        </div>

        <div class="col-sm-8">
          <p class="userName">Aliyu Kamilu</p>
          <p class="regNo">GCC/TRN/002</p>
          <a href="../index.html">
            <p class="btn btn-danger"> Logout <i class="fas fa-power-off"></i>  </p>
          </a>
        </div>
      </div>

      <ul class="menuUl">
        <a href="index.html">
          <li><span class="iconify" data-icon="fluent:home-48-regular" data-inline="false"></span> Home</li>
        </a>
        <a href="#learningCollapse" data-bs-toggle="collapse">
          <li class="learningMenu"><span class="iconify" data-icon="fluent:learning-app-24-regular"
              data-inline="false"></span> Learning</li>
        </a>
        <div class="collapse theLessonCollpase" id="learningCollapse">
          <a href="literacy.html" class="active">
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
          <li><span class="iconify" data-icon="bi:graph-up" data-inline="false"></span> Learning Analysis</li>
        </a>
        <a href="dictionary.html">
          <li><span class="iconify" data-icon="mdi:book-open-page-variant-outline" data-inline="false"></span> Dictionary</li>
        </a>
      </ul>
    </aside>

    <main class="col-md-9 mainMenu">
      <div class="homeContent" style="margin-top: 0px;">

        <div class="d-flex justify-content-between">
          <h2 class="pageTitle" onclick="history.go(-1)"><span class="iconify" data-icon="eva:arrow-back-fill"
              data-inline="false"></span> <?php echo ucwords($_GET['content']);?></h2>
              <div class="searchCont">
                <div class="input-group search">
                  <span class="input-group-text search" id="basic-addon1"><i class="fas fa-search"></i></span>
                  <input type="text" class="form-control" placeholder="Find a Lesson or Quest" aria-label="Username" aria-describedby="basic-addon1">
                  <span class="input-group-text cancel" onclick="cancel();"><i class="fas fa-times"></i></span>
                </div>
                <span class="iconify icon" data-icon="cil:search" data-inline="false" onclick="search();"></span>
              </div>
        </div>

        <h5 class="font-Itim mt-4">Continue Your Lesson</h5>
        <div class="LitCards mt-2 row m-0" style="flex-direction: row; width: 50%;">
          <div class="col-sm-3">
            <img src="./img/icons/block.png" alt="">
          </div>
          <div class="col-sm-6">
            <p class="m-0 theLesson">Phonics</p>
            <p class="text-muted" style="font-size: 12px;">Click to continue from where you stopped.</p>
          </div>
          <div class="col-sm-2">
            <a href="video.html">
            <svg class="playbtn" width="63" height="64" viewBox="0 0 63 64" fill="none">
              <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="63" height="64">
                <path d="M0.822266 0.128906H62.84V63.4949H0.822266V0.128906Z" fill="#C4C4C4"></path>
              </mask>
              <g mask="url(#mask0)">
                <path
                  d="M8.96147 50.5061L8.96004 50.5048C2.45514 44.5994 1.42535 33.4296 4.75044 23.0773C8.06762 12.7496 15.5342 3.83686 25.2694 2.29884C34.6547 0.843547 45.0258 7.18995 52.1868 16.3188C55.7418 20.8508 58.4338 25.9874 59.7659 31.0169C61.0994 36.0512 61.0532 40.9038 59.2455 44.9468C55.5627 53.1833 47.1528 58.324 37.5008 59.5185C27.8597 60.7117 17.1191 57.9392 8.96147 50.5061Z"
                  fill="#ea7052" stroke="#ea7052" stroke-width="2.12537" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round"></path>
                <path
                  d="M27.7198 37.0681C27.7103 38.7185 29.5035 39.7494 30.925 38.9109L37.9008 34.7959C39.2878 33.9777 39.2965 31.9743 37.9166 31.1441L30.9884 26.9758C29.5765 26.1263 27.7768 27.137 27.7674 28.7847L27.7198 37.0681Z"
                  fill="white"></path>
              </g>
            </svg>
          </a>
          </div>
        </div>
        
        <section class="mt-5 levels">
          <?php
            echo $content_fetch;
          ?>

          <div class="tab-content">
          <?php
            echo $content_fetch_on_content;
          ?>
          </div>

        </section>
      </div>
    </main>
  </section>




  <script src="js/jquery.js"></script>
  <script src="css/dist/js/bootstrap.bundle.js"></script>
  <script src="js/index.js"></script>
</body>

</html>