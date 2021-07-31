<?php
session_start();



include "../php/Connections/gcc.php";

include "../php/enctp.php";

$all_content_fetch = $_GET['fetch'];

$exploade_access = explode("_", $all_content_fetch);

$subject_access = $exploade_access[0];
$module_access = $exploade_access[1];
$level_access = $exploade_access[2].'_'.$exploade_access[3];
$folder_access = $exploade_access[4];
// print_r($exploade_access);
$getVid = "";
$getVid1 = [];
$text = [];
$dir = 'videos/'.$subject_access.'/'.$level_access.'/'.$module_access.'/'.$folder_access.'/';
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    $x = 0;
    while (($file = readdir($dh)) !== false){

      if (substr( strrev($file), 0, 4 ) === "4pm.") {
     

        if (strpos($file," ._") == true) {

        }else{
          $text[] = $file;

          // $getVid .= '"'.$dir.$file.'",';
          
         
            $getVid1[] .= $dir.$file;
        }
        
      }else{
        

      }
    }
    closedir($dh);
  }
}  

sort($text);
// print_r($text);

foreach ($text as $keyT => $valueT) {
  $getVid .= '"'.$dir.$valueT.'",';
}
$getVid = rtrim($getVid, ",");

// print_r($text);
//  echo $getVid;
 
//$acco_id = $_SESSION['userEID'];

//user page visitation tracker
//include_once("page_visitation_tracker.php");

// $acco_id = decrtp($acco_id);
$db_check = $subject_access.'_'.$module_access;
$query_User_keyWords = sprintf("SELECT `words`, `explaination` FROM {$db_check} WHERE level_id='{$level_access}' AND word_id='{$folder_access}'");

$User_keyWords = mysqli_query($gcc, $query_User_keyWords) or die(mysqli_error());

$row_User_keyWords = mysqli_fetch_assoc($User_keyWords);

$totalRows_User_keyWords = mysqli_num_rows($User_keyWords);

$card = "";

$word_check = explode("~", $row_User_keyWords['words']);
$words_explaination = explode("~", $row_User_keyWords['explaination']);

foreach ($word_check as $keyWord => $valueWord) {
    $card .='
            <div class="card mt-2">
              <div class="card-header">
                <span><strong>'.$valueWord.'</strong></span>
              </div>
              <div class="card-body">
                <p style="font-family:Avenir Next">'.$valueWord.': '.$words_explaination[$keyWord].'</p>
              </div>
            </div>
    ';
}
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
  
<!-- Google Fonts -->

