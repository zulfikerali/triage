<template>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <h1 class="font-bold text-xl md:text-4xl text-center text-indigo-700 flex-none">
      Enter Your ID then click start button to start your exam.
    </h1>
    <div class="flex justify-center items-center mt-6">
      <div class="mt-4">
        <div class="flex rounded-md overflow-hidden w-80">
          <input type="text" v-model="traineeId" class="px-2 w-2/3 border rounded-md rounded-r-none"
            placeholder="Enter Trainee ID" v-on:keyup.enter="goToQuestionPage" required />
          <button @click="goToQuestionPage" class="
              bg-indigo-600
              text-white
              px-3
              text-lg
              font-semibold
              py-2
              rounded-r-md
            ">
            Start Test
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted, inject } from "vue";
import { useRouter, useRoute } from "vue-router";
import repository from "../../api/repository";
const swal = inject('$swal')
const router = useRouter();
const route = useRoute();
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
  console.log('query..', typeof route.query, 'episodeId' in route.query)
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
    if ('episodeId' in route.query) {
      router.push({ path: `/questions`, query: { traineeID: traineeId.value, episodeId: route.query.episodeId } });
    } else {
      router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
    }
    // repository.examDone(traineeId.value)
    //   .then((res) => {
    // if (res.data == 1) {
    //   swal.fire({
    //     icon: 'warning',
    //     title: 'Already exam done',
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //       toast.addEventListener('mouseenter', swal.stopTimer)
    //       toast.addEventListener('mouseleave', swal.resumeTimer)
    //     }
    //   })
    //   return
    // } else {
    //   router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
    // }
    //   router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
    // })
    // .catch((err) => {
    //   console.log(err)
    // })
  } else {
    swal.fire({
      icon: 'warning',
      title: 'Field must be required',
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
    return
  }
};
</script>
