<template>
<Layout>
  <div
    v-if="traineeResultData != null"
    class="flex items-center justify-center"
  >
    <div
      class="rounded-xl border p-5 shadow-md w-9/12 bg-white"
    >
      <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="flex items-center space-x-3">
          <div class="text-lg font-bold text-slate-700">
            {{traineeResultData.episode_name}} Trainee Results
          </div>
        </div>
        <!-- <router-link to="/result/episodes" class="underline text-red-600">Go Back</router-link> -->
         <div>
          <router-link to="/result/episodes" class="cursor-pointer text-blue-500 hover:underline">Back to Episode result</router-link>
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
            Total Trainee - {{traineeResultData != null ? traineeResultData.results.length : 0 }}
          </button>
        </div>
      </div>

      <div class="mt-4 mb-6 flex flex-wrap justify-center items-center" v-if="traineeResultData.results.length > 0">
        <div class="m-3" v-for="r in traineeResultData.results" :key="r.id">
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
      <div class="flex justify-center mt-4 mb-4" v-else>
        No data found..
      </div>
    </div>
  </div>
  </Layout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import {useRoute} from 'vue-router'
import repository from "../../../../api/repository";
import Layout from "../../Admin/Layout.vue";
const route = useRoute()
const traineeResultData = ref(null);
// console.log(route.params.episode_id)
const getTraineesbyEpisode = () => {
  repository
    .getTrainees(route.params.episode_id)
    .then((res) => {
        console.log(res.data)
      traineeResultData.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
onMounted(() => {
  getTraineesbyEpisode();
});
</script>

<style>
</style>
