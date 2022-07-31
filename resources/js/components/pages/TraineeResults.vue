<template>
  <!-- component -->
  <!-- This is an example component -->
  <div
    v-if="traineeResultData.length > 0"
    class="flex items-center justify-center min-h-screen"
  >
    <div
      class="rounded-xl border p-5 shadow-md w-9/12 bg-white"
      v-for="result in traineeResultData"
      :key="result.id"
    >
      <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="flex items-center space-x-3">
          <div class="text-lg font-bold text-slate-700">
            {{ result.episode_name }}
          </div>
        </div>
        <div class="flex items-center space-x-8">
          <button
            class="
              rounded-2xl
              border
              bg-neutral-100
              px-3
              py-1
              text-xs
              font-semibold
            "
          >
            Total Trainee - {{ result.results.length }}
          </button>
        </div>
      </div>

      <div class="mt-4 mb-6 flex flex-wrap justify-center items-center gap-4">
        <div v-for="r in result.results" :key="r.id">
          <router-link
            :to="`/result-report/${r.episode_id}/${r.trainee_id}`"
            class="
              relative
              bg-green-400
              text-white
              p-3
              rounded-lg
              text-sm
              uppercase
              font-semibold
              tracking-tight
              overflow-visible
            "
          >
            {{r.trainee_id}}
            <!-- <div
              class="
                absolute
                -top-3
                -right-3
                px-2.5
                py-0.5
                bg-yellow-500
                rounded-full
                text-xs
              "
            >
              1
            </div> -->
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import repository from "../../api/repository";
const traineeResultData = ref([]);
const allTraineeResults = () => {
  repository
    .getTraineeResults()
    .then((res) => {
      traineeResultData.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
onMounted(() => {
  allTraineeResults();
});
</script>

<style>
</style>