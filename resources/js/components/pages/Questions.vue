<template>
  <div class="flex w-full justify-center items-center">
    <div class="w-full max-w-xl p-3">
      <h1 class="font-bold text-5xl text-center text-indigo-700">Triage</h1>
      <div class="flex justify-center mt-4">
        <video
          id="myVedio"
          width="320"
          height="240"
          v-if="questionsData.length > 0"
          autoplay
        >
          <source
            :src="'/videos/' + questionsData[0].video_path"
            type="video/mp4"
          />
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-lg w-full mt-8">
      <div v-if="nextPage">
        <p class="text-xl text-gray-500 font-bold mb-5 text-center">
          Whice color do you think about this victim?
        </p>
        <div class="grid grid-rows-2 grid-flow-col gap-4 justify-center">
          <div class="bg-red-500 h-36 w-36 rounded-lg shadow-md cursor-pointer hover:bg-red-700"></div>
          <div class="bg-yellow-400 h-36 w-36 rounded-lg shadow-md cursor-pointer hover:bg-yellow-600"></div>
          <div class="bg-green-500 h-36 w-36 rounded-lg shadow-md cursor-pointer hover:bg-green-700"></div>
          <div class="bg-gray-800 h-36 w-36 rounded-lg shadow-md cursor-pointer hover:bg-gray-900"></div>
      </div>
      </div>
      <div v-else>
        <p class="text-xl font-bold">
          What is the priority?
        </p>
        <label
          for="a"
          class="
            block
            mt-4
            border border-gray-300
            rounded-lg
            px-6
            py-2
            text-lg
            hover:bg-gray-100
            cursor-pointer
          "
          ><input id="a" type="radio" class="hidden" value="a" /> One </label
        >
        <label
          for="b"
          class="
            block
            mt-4
            border border-gray-300
            rounded-lg
            px-6
            py-2
            text-lg
            hover:bg-gray-100
            cursor-pointer
          "
          ><input id="b" type="radio" class="hidden" value="b" />Two</label
        ><label
          for="c"
          class="
            block
            mt-4
            border border-gray-300
            rounded-lg
            px-6
            py-2
            text-lg
            hover:bg-gray-100
            cursor-pointer
          "
          ><input id="c" type="radio" class="hidden" value="c" />Three</label
        ><label
          for="d"
          class="
            block
            mt-4
            border border-gray-300
            rounded-lg
            px-6
            py-2
            text-lg
            hover:bg-gray-100
            cursor-pointer
          "
          ><input id="d" type="radio" class="hidden" value="d" />Four</label
        >
      </div>
      <div class="mt-6 flow-root">
          <button
          v-if="nextPage"
          @click="gotoNextPage"
            class="
              float-right
              bg-indigo-600
              text-white text-sm
              font-bold
              tracking-wide
              rounded-full
              px-5
              py-2
            "
          >
            Next &gt;</button
          >
          <button
          v-else
          @click="gotoNextPage"
            class="
              float-right
              bg-indigo-600
              text-white text-sm
              font-bold
              tracking-wide
              rounded-full
              px-5
              py-2
            "
          >
            Finish
          </button>
      </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
// import axios from 'axios'
import repository from "../../api/repository";
const route = useRoute();
const questionsData = ref([]);
const videoPlayer = ref(null);
const isOpen = ref(false);
const nextPage = ref(true);
const gotoNextPage = () => {
  nextPage.value = !nextPage.value;
};
onMounted(() => {
  console.log("videoPlayer", videoPlayer);
  // playVideo()
  // repository.questions(parseInt(route.params.episode))
  console.log(route)
  repository
    .questions()
    .then((res) => {
      questionsData.value = res.data;
      console.log(res.data);
      // playVideo()
    })
    .catch((err) => {
      console.log(err.message);
    });
});
const videoPath = () => {
  const player = document.getElementById("player");
  // player.play()
};
const playVideo = () => {
  const v = document.getElementById("myVedio");
  v.play();
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