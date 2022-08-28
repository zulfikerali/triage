<template>
  <div class="" v-if="examStatus == 'loading'">
    <h1 class="font-bold text-3xl text-center text-indigo-700 flex-none mt-5">
      Loading...
    </h1>
  </div>
  <div class="" v-if="examStatus == 'initial'">
    <h1 class="font-bold text-3xl text-center text-indigo-700 flex-none mt-5">
      Triage Episodes for Exam
    </h1>
    <p class="font-bold text-xl text-center text-gray-700 flex-none mt-5">
      Please choose episode number and click the start button to start your exam.
      <br />
      You have to answer within the given time.
    </p>
  </div>
  <div class="" v-if="examStatus == 'attempted'">
    <h1 class="font-bold text-3xl text-center text-green-700 flex-none mt-5">
      THANK YOU!
    </h1>
    <p class="font-bold text-xl text-center text-gray-700 flex-none mt-5">
      You have completed exam on {{ episodeData != null ? episodeData.episode_name : '' }}.
      <br />
      Please choose next episode.
    </p>
    <p class="text-center text-gray-400">
      You don’t need to enter your ID again.
    </p>
  </div>
  <div class="" v-if="examStatus == 'notattempted'">
    <h1 class="font-bold text-3xl text-center text-red-500 flex-none mt-5">
      SORRY!
    </h1>
    <p class="font-bold text-xl text-center text-gray-700 flex-none mt-5">
      Your time is over.
      <br />
      Please choose next episode.
    </p>
  </div>
  <div class="" v-if="examStatus == 'completed'">
    <h1 class="font-bold text-3xl text-center text-green-600 flex-none mt-5">
      THANK YOU!
      <br />
      YOUR EXAM IS COMPLETED.
    </h1>
  </div>


  <!-- <p class="text-center text-2xl pt-2">
    If you want to change episode to click
    <span class="border bg-blue-100 rounded-lg px-1 py-1 text-center ring-2 mr-1"
      >Active
    </span>
    button.
  </p> -->
  <div class="flex justify-center items-center mt-24">
    <div class="
        grid grid-cols-1
        gap-6
        sm:grid-cols-2
        md:grid-cols-2
        lg:grid-cols-2
        xl:grid-cols-2
      ">
      <div v-for="(episode) in episodes" :key="episode.id" class="
          pt-1
          px-2
          rounded-xl
          shadow-lg
          w-52
        "
        :class="episode.results.length > 0 ? (episode.results[0].is_attempt > 0 ? 'bg-green-500' : 'bg-red-500') : 'bg-blue-600 bg-gradient-to-b from-blue-400 to-blue-500'">
        <div class="flex justify-center">
          <div class="flex items-center justify-center">
            <span class="relative inline-flex">
              <button :disabled="episode.results.length > 0 ? (episode.results[0].is_attempt > 0 ? true : true) : false"
                @click.prevent="episode.published == 1 ? activeEpisode(episode.id) : commingSoon()" class="
                  flex
                  justify-center
                  text-white
                  py-2
                  mt-1
                  rounded-lg
                  shadow-l
                  w-32
                  cursor-pointer
                  ring-2 ring-white
                ">
                {{ episode.results.length > 0 ? (episode.results[0].is_attempt > 0 ? 'Completed' : 'Time Over') :
                    'Start'
                }}
              </button>
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
  <div class="mt-4 text-center" v-if="examStatus == 'completed'">
    <span class="w-full">Please click the exit button and contact with Chief Instructor for the Result.</span>
    <div class="mt-4">
      <router-link to="/" class="text-white bg-blue-600 hover:bg-blue-800 font-thin rounded-lg px-5 py-2 mr-2 mb-2">
        Exit
      </router-link>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted, inject } from "vue";
import { useRoute, useRouter } from "vue-router";
import repository from "../../api/repository";
const swal = inject('$swal')
const router = useRouter();
const route = useRoute();
const episodes = ref([]);
const episodeData = ref(null)
const examStatus = ref('')
// console.log('full Path', router.currentRoute.value.path)
onMounted(() => {
  console.log('route.query.traineeID', 'traineeID' in route.query, 'completedepisode' in route.query)
  if ('traineeID' in route.query && 'completedepisode' in route.query) {
    examStatus.value = 'loading'
    getAllEpisode(route.query.traineeID)
  }
  else if ('traineeID' in route.query) {
    examStatus.value = 'initial'
    getAllEpisode(route.query.traineeID)
    // if('completedepisode' in route.query){
    //     completedEpisode(route.query.completedepisode)
    // }
  } else {
    examStatus.value = 'initial'
    getAllEpisode()
  }

});
// const completedEpisode = (id) => {
//   console.log('completed...',episodes.value.length > 0)
//     if(episodes.value.length > 0) {
//      const edata = episodes.value.find(e => e.id == id)
//      console.log(edata)
//      return edata
//     }
// }
const getAllEpisode = (tid) => {
  repository
    .episodes(tid)
    .then((res) => {
      episodes.value = res.data;

      var count = 0
      res.data.forEach(r => {
        if (r.results.length > 0) {
          count += 1;
        }
      }
      )
      if (res.data.length == count) {
        examStatus.value = 'completed'
        return
      }
      if ('completedepisode' in route.query) {
        console.log('completedepisode..', res.data.length)
        const ed = episodes.value.find(e => e.id == route.query.completedepisode)
        console.log('ed...', ed)
        episodeData.value = ed
        if (ed.results.length > 0) {
          console.log('attempt or not')
          if (ed.results[0].is_attempt > 0) {
            console.log('attempt ')
            examStatus.value = 'attempted'
          } else {
            console.log('attempt not')
            examStatus.value = 'notattempted'
          }
        }
      }

      // console.log('ed......', ed)
      // res.data.map()
      // console.log(res.data);
    })
    .catch((err) => {
      console.log(err.message);
    });
}
const activeEpisode = (id) => {
  if ('traineeID' in route.query) {
    // console.log(' route.query.traineeID', route.query.traineeID)
    router.push({ path: `/questions`, query: { traineeID: route.query.traineeID, episodeId: id } });
    return
  }
  router.push({ path: '/start-game', query: { episodeId: id } })
  // repository
  //   .selectActiveEpisode({ id: id })
  //   .then((res) => {
  //     console.log(res.data);
  //     episodes.value = res.data;
  //   })
  //   .catch((err) => {
  //     console.log(err);
  //   });
};
const alrearyActive = () => {
  alert("already active!");
};
const goToPage = (game) => {
  // router.push('/admin/episodes/questions')
  router.push(game)
  // router.push('/start-game')
}
const commingSoon = () => {
  swal.fire({
    icon: 'warning',
    title: 'Coming soon',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  })
}
</script>
