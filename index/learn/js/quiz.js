//Instruction
const instruction = document.querySelectorAll(".instruction")
//Question
const theQuestion = document.querySelector(".the_question")

const optionsCont = document.querySelector("#optionsCont")
const nextQues = document.querySelector("#nextQues")


let availableQuestions = []
let currentQuestion = {}
let acceptingAnswers = false

async function getQuestion() {
  const response = await fetch("https://opentdb.com/api.php?amount=10&category=18&difficulty=easy&type=multiple");
  // const response = await fetch("https://steamledge.com/mylearningfriend/students/ajax.php?ass=assessment_literacy_phonics_level_1");

  const data = await response.json()
  const questions = data.results

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
  theQuestion.innerHTML = currentQuestion.question;



  var options = currentQuestion.incorrect_answers;

  options.splice(currentQuestion.answer - 1, 0, currentQuestion.correct_answer)
  console.log(options)
  for (let i = 0; i < options.length; i++) {
    optionsCont.innerHTML += (`<input type="hidden" id="the_answer" value="` + currentQuestion.correct_answer + `">`)
    optionsCont.innerHTML += (`<p class="option card" data-answer="` + options[i] + `">` + options[i] + `</p>`)

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
  scoreText.textContent = score
}
function wrongAnswer() {
  wrrsound.play()
  alert(" You are Wrong")
}

