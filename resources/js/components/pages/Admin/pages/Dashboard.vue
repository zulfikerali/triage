<template>
  <Layout>
    <!-- component -->
<!--    <div class="flex items-center justify-center">-->
<!--      <div class="-->
<!--          grid grid-cols-1-->
<!--          gap-6-->
<!--          sm:grid-cols-2-->
<!--          md:grid-cols-2-->
<!--          lg:grid-cols-3-->
<!--          xl:grid-cols-3-->
<!--        ">-->
<!--        &lt;!&ndash; 1 card &ndash;&gt;-->
<!--        <div @click="goToPage('/episodes')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">-->

<!--          <div class="mt-8">-->
<!--            <p class="text-xl font-semibold my-2">Episodes</p>-->
<!--            <div class="border-t-2"></div>-->

<!--            <div class="flex justify-between">-->

<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div @click="goToPage('/result/episodes')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">-->

<!--          <div class="mt-8">-->
<!--            <p class="text-xl font-semibold my-2">Results</p>-->
<!--            <div class="border-t-2"></div>-->

<!--            <div class="flex justify-between">-->

<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div @click="goToPage('/create-question')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">-->
<!--          <div class="mt-8">-->
<!--            <p class="text-xl font-semibold my-2">Create Questions</p>-->
<!--            <div class="border-t-2"></div>-->

<!--            <div class="flex justify-between">-->

<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
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
        bg-blue-600 bg-gradient-to-b from-blue-500 to-blue-700
          pt-1
          px-2
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
                  px-1
                  py-3
                  rounded-lg
                  w-32
                  cursor-pointer
                  ring-2 ring-white
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
                          <!-- <span v-if="episode.status == 1">(<span class="text-sm">{{episode.status == 1 ? 'current':''}}</span>)</span> -->
                      </p>
                      <!-- <div class="flex justify-between mt-2">
                                <p class="text-gray-200">{{episode.questions_count}} Victims</p>
                                <p class="text-white" >10 marks</p>
                        </div> -->
                  </div>
              </div>
          </div>
      </div>
  </Layout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import repository from "../../../../api/repository.js";
import Layout from "../../Admin/Layout.vue";
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
// import { useRouter } from "vue-router";
// import repository from "../../../../api/repository";
// import Layout from "../../Admin/Layout.vue";
// const router = useRouter();
// const logout = () => {
//   console.log("click");
//   repository
//     .logout()
//     .then((res) => {
//       console.log(res.data);
//       localStorage.removeItem("user");
//       router.push("/");
//     })
//     .catch((err) => {
//       console.log(err);
//     });
// };
// const goToPage = (path) => {
//   router.push({path: path, replace: true})
// }
</script>

<style>
</style>
