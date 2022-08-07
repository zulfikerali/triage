<template>
  <Layout>
    <h1 class="font-bold text-4xl text-center text-indigo-700 flex-none mt-5">
      Triage Episodes
    </h1>
    <p class="text-center text-2xl pt-2">
      If you want to change episode to click
      <span class="border bg-blue-100 rounded-lg px-1 py-1 text-center ring-2 mr-1">Active
      </span>
      button.
    </p>
    <div class="flex flex-col justify-center items-center mt-6">
      <div class="mt-2 flex gap-4 text-white text-sm font-bold font-mono leading-6 bg-stripes-violet rounded-lg"
        v-for="(episode, index) in episodes" :key="episode.id">
        <div class="p-4 flex-none w-14 h-14 rounded-lg flex items-center justify-center"
          :class="episode.status == 1 ? 'bg-red-500' : 'bg-blue-300'">{{ index + 1 }}</div>
        <div class="p-4 flex-auto w-64 rounded-lg flex items-center justify-center shadow-lg"
          :class="episode.status == 1 ? 'bg-red-500' : 'bg-blue-500'">{{ episode.episode_name }}</div>
        <div class="p-4 flex-auto w-32 rounded-lg flex items-center justify-center shadow-lg cursor-pointer"
          :class="episode.status == 1 ? 'bg-red-500' : 'bg-blue-500'"
          @click.prevent="index > 0 ? commingSoon() : activeEpisode(episode.id)">{{ episode.status == 1 ? 'Current' :
              'Active'
          }}</div>
      </div>
    </div>

  </Layout>
</template>
<script setup>
import { ref, onMounted, inject } from "vue";
import { useRouter } from "vue-router";
import Layout from "../../Admin/Layout.vue";
import repository from "../../../../api/repository.js";
const swal = inject('$swal')
const router = useRouter();
const episodes = ref([]);
const Toast = () => {
  swal.fire({
    icon: 'warning',
    title: 'Coming soon',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  })
}

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
  // alert("already active!");
};
const goToPage = (game) => {
  // router.push('/admin/episodes/questions')
  router.push(game)
  // router.push('/start-game')
}
const commingSoon = () => {
  Toast()
  // swal.fire({
  // html: 'Coming soon',
  // timer: 2000,
  // timerProgressBar: true,
  // showConfirmButton: false
  // })
  // alert('Coming soon ..')
}
</script>
