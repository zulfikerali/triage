<template>
  <!-- component -->
  <h1 class="font-bold text-4xl text-center text-indigo-700 flex-none mt-5">
    Enter Your ID then click start button to start your test.
  </h1>
  <div class="flex justify-center items-center mt-6">
    <div
      class="
        grid grid-cols-1
        gap-6
        sm:grid-cols-2
        md:grid-cols-2
        lg:grid-cols-2
        xl:grid-cols-2
      "
    >
      <div
        v-for="episode in episodes"
        :key="episode.id"
        class="
          bg-blue-600
          pt-1
          px-2
          bg-gradient-to-b
          from-blue-400
          to-blue-500
          rounded-xl
          shadow-lg
          w-52
        "
      >
        <div class="flex justify-center">
          <div
            @click="goToQuestionPage(episode.id)"
            class="
              flex
              justify-center
              text-white
              cursor-pointer
              p-4
              bg-blue-400
              ring-2 ring-blue-300
              rounded-lg
              shadow-xl
              w-32
            "
          >
            Start
          </div>
        </div>
        <div class="p-4">
          <p class="text-white font-semibold text-center">
            {{ episode.episode_name }}
          </p>
          <!-- <div class="flex justify-between mt-2">
                    <p class="text-gray-200">20,100 Files</p>
                    <p class="text-white" >6.5GB</p>
                </div> -->
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
const episodes = ref([]);
onMounted(() => {
  repository
    .episodes()
    .then((res) => {
      episodes.value = res.data;
      console.log(res.data);
    })
    .catch((err) => {
      console.log(err.message);
    });
});
const goToQuestionPage = (id) => {
  router.push({ path: `/questions/${id}`, params: { id: id } });
};
</script>

<style scoped>
</style>