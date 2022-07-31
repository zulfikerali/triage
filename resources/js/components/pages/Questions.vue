<template>
    <div v-show="game.timer">
        <h1 class="text-center bg-transparent text-2xl text-gray-500">{{ game.minutes + "m " + game.seconds + "s " }}</h1>
    </div>
  <div v-for="(question, index) in questionsData" :key="question.id">
    <div v-if="game.state === 'video'" class="flex justify-center max-h-screen">
      <video
        @ended="onended"
        class="w-full m-2 lg:m-5 rounded lg:rounded-lg"
        v-if="game.current === index"
        autoplay
      >
        <source :src="'/videos/' + question.video_path" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
  <div
    v-if="game.state === 'triage'"
    class="bg-white p-6 rounded-lg shadow-lg w-full h-screen"
  >
    <p
      class="text-xl lg:text-5xl text-gray-500 font-thin mt-4 mb-10 text-center"
    >
      Which color do you think about this victim?
    </p>
    <div class="grid grid-rows-2 grid-flow-col gap-4 justify-center p-3">
      <div
        @click="selectedColorCode(1)"
        class="
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
      ></div>
      <div
        @click="selectedColorCode(3)"
        class="
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
      ></div>
      <div
        @click="selectedColorCode(2)"
        class="
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
      ></div>
      <div
        @click="selectedColorCode(4)"
        class="
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
      ></div>
    </div>
  </div>

  <div
    v-if="game.state === 'priority'"
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
          lg:text-5xl
          text-gray-500
          font-thin
          mt-4
          mb-10
          text-center
        "
      >
        What the priority for this victim?
      </p>

      <div class="my-5">
        <button
          @click="selectedPriority(1)"
          class="
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
            text-slate-700
            hover:bg-green-500 hover:text-white hover:shadow
            transition
            duration-150
          "
        >
          <span class="text-lg lg:text-xl">One</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(2)"
          class="
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
            text-slate-700
            hover:bg-green-500 hover:text-white hover:shadow
            transition
            duration-150
          "
        >
          <span class="text-lg lg:text-xl">Two</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(3)"
          class="
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
            text-slate-700
            hover:bg-green-500 hover:text-white hover:shadow
            transition
            duration-150
          "
        >
          <span class="text-lg lg:text-xl">Three</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(4)"
          class="
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
            text-slate-700
            hover:bg-green-500 hover:text-white hover:shadow
            transition
            duration-150
          "
        >
          <span class="text-lg lg:text-xl">Four</span>
        </button>
      </div>
    </div>
  </div>
  <div v-if="game.state === 'result'">
    <Result :result="game.resultData" :episode="questionsData[0].episode_id" :traineeId='evaluation.traineeID'/>
  </div>
</template>
<script setup>
import { ref, onMounted, reactive } from "vue";
import { useRoute } from "vue-router";
import Result from "../pages/ResultReport.vue";
// import axios from 'axios'
import repository from "../../api/repository"
const route = useRoute()
const evaluation = reactive({
  traineeID: null,
  result: [],
  resultValue: {
    attempt: 0,
    correct: 0,
    wrong: 0,
    marks: 0,
    questions: 0,
  },
})
const questionsData = ref([])
const videoPlayer = ref(null)
const isOpen = ref(false)
const nextPage = ref(true)
const video = document.getElementById("video")

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
    let countDownDate = new Date().getTime() + 102000
    game.timer = setInterval(() => {
        let now = new Date().getTime()
        let distance = countDownDate - now
        game.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
        game.seconds = Math.floor((distance % (1000 * 60)) / 1000)
        if (distance < 0) {
            gameEnd()
        }
    }, 1000)
}
const gameEnd = () => {
    clearInterval(game.timer)
    game.timer = null
    evaluation.traineeID = route.query.traineeID;
    evaluation.resultValue.questions = questionsData.value.length;
    repository
        .storeResult({ evaluation: evaluation })
        .then((res) => {
            let resData = { ...evaluation.resultValue };
            game.resultData = resData;
            game.state = "result";
        })
        .catch((err) => {
            console.log(err);
        });
    console.log(evaluation);
    // return
}
const onended = () => {
  game.state = "triage";
};

const selectedColorCode = (code) => {
  evaluation.resultValue.attempt++;
  if (code == questionsData.value[game.current].color_code) {
    evaluation.resultValue.correct++;
    evaluation.resultValue.marks += questionsData.value[game.current].color_code_marks;
  } else {
    evaluation.resultValue.wrong++;
  }
  game.questionAnswer.questionID = questionsData.value[game.current].id;
  game.questionAnswer.selectedColorCode = code;
  game.questionAnswer.correctColorCode = questionsData.value[game.current].color_code;
  game.state = "priority";
};

const selectedPriority = (code) => {
  evaluation.resultValue.attempt++;
  if (code == questionsData.value[game.current].priority) {
    evaluation.resultValue.correct++;
    evaluation.resultValue.marks += questionsData.value[game.current].priority_marks;
  } else {
    evaluation.resultValue.wrong++;
  }
  game.questionAnswer.selectedPriority = code;
  game.questionAnswer.correctPriority =
    questionsData.value[game.current].priority;
  let clone = { ...game.questionAnswer };
  evaluation.result.push(clone);
  game.current++;
  if (questionsData.value.length == game.current) {
      gameEnd()
  }
  game.state = "video";
};

const gotoNextPage = () => {
  nextPage.value = !nextPage.value;
};
onMounted(() => {
    gameStart()
  // playVideo()
  // repository.questions(parseInt(route.params.episode))
  console.log(route);
  repository
    .questions()
    .then((res) => {
      questionsData.value = res.data;
      console.log(res.data);
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
