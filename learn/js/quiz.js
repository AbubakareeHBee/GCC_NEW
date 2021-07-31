const quiz_cont = document.querySelector(".quiz_cont")

//Instruction
const instruction = document.querySelector(".instruction")
//Question
const theQuestion = document.querySelector(".the_question")

const optionsCont = document.querySelector("#optionsCont")
const nextQues = document.querySelector("#nextQues")
const alertCont = document.querySelector(".alertCont")

let availableQuestions = []
let currentQuestion = {}
let acceptingAnswers = true
let score = 0
let Timerrunning = false
let timerCount = 15

const CURRECT_BUNOS = 10;
incrementScore = num => {
  score += num;
  scoreText.innerText = score;
};

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
  for (let i = 0; i < cleanOptions.length; i++) {
    optionsCont.innerHTML += (`<input type="hidden" id="the_answer" value="` + currentQuestion.ans + `">`)
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
          correctAnswer()
        } else {
          wrongAnswer()
        }

      })
    })

  }


  // availableQuestions.splice(questionIndex, 1);
  timerCount = 15
  acceptingAnswers = true
}

nextQues.addEventListener("click", function () {
  optionsCont.innerHTML = ""
  getNewQuestion();
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
  if (timerCount < 0) {
    clearInterval(interval);
    alertCont.innerHTML += `<div class="alert timeUpAlert text-center alert-danger">
      The correct Answer is `+ currentQuestion.ans + `
    </div>`
    $("alert.timeUpAlert").fadeIn(200)
    var ii = document.querySelectorAll(".option")
    ii.forEach((iii) => {
      var answering = iii.dataset.answer
      if(answering === currentQuestion.ans ) {
        iii.classList.add("optionActive")
      }

    })
    // const oo = $(".option")
    // // .find(`[data-answer='${currentQuestion.ans}']`)
    // console.log(oo.dataset)
    acceptingAnswers = false
  }
}, 1000);

const corrsound = document.getElementById("correctsound")
const wrrsound = document.getElementById("wrongsound")
var scoreText = document.querySelector(".score")

function correctAnswer() {
  corrsound.play()
  $(".alert-success").fadeIn(300).delay(1500).fadeOut(400);
  Timerrunning = false
  incrementScore(CURRECT_BUNOS)
}
function wrongAnswer() {
  $(".alert-danger").fadeIn(300).delay(1500).fadeOut(400);
  wrrsound.play()
}