<!-- MDB -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />-->
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
          <a href="/index.php">
            <p class="btn btn-danger"> Logout <i class="fas fa-power-off"></i>  </p>
          </a>
        </div>
      </div>

      <ul class="menuUl">
        <a href="index.php" class="">
          <li><span class="iconify" data-icon="fluent:home-48-regular" data-inline="false"></span> <span>Home</span></li>
        </a>
        <a href="#learningCollapse" class="active" data-bs-toggle="collapse">
          <li class="learningMenu"><span class="iconify" data-icon="fluent:learning-app-24-regular"
              data-inline="false"></span> Learning</li>
        </a>
        <div class="collapse theLessonCollpase" id="learningCollapse">
          <a href="literacy.php">
            <li><span class="iconify" data-icon="mdi:book-alphabet" data-inline="false"></span> Literacy</li>
          </a>
          <a href="literacy.php">
            <li><span class="iconify" data-icon="fluent:keyboard-123-24-regular" data-inline="false"></span> Numeracy
            </li>
          </a>
          <a href="literacy.php">
            <li><span class="iconify" data-icon="eos-icons:atom-electron" data-inline="false"></span> Science</li>
          </a>
        </div>
        <a href="analysis.php">
          <li><span class="iconify" data-icon="bi:graph-up" data-inline="false"></span> Learnig Analysis</li>
        </a>
        <a href="dictionary.php">
          <li><span class="iconify" data-icon="mdi:book-open-page-variant-outline" data-inline="false"></span> Dictionary</li>
        </a>
      </ul>
    </aside>

    <main class="col-md-9 mainMenu">
      <div class="homeContent">

        <div class="d-flex justify-content-between">
          <h2 class="pageTitle" onclick="history.go(-1)"><span class="iconify" data-icon="eva:arrow-back-fill"
              data-inline="false"></span> </h2>
            <div class="d-flex key-words">
              <p class="font-Itim mx-2">Search Keywords</p><span class="iconify" data-icon="mdi:book-open-page-variant" data-inline="false" data-bs-toggle="modal" data-bs-target="#myModal2"></span>
            </div>
              <h3 class="counter-video font-Itim">1 / 4 </h3>
        </div>
        <section class="videoSection d-flex justify-content-center">
          <div class="col-md-10 videoCont">
            <video id="video">
              <source  preload="none" src="<?php echo $dir.$text[0]; ?>" id="source" type="video/mp4" />
            </video>
            <div id="player-controls">
              <div class="d-flex justify-content-center">
                <svg id="playbtn" class="pausepl" width="105" height="107" viewBox="0 0 105 107" fill="none">
                  <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="0" width="105" height="107">
                    <path d="M0.0212402 0.0323792H104.996V106.988H0.0212402V0.0323792Z" fill="#C4C4C4"></path>
                  </mask>
                  <g mask="url(#mask0)">
                    <path
                      d="M12.0762 86.591L12.0756 86.5905C0.519421 76.0824 -1.08859 56.5296 4.58991 38.8218C10.2654 21.1233 23.1498 5.49618 40.2936 2.78448C56.8516 0.21186 74.7845 11.3968 86.9858 26.9759C93.0768 34.7532 97.7119 43.5946 100.013 52.2978C102.315 61.0027 102.276 69.5412 99.0614 76.7426C92.6063 91.2024 77.9301 100.102 61.3014 102.163C44.6769 104.224 26.1539 99.439 12.0762 86.591Z"
                      fill="white" stroke="#FCFBF9" stroke-width="0.80464" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                    <path
                      d="M42.6137 66.9226C42.6102 67.5526 43.2993 67.9421 43.8372 67.6141L63.2771 55.7618C63.7889 55.4498 63.7921 54.7079 63.2832 54.3915L43.9759 42.3857C43.4416 42.0535 42.7499 42.4354 42.7464 43.0645L42.6137 66.9226Z"
                      fill="#EA7052"></path>
                  </g>
                </svg>
                <svg id="pausebtn" class="pausepl" width="105" height="107" viewBox="0 0 105 107" fill="none">
                  <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="0" width="105" height="107">
                    <path d="M0.0212402 0.0323792H104.996V106.988H0.0212402V0.0323792Z" fill="#C4C4C4"></path>
                  </mask>
                  <g mask="url(#mask0)">
                    <path
                      d="M13.0762 86.591L13.0756 86.5905C1.51942 76.0824 -0.0885944 56.5296 5.58991 38.8218C11.2654 21.1233 24.1498 5.49618 41.2936 2.78448C57.8516 0.21186 75.7845 11.3968 87.9858 26.9759C94.0768 34.7532 98.7119 43.5946 101.013 52.2978C103.315 61.0027 103.276 69.5412 100.061 76.7426C93.6063 91.2024 78.9301 100.102 62.3014 102.163C45.6769 104.224 27.1539 99.439 13.0762 86.591Z"
                      fill="white" stroke="#FCFBF9" stroke-width="0.80464" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                    <rect x="41.5" y="43.5" width="8.24" height="23.3871" rx="1.5" fill="#EA7052" stroke="#EA7052">
                    </rect>
                    <rect x="53.26" y="43.5" width="8.24" height="23.3871" rx="1.5" fill="#EA7052" stroke="#EA7052">
                    </rect>
                  </g>
                </svg>
              </div>
              <div class="theSeekbarCont d-flex justify-content-center">
                <div class="col-md-12 row" style="flex-wrap: nowrap; margin-left: 150px;">
                  <p id="startTime" class="col-sm-1 vidTime">0:00</p>
                  <input id="seekbar" class="col-sm-7 seekbar" type="range" min="0" max="100"></input>
                  <p id="remainTime" class="col-sm-1 vidTime">0:00</p>
                  <i class="fas fa-expand" onclick="fullscreen()" class="expando col-sm-1" style="color: #fff; margin-top: 15px; cursor: pointer;"></i>
                </div>
              </div>
            </div>
          </div>
          </section>
          <section class="d-flex justify-content-center mt-3 all-content">
            <div class="col-md-8">
              <div style="display: flex; justify-content: space-between;">
              <span href="" class="btn btn-dark" onclick="prev();"> <i class="fas fa-arrow-left px-1"></i>Previous video</span>
              <span href="" class="btn btn-dark" onclick="next();"><i class="fas fa-arrow-right px-1"></i>Next video</span>
              </div>
            </div>
            </section>
        <section class="d-flex justify-content-center mt-4 all-content">
         <div class="col-md-8">
               <div style="float: right;">
                 <!-- <a href="quiz.php" class="btn btn-primary"> Take Quiz</a> -->
                 <button type="button" class="btn btn-default" id="quizs" data-inline="false" data-bs-toggle="modal" data-bs-target="#costumModal28">Take Quiz </button>
                  
                </div>
               <div id="par"></div>
           </div>

            
        </section>
    
        <div id="costumModal28"  class="modal fade fluid" data-easein="tada"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content" style="background:white">
                    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            ×
                        </button>
                        
                    <center>
                    <div class="modal-body">
                      <img class="img-fluid" src="img/bkquiz.webp" width="50%" alt=""><br>
                      <a href="quiz.php"><button type="button" class="btn" style="background:#ea7052;color:#fff" id="quizs" >Take Quiz </button></a>

                    </div>
                    </center>
                    
                </div>
            </div>
        </div>
          <!-- Modal -->
          <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
        
                <div class="modal-header">
                  
                  <h4 class="modal-title" id="myModalLabel2"><div class="input-group">
                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Find key-words" aria-label="Username" aria-describedby="basic-addon1">
                  </div></h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <div class="modal-body">
                
                  <?php echo $card; ?>
                </div>
              </div><!-- modal-content -->
            </div><!-- modal-dialog -->
          </div><!-- modal -->
      </div>
    </main>
    
  </section>

  


