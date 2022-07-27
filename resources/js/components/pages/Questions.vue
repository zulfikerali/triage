<template>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <button
        @click="isOpen = true"
        class="px-6 py-2 text-white bg-blue-600 rounded shadow"
        type="button"
      >
        Open Model
      </button>

      <div
        v-show="isOpen"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
          z-10
        "
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">
              Enter Your ID then Click Go Button to start your test.
            </h3>
            <!-- <svg
              @click="isOpen = false"
              xmlns="http://www.w3.org/2000/svg"
              class="w-8 h-8 text-red-900 cursor-pointer"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg> -->
          </div>
          <div class="mt-4">
            <div class="flex rounded-md overflow-hidden w-full">
              <input
                type="text"
                class="p-2 w-full border rounded-md rounded-r-none"
                placeholder="Enter Your ID"
              />
              <button
                class="
                  bg-indigo-600
                  text-white
                  px-6
                  text-lg
                  font-semibold
                  py-4
                  rounded-r-md
                "
              >
                Go
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
        <button @click="playVideo">Play</button>
      </div>
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
  repository
    .questions(1)
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