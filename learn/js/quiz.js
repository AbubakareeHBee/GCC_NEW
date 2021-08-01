const quiz_cont = document.querySelector(".quiz_cont")

//Instruction
const instruction = document.querySelector(".instruction")
//Question
const theQuestion = document.querySelector(".the_question")

const optionsCont = document.querySelector("#optionsCont")
const nextQues = document.querySelector("#nextQues")
const alertCont = document.querySelector(".alertCont")
const corrsound = document.getElementById("correctsound")
const wrrsound = document.getElementById("wrongsound")
var scoreText = document.querySelector(".score")

function correctAnswer(vallue) {
  current_bonus = vallue
  corrsound.play()
  $(".alert-success").fadeIn(300).delay(1500).fadeOut(400);
  Timerrunning = false
  incrementScore(current_bonus)
}
function correctAnswer1() {
  
  corrsound.play()
  $(".alert-success").fadeIn(300).delay(1500).fadeOut(400);
  Timerrunning = false
  // incrementScore(current_bonus)
}

function wrongAnswer() {
  $(".alert-danger").fadeIn(300).delay(1500).fadeOut(400);
  wrrsound.play()
}
let availableQuestions = []
let currentQuestion = {}
let acceptingAnswers = true
let score = 0
let Timerrunning = false
let timerCount = 200

let current_bonus = 10;
incrementScore = num => {
  score += num;
  scoreText.innerText = score;
};
document.getElementById('nextQues').style.visibility = 'hidden';
async function getQuestion() {
  // const response = await fetch("https://opentdb.com/api.php?amount=10&category=18&difficulty=easy&type=multiple");
  const response = await fetch("https://steamledge.com/mylearningfriend/students/ajax.php?ass=assessment_literacy_phonics_level_1");

  const data = await response.json()
  const questions = data

  availableQuestions = [...questions]
  getNewQuestion();
}

function getNewQuestion() {
  if (availableQuestions.length === 0) {
    //go to end Page
    window.alert("You have completed your quiz");
  }
  const questionIndex = Math.floor(Math.random() * availableQuestions.length);
  currentQuestion = availableQuestions[questionIndex]; // Getting only one question

  console.log(currentQuestion)
  theQuestion.innerHTML = currentQuestion.q;
  instruction.innerHTML = currentQuestion.inst

  // Start Timer
  Timerrunning = true

  var options = [...currentQuestion.options]
  cleanOptions = options.filter(Boolean)
  console.log(cleanOptions)
  optionsCont.innerHTML += (`<input type="hidden" id="the_answer" value="` + currentQuestion.ans + `">`) // i moved this off the loop you created below to avoid setting memories for redundant variables, you only need it once not to the count of the looping...
  for (let i = 0; i < cleanOptions.length; i++) {
    
    optionsCont.innerHTML += (`<p class="option card" data-answer="` + cleanOptions[i] + `">` + cleanOptions[i] + `</p>`)


    // Getting Wrong and correct answer 

    var theAnswer = document.getElementById("the_answer").value
    const optionsQuiz = document.querySelectorAll(".option")

    $(function () {
      $('.option').on('click', function () {
        $(this).parent().find('.option.optionActive').removeClass('optionActive');
        $(this).addClass('optionActive');
      });
    });

    optionsQuiz.forEach((option) => {
      option.addEventListener("click", function () {

        if (option.dataset.answer === theAnswer) {
          correctAnswer(10)
          document.getElementById('nextQues').style.visibility = 'visible';

        } else {
          wrongAnswer()
        }

      })
    })

  }


  // availableQuestions.splice(questionIndex, 1);
  timerCount = 200
  acceptingAnswers = true
  var timer = document.querySelector("#timer")
var interval = setInterval(function () {
  timer.innerHTML = timerCount + "secs";
  if (Timerrunning) {
    timerCount--;
  }
  if (timerCount <= 0) {
    clearInterval(interval);
    // alertCont.innerHTML += `<div class="alert timeUpAlert text-center alert-success">
    //   The correct Answer is `+ currentQuestion.ans + `
    // </div>`
    $("alert.timeUpAlert").fadeIn(200)
    var ii = document.querySelectorAll(".option")
    ii.forEach((iii) => {
      var answering = iii.dataset.answer
      if(answering === currentQuestion.ans ) {
        iii.classList.add("optionActive")
        correctAnswer1()
        corrsound.play()
        quiz_cont.style.pointerEvents = "none"
        document.getElementById('nextQues').style.visibility = 'visible';
        



      }else{
        // iii.setAttribute("onclick", "return false;");

      }

    })
    // const oo = $(".option")
    // // .find(`[data-answer='${currentQuestion.ans}']`)
    // console.log(oo.dataset)
    acceptingAnswers = false
  }
}, 1000);
}

nextQues.addEventListener("click", function () {
  optionsCont.innerHTML = ""
  // alertCont.innerHTML = ""
  document.getElementById('nextQues').style.visibility = 'hidden';
  quiz_cont.style.pointerEvents = ""
  
  getNewQuestion();
  // Timerrunning = true


})

getQuestion()

// Disabling clicking options 
if (!acceptingAnswers) {
  quiz_cont.style.pointerEvents = "none"
}


// Timer
var timer = document.querySelector("#timer")
var interval = setInterval(function () {
  timer.innerHTML = timerCount + "secs";
  if (Timerrunning) {
    timerCount--;
  }
  if (timerCount <= 0) {
    clearInterval(interval);
    // alertCont.innerHTML += `<div class="alert timeUpAlert text-center alert-success">
    //   The correct Answer is `+ currentQuestion.ans + `
    // </div>`
    $("alert.timeUpAlert").fadeIn(200)
    var ii = document.querySelectorAll(".option")
    ii.forEach((iii) => {
      var answering = iii.dataset.answer
      if(answering === currentQuestion.ans ) {
        iii.classList.add("optionActive")
        correctAnswer1(0)
        corrsound.play()
        quiz_cont.style.pointerEvents = "none"
        document.getElementById('nextQues').style.visibility = 'visible';
        



      }else{
        // iii.setAttribute("onclick", "return false;");

      }

    })
    // const oo = $(".option")
    // // .find(`[data-answer='${currentQuestion.ans}']`)
    // console.log(oo.dataset)
    acceptingAnswers = false
  }
}, 1000);






