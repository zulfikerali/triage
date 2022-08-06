<template>
  <div class="min-h-screen">
    <h1 class="font-bold text-4xl text-center text-indigo-700 flex-none mt-5">
      Enter Your ID then click start button to start your exam.
    </h1>
    <div class="flex justify-center items-center mt-6">
      <div class="mt-4">
        <div class="flex rounded-md overflow-hidden w-80">
          <input
            type="text"
            v-model="traineeId"
            class="px-2 w-2/3 border rounded-md rounded-r-none"
            placeholder="Enter Trainee ID"
            v-on:keyup.enter="goToQuestionPage"
          />
          <button
            @click="goToQuestionPage"
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
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import repository from "../../api/repository";
const router = useRouter();
const activeEp = ref(null);
const traineeId = ref(null);
function hasOneDigit(val) {
  if (String(Math.abs(val)).charAt(0) == val) {
    return 0;
  } else {
    return;
  }
}
onMounted(() => {
  repository
    .activeEpisode()
    .then((res) => {
      activeEp.value = res.data;
    })
    .catch((err) => {
      console.log(err.message);
    });
});
const goToQuestionPage = () => {
  if (traineeId.value != null) {
    router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
  } else {
    alert("Feild is required!");
  }
};
</script>
