<template>
    <div v-show="game.timer">
        <div class="bg-transparent text-2xl text-thin text-gray-500 absolute right-2 top-2">
            {{ game.minutes + "m " + game.seconds + "s " }}
        </div>
    </div>
    <div v-if="game.state == 'video'">
        <div class="bg-transparent absolute right-2 top-2">
            <button
                @click="game.state = 'exam'"
                class="px-4 py-1 bg-blue-500 text-white rounded-3xl hover:bg-blue-700"
            >
                Start
            </button>
        </div>
        <div v-for="(question, index) in questionsData" :key="question.id">
            <div class="flex justify-center">
                <!--@ended="onended"-->
                <video
                    class="w-auto max-w-5xl 2xl:max-w-7xl m-3 rounded lg:rounded-lg absolute"
                    v-if="game.current === index"
                    controls
                >
                    <source :src="'/videos/' + question.video_path" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <div v-if="game.state == 'exam'"
         class="min-h-screen" >
        <h1 class="font-bold text-2xl lg:text-4xl text-center text-indigo-700 flex-none mt-5">
            Enter Your ID then click start button to start your exam.
        </h1>
        <div class="flex justify-center items-center mt-6">
            <div class="mt-4">
                <div class="flex rounded-md overflow-hidden w-80">
                    <input
                        type="text"
                        v-model="evaluation.traineeID"
                        class="px-2 w-2/3 border rounded-md rounded-r-none"
                        placeholder="Enter Trainee ID"
                        v-on:keyup.enter="submitTraineeID"
                    />
                    <button
                        @click="submitTraineeID"
                        class="
                            bg-indigo-600
                            text-white
                            px-3
                            text-lg
                            font-semibold
                            py-2
                            rounded-r-md
                          "
                    >
                        Start Test
                    </button>
                </div>
            </div>
        </div>
        <button
            v-on:click="nextVideo"
            class="absolute bottom-2 right-2 px-3 py-1 bg-gray-500 text-white rounded" >
            {{ questionsData.length == (game.current + 1) ? 'Show Result' : 'Next Video'}}
        </button>
    </div>
    <div v-if="game.state === 'triage'"
        class="bg-white p-6 rounded-lg shadow-lg w-full h-screen"
    >
        <p
          class="text-xl lg:text-4xl text-gray-500 font-thin mt-4 mb-10 text-center"
        >
            আক্রান্তের কালার কোড কি হবে ?
        </p>
        <div class="grid grid-rows-2 grid-flow-col gap-4 justify-center p-3">
          <div @click="setColorCode(1)"
            class="
                flex items-center justify-center
                bg-red-500
                h-36
                lg:h-48
                w-36
                lg:w-48
                rounded-lg
                shadow-md
                cursor-pointer
                hover:bg-red-700
            "
          >
              <svg v-if="game.questionAnswer.selectedColorCode == 1" class="h-8 w-8" viewBox="0 0 448 512" fill="white">
                  <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
              </svg>
          </div>
          <div @click="setColorCode(3)"
            class="
            flex items-center justify-center
              bg-green-500
              h-36
              lg:h-48
              w-36
              lg:w-48
              rounded-lg
              shadow-md
              cursor-pointer
              hover:bg-green-700
            "
          >
              <svg v-if="game.questionAnswer.selectedColorCode == 3" class="h-8 w-8" viewBox="0 0 448 512" fill="white">
                  <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
              </svg>
          </div>
          <div @click="setColorCode(2)"
            class="
            flex items-center justify-center
              bg-yellow-400
              h-36
              lg:h-48
              w-36
              lg:w-48
              rounded-lg
              shadow-md
              cursor-pointer
              hover:bg-yellow-600
            "
          >
              <svg v-if="game.questionAnswer.selectedColorCode == 2" class="h-8 w-8" viewBox="0 0 448 512" fill="white">
                  <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
              </svg>
          </div>
          <div @click="setColorCode(4)"
            class="
            flex items-center justify-center
              bg-gray-800
              h-36
              lg:h-48
              w-36
              lg:w-48
              rounded-lg
              shadow-md
              cursor-pointer
              hover:bg-gray-900
            "
          >
              <svg v-if="game.questionAnswer.selectedColorCode == 4" class="h-8 w-8" viewBox="0 0 448 512" fill="white">
                  <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
              </svg>
          </div>
        </div>
        <div class="text-center">
            <button
                v-show="game.questionAnswer.selectedColorCode != null"
                @click="colorCodeSubmit"
                class="px-16 py-2 mt-2 bg-blue-500 text-white shadow-md rounded-3xl hover:bg-blue-700"
            > SUBMIT
            </button>
        </div>
        <div class="max-w-md absolute left-10 top-32 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center px-6 py-3 bg-gray-900">
                <h1 class="mx-3 text-lg font-semibold text-white">ট্রায়েজ প্রশ্ন</h1>
            </div>
            <div class="p-4">
                <div
                    v-for="vq in questionsData[game.current].victim_questions"
                    :key="vq.id"
                    class="text-gray-500 border p-2 rounded mb-4"
                >
                    <h1 class="px-1 text-sm pb-2"><b>ফার্স্ট রেস্পন্ডার :</b> {{ vq.paramedic_question }}</h1>
                    <h1 class="px-1 text-sm"><b>আক্রান্ত :</b> {{ vq.victim_answer }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div v-if="game.state === 'priority'"
        class="
          antialiased
          bg-slate-200
          w-full
          h-screen
          flex
          justify-center
          flex-col
        "
    >
    <div
      class="
        max-w-lg
        mx-3
        md:mx-auto
        bg-white
        p-8
        rounded-xl
        shadow shadow-slate-300
      "
    >
      <p
        class="
          text-2xl
          text-gray-500
          font-thin
          mt-4
          mb-10
          text-center
        "
      >
          আক্রান্তের প্রায়োরিটি কি হবে ?
      </p>

      <div class="my-5">
        <button
            v-for="(priority, index) in priorities"
            :key="index"
            @click="setPriority(index + 1)"
            :class="{'bg-green-500 text-white': game.questionAnswer.selectedPriority == (index + 1) }"
            class="relative
                w-full
                text-center
                py-3
                my-3
                border
                flex
                space-x-2
                items-center
                justify-center
                border-slate-200
                rounded-lg
                hover:bg-green-500 hover:text-white hover:shadow
                transition
                duration-150
            "
        >
            <span class="absolute right-2">
                <svg v-if="game.questionAnswer.selectedPriority == (index + 1)" class="h-8 w-8" viewBox="0 0 448 512" fill="white">
                  <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
              </svg>
            </span>
          <span class="text-lg lg:text-xl">{{ priority }}</span>
        </button>
          <div class="text-center">
              <button
                  v-show="game.questionAnswer.selectedPriority != null"
                  @click="prioritySubmit"
                  class="px-16 py-2 mt-2 bg-blue-500 text-white shadow-md rounded-3xl hover:bg-blue-700"
              > SUBMIT
              </button>
          </div>
      </div>
      <div class="max-w-md absolute left-10 top-32 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center px-6 py-3 bg-gray-900">
                <h1 class="mx-3 text-lg font-semibold text-white">ট্রায়েজ প্রশ্ন</h1>
            </div>
            <div class="p-4">
                <div
                    v-for="vq in questionsData[game.current].victim_questions"
                    :key="vq.id"
                    class="text-gray-500 border p-2 rounded mb-4"
                >
                    <h1 class="px-1 text-sm pb-2"><b>প্যারামেডিক :</b> {{ vq.paramedic_question }}</h1>
                    <h1 class="px-1 text-sm"><b>আক্রান্ত :</b> {{ vq.victim_answer }}</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div v-if="game.state === 'result'">
        <Result :result="game.resultData" :episode="questionsData[0].episode_id" :traineeId='evaluation.traineeID'/>
    </div>
</template>
<script setup>
import { ref, onMounted, reactive } from "vue";
import {useRoute, useRouter} from "vue-router";
import Result from "../pages/ResultReport.vue";
// import axios from 'axios'
import repository from "../../api/repository"
const route = useRoute()
const router = useRouter()
const evaluation = reactive({
  traineeID: null,
  result: [],
  resultValue: {
    attempt: 0,
    correct: 0,
    wrong: 0,
    marks: 0,
    questions: 0,
    ccm: 0,
    pm: 0
  },
})
const questionsData = ref([])
const videoPlayer = ref(null)
const nextPage = ref(true)
const video = document.getElementById("video")
const priorities = ['এক', 'দুই', 'তিন', 'চার']
const game = reactive({
    current: 0,
    state: "video",
    minutes: 0,
    seconds: 0,
    timer: null,
    questionAnswer: {
        questionID: null,
        selectedColorCode: null,
        correctColorCode: null,
        selectedPriority: null,
        correctPriority: null,
    },
    resultData: [],
});

const gameStart = () => {
    let countDownDate = new Date().getTime() + 31000
    game.timer = setInterval(() => {
        let now = new Date().getTime()
        let distance = countDownDate - now
        game.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
        game.seconds = Math.floor((distance % (1000 * 60)) / 1000)
        if (distance < 0) {
            answerSubmit()
        }
    }, 1000)
}

const setColorCode = (code) => {
    game.questionAnswer.selectedColorCode = code;
};
const setPriority = (code) => {
    game.questionAnswer.selectedPriority = code;
};
const colorCodeSubmit = () => {
  evaluation.resultValue.attempt++;
  if (game.questionAnswer.selectedColorCode == questionsData.value[game.current].color_code) {
    evaluation.resultValue.ccm += questionsData.value[game.current].color_code_marks;
    evaluation.resultValue.correct++;
    evaluation.resultValue.marks += questionsData.value[game.current].color_code_marks;
  } else {
    evaluation.resultValue.wrong++;
  }
  game.questionAnswer.questionID = questionsData.value[game.current].id;
  game.questionAnswer.correctColorCode = questionsData.value[game.current].color_code;
  game.state = "priority";
};
const prioritySubmit = () => {
    answerSubmit()
};

const answerSubmit = () => {
    evaluation.resultValue.attempt++;
    if (game.questionAnswer.selectedPriority == questionsData.value[game.current].priority) {
        evaluation.resultValue.correct++;
        evaluation.resultValue.pm += questionsData.value[game.current].priority_marks;
        evaluation.resultValue.marks += questionsData.value[game.current].priority_marks;
    } else {
        evaluation.resultValue.wrong++;
    }
    game.questionAnswer.correctPriority =
        questionsData.value[game.current].priority;
    let clone = { ...game.questionAnswer };
    evaluation.result.push(clone);
    clearInterval(game.timer)
    game.timer = null
    repository
        .storeAnswerSummit({ evaluation: evaluation })
        .then((res) => {
            let resData = { ...evaluation.resultValue };
            game.resultData = resData;
            traineeReset()
        })
        .catch((err) => {
            console.log(err);
        });
    console.log(evaluation);
    // return
}

const traineeReset = () => {
    evaluation.traineeID = null
    evaluation.result = []
    evaluation.resultValue.attempt = 0
    evaluation.resultValue.correct = 0
    evaluation.resultValue.wrong = 0
    evaluation.resultValue.marks = 0
    game.questionAnswer.selectedColorCode = null
    game.questionAnswer.correctColorCode = null
    game.questionAnswer.selectedPriority = null
    game.questionAnswer.correctPriority = null
    game.resultData = []
    game.minutes = 0
    game.seconds = 0
    game.state = "exam"
}

const nextVideo = () => {
    console.log(' Router push',game.current, questionsData.value.length)
    if ((game.current + 1) == questionsData.value.length) {
        router.push(`/result-report/${questionsData.value[0].episode_id}`)
    }
    game.current++
    game.state = "video"
}

const setExistingData = (data) => {
    evaluation.result = data.evaluation_data
    evaluation.resultValue = data.result_data
}

const submitTraineeID = () => {
    if (!!evaluation.traineeID) {
        repository
            .getResult(questionsData.value[0].episode_id, evaluation.traineeID)
            .then((res) => {
                if(res.data){
                    setExistingData(res.data)
                }
            })
            .catch((err) => {
                console.log(err.message);
            });
        gameStart()
        game.state = 'triage'
    } else {
        alert("Trainee ID is required!")
    }
};

onMounted(() => {
   // gameStart()
  repository
    .questions()
    .then((res) => {
      questionsData.value = res.data;
      evaluation.resultValue.questions = questionsData.value.length
      clearInterval(game.timer)
      game.timer = null
      console.log(res.data);
      document.addEventListener('keyup', (e) => {
        if (!e.altKey) return
        if(e.keyCode === 39) nextVideo()
      })
    })
    .catch((err) => {
      console.log(err.message);
    });
});
</script>

<style scoped>
.bg-red {
  background-color: #ff0000;
}
.bg-yellow {
  background-color: #ffff00;
}
.bg-green {
  background-color: #00ff00;
}
.bg-black {
  background-color: #000000;
}
</style>
