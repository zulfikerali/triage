<template>
  <div v-for="(question, index) in questionsData" :key="question.id">
    <div v-if="game.state === 'video'" class="flex justify-center">
      <video
        @ended="startTriage"
        class="w-auto max-w-5xl 2xl:max-w-6xl m-3 rounded lg:rounded-lg absolute"
        v-if="game.current === index"
        autoplay
      >
        <source :src="'/videos/' + question.video_path" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
  <div v-if="game.state === 'triage'"
    class="bg-white p-6 rounded-lg shadow-lg w-full h-screen"
  >
      <p
          class="text-xl lg:text-3xl text-gray-500 font-thin mt-4  text-center"
      >
          রোগী স্থানান্তরের কালার কোড কি হবে ?
      </p>
      <div class="flex mx-auto justify-center mt-2" >
          <div class="bg-red-500 text-white text-xl w-12 h-12 p-2 rounded-full text-center">
              {{ game.sec }}
          </div>
      </div>
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
    <div class="max-w-lg mx-3 md:mx-auto bg-white p-5 rounded-xl shadow shadow-slate-300 " >
        <p class="text-xl lg:text-2xl text-gray-500 font-thin mt-4 text-center">
            চিকিৎসার প্রায়রিটি কি হবে ?
        </p>
        <div class="flex mx-auto justify-center mt-2" >
            <div class="bg-red-500 text-white text-xl w-9 h-9 p-1 rounded-full text-center">
                {{ game.sec }}
            </div>
        </div>

      <div class="my-5">
        <button
          @click="selectedPriority(1)"
          class="selected-priority"
        >
          <span class="text-lg lg:text-xl">এক</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(2)"
          class="selected-priority"
        >
          <span class="text-lg lg:text-xl">দুই</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(3)"
          class="selected-priority"
        >
          <span class="text-lg lg:text-xl">তিন</span>
        </button>
      </div>
      <div class="my-5">
        <button
          @click="selectedPriority(4)"
          class="selected-priority"
        >
          <span class="text-lg lg:text-xl">চার</span>
        </button>
      </div>
    </div>
  </div>
  <div v-if="game.state === 'result'">
    <Result
      :result="game.resultData"
      :episode="questionsData[0].episode_id"
      :traineeId="evaluation.traineeID"
    />
  </div>
</template>
<script setup>
import { ref, onMounted, reactive, inject } from "vue";
import { useRoute, useRouter } from "vue-router";
const swal = inject('$swal')
import repository from "../../api/repository";
const route = useRoute();
const router = useRouter();
const evaluation = reactive({
  traineeID: null,
  result: [],
  resultValue: {
    attempt: 0,
    correct: 0,
    wrong: 0,
    marks: 0,
    totalMarks: 0,
    questions: 0,
  },
});
const questionsData = ref([]);
const videoPlayer = ref(null);
const isOpen = ref(false);
const nextPage = ref(true);
const video = document.getElementById("video");
const game = reactive({
  current: 0,
  state: "video",
  questionAnswer: {
    questionID: null,
    selectedColorCode: null,
    correctColorCode: null,
    selectedPriority: null,
    correctPriority: null,
  },
  resultData: [],
  minutes: 0,
  seconds: 0,
  sec: 5,
  timer: null

});
const gameStart = () => {
    let countDownDate = new Date().getTime() + 1122000
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
    swal.fire({
        icon: 'warning',
        title: 'Exam Ended',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    })
}
const onended = () => {
  game.state = "triage"
};
const startTriage = () => {
  game.state = "triage"
    startTimer()
};

const startTimer = () => {
    game.timer = setInterval(() => {
        if(game.sec == 0){
            if(game.state === 'priority') { selectedPriority(0) }
            if(game.state === 'triage') { selectedColorCode(0) }
        }
        game.sec --
    },1000)
}
const endTimer = () => {
    clearInterval(game.timer)
    game.sec = 5
    game.timer = null
}

const selectedColorCode = (code) => {
  evaluation.resultValue.attempt++;
  if (code == questionsData.value[game.current].color_code) {
    evaluation.resultValue.correct++;
    evaluation.resultValue.marks +=
      questionsData.value[game.current].color_code_marks;
  } else {
    evaluation.resultValue.wrong++;
  }
  game.questionAnswer.questionID = questionsData.value[game.current].id;
  game.questionAnswer.selectedColorCode = code;
  game.questionAnswer.correctColorCode =
    questionsData.value[game.current].color_code;
    // priorityTimer()
  game.state = "priority";
    endTimer()
    startTimer()
};

const selectedPriority = (code) => {
    endTimer()
    console.log('selectedPriority =' + code)
  evaluation.resultValue.attempt++;
  if (code == questionsData.value[game.current].priority) {
    evaluation.resultValue.correct++;
    evaluation.resultValue.marks +=
      questionsData.value[game.current].priority_marks;
  } else {
    evaluation.resultValue.wrong++;
  }
  game.questionAnswer.selectedPriority = code;
  game.questionAnswer.correctPriority =
    questionsData.value[game.current].priority;
  let clone = { ...game.questionAnswer };
  evaluation.result.push(clone);
  game.current++;
  game.state = "video";
  if (questionsData.value.length == game.current) {
    gameEnd()
      setTimeout(()=>{
          router.push(`/`)
      }, 5000);

  }

};

const gotoNextPage = () => {
  nextPage.value = !nextPage.value;
};
onMounted(() => {
    // document.body.style.overflow = 'hidden'
   // gameStart()
  // playVideo()
  // repository.questions(parseInt(route.params.episode))
  console.log(route);
  repository
    .questions()
    .then((res) => {
      questionsData.value = res.data;
      evaluation.resultValue.totalMarks = sumTotal(res.data)
    })
    .catch((err) => {
      console.log(err.message);
    });
});
const sumTotal = (array) => {
  let sum = 0;

  for (let i = 0; i < array.length; i++) {
    sum += array[i].color_code_marks + array[i].priority_marks;
  }
  return sum;
};
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
