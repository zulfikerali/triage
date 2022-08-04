<template>
  <h1 class="font-bold text-4xl text-center text-indigo-700 flex-none mt-5">
    Triage Episodes
  </h1>
  <p class="text-center text-2xl pt-2">
    If you want to change episode to click
    <span class="border bg-blue-100 rounded-lg px-1 py-1 text-center ring-2 mr-1"
      >Active
    </span>
    button.
  </p>
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
        v-for="(episode, index) in episodes"
        :key="episode.id"
        class="
          
          pt-1
          px-2
          
          rounded-xl
          shadow-lg
          w-52
        "
        :class="[episode.status == 1?'bg-red-500':'bg-blue-600 bg-gradient-to-b from-blue-400 to-blue-500']"
      >
        <div class="flex justify-center">
          <div class="flex items-center justify-center">
            <span class="relative inline-flex">
              <div
                @click.prevent="index > 0 ? commingSoon() : activeEpisode(episode.id)"
                class="
                  flex
                  justify-center
                  text-white
                  py-2
                  mt-1
                  rounded-lg
                  shadow-l
                  w-32
                  cursor-pointer
                "
                :class="
                  episode.status == 1
                    ? 'ring-2 ring-white cursor-pointer'
                    : 'ring-2 ring-gray-200'
                "
                :disabled="episode.status == 1 ? true : false"
              >
                {{ episode.status == 1 ? "Current" : "Active" }}
              </div>
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
    <div class="px-4 py-2 bg-blue-500 rounded-lg text-white cursor-pointer" @click.prevent="goToPage">
      Click to show
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import repository from "../../api/repository";
const router = useRouter();
const episodes = ref([]);
console.log('full Path',router.currentRoute.value.path)
onMounted(() => {
  repository
    .episodes()
    .then((res) => {
      episodes.value = res.data;
      // console.log(res.data);
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
