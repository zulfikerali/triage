<template>
  <h1 class="font-bold text-4xl text-center text-indigo-700 flex-none mt-5">
    Triage Episodes Result
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
          bg-cyan-600
          pt-1
          px-2
          bg-gradient-to-b
          from-cyan-400
          to-cyan-500
          rounded-xl
          shadow-lg
          w-52
        "
      >
        <div class="flex justify-center">
          <div class="flex items-center justify-center">
            <span class="relative inline-flex">
              <router-link
                :to="`/result-report/${episode.id}`"
                class="
                  flex
                  justify-center
                  text-white
                  p-4
                  bg-cyan-400
                  rounded-lg
                  shadow-l
                  w-32
                  cursor-pointer
                  ring-2 ring-cyan-300
                "
              >
                Results
              </router-link>
              <!-- <span
                v-show="episode.status == 1"
                class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1"
              >
                <span
                  class="
                    animate-ping
                    absolute
                    inline-flex
                    h-full
                    w-full
                    rounded-full
                    bg-red-400
                    opacity-75
                  "
                ></span>
                <span
                  class="relative inline-flex rounded-full h-3 w-3 bg-red-400"
                ></span>
              </span> -->
            </span>
          </div>
        </div>
        <div class="p-4">
          <p class="text-white font-semibold text-center">
            {{ episode.episode_name }}
          </p>
          <!-- <div class="flex justify-between mt-2">
                    <p class="text-gray-200">{{episode.questions_count}} Victims</p>
                    <p class="text-white" >10 marks</p>
            </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="flex justify-center mt-4">
    <router-link to="/" class="px-4 py-2 text-red-500 underline cursor-pointer">
      Go Back
    </router-link>
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
const activeEpisode = (id) => {
  repository
    .selectActiveEpisode({ id: id })
    .then((res) => {
      console.log(res.data);
      episodes.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
const alrearyActive = () => {
  alert("already active!");
};
const goToPage = () => {
  // router.push('/admin/episodes/questions')
  router.push('/game')
  // router.push('/start-game')
}
const commingSoon = () => {
  alert('Comming soon ..')
}
</script>