<script>
  
    var array = [<?php echo $getVid;?>];
    var cpt = 0;
    var countPrev = 0;
    //Init the 'par' div before click
    // document.querySelector("#video").innerHTML = array[cpt];

    function next() 
    {
      if(cpt<array.length-1){
        countPrev = cpt;
        cpt++;
        
        
        
      }else{
        cpt=0;
      }
      
      
      var video = document.getElementById('video');
      var source = document.getElementById('source');
      var vidTitle = array[cpt]
      source.setAttribute('src', vidTitle);
      console.log(cpt)
      if (cpt === 0) {
          console.log("QUIZ")
          video.pause();
          document.getElementById('quizs').click();
          
      }else{
        video.load();
        video.play();
      }
      
    }

    function prev() 
    {
      // console.log(countPrev)
      var video = document.getElementById('video');
      var source = document.getElementById('source');
      var vidTitle = array[countPrev]
      source.setAttribute('src', vidTitle);

      video.load();
      video.play();
    }
 
    // $(".modal").each(function(l){$(this).on("show.bs.modal",function(l){var o=$(this).attr("data-easein");"shake"==o?$(".modal-dialog").velocity("callout."+o):"pulse"==o?$(".modal-dialog").velocity("callout."+o):"tada"==o?$(".modal-dialog").velocity("callout."+o):"flash"==o?$(".modal-dialog").velocity("callout."+o):"bounce"==o?$(".modal-dialog").velocity("callout."+o):"swing"==o?$(".modal-dialog").velocity("callout."+o):$(".modal-dialog").velocity("transition."+o)})});
    

</script>
  <script src="js/jquery.js"></script>
  <script src="css/dist/js/bootstrap.bundle.js"></script>
  <script src="js/index.js"></script>
  
</body>

</html>