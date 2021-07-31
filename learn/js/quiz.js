//Instruction
const instruction = document.querySelector(".instruction")
//Question
const theQuestion = document.querySelector(".the_question")

const optionsCont = document.querySelector("#optionsCont")
const nextQues = document.querySelector("#nextQues")


let availableQuestions = []
let currentQuestion = {}
let acceptingAnswers = false
let score = 0

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
  acceptingAnswers = true
}

nextQues.addEventListener("click", function () {
  optionsCont.innerHTML = ""
  getNewQuestion();
})

getQuestion()



const corrsound = document.getElementById("correctsound")
const wrrsound = document.getElementById("wrongsound")
var scoreText = document.querySelector(".score")

function correctAnswer() {
  corrsound.play()
  alert("You are correct")
  incrementScore(CURRECT_BUNOS)
}
function wrongAnswer() {
  wrrsound.play()
  alert(" You are Wrong")
}

// Timer
var timer = document.querySelector("#timer")
var timerCount = 15;
var interval = setInterval(function () {
  timer.innerHTML = timerCount + "secs";
  timerCount--;
  if (timerCount < 0) {
    clearInterval(interval);
    timer.innerHTML = 'Done';
    // or...
    alert("You're out of time!");
  }
}, 1000);

