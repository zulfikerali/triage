<template>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <h1 class="font-bold text-xl md:text-2xl text-center text-indigo-700 flex-none">
      Please enter & confirm your ID and then click on the ‘Start Exam’ button.
    </h1>
    <div class="flex flex-col justify-center items-center mt-6 gap-4 w-80">
      <div class="rounded-md w-full">
        <input type="text" v-model="traineeId" class="px-2 py-2 w-full border rounded-md rounded-md"
          placeholder="Enter Trainee ID" v-on:keyup.enter="goToQuestionPage" required />
      </div>
      <div class="rounded-md w-full">
        <input type="text" v-model="confirmTraineeId" class="px-2 py-2 w-full border rounded-md rounded-md"
          placeholder="Confirm Trainee ID" @focus="removeMessage" v-on:keyup.enter="goToQuestionPage" required />
        <span v-if="traineeIDcheck" class="text-red-500 text-sm"> Doesn’t match. Please enter the correct & same ID.
        </span>
      </div>
      <div class="">
        <button @click="goToQuestionPage" class="
              bg-indigo-600
              text-white
              px-3
              text-lg
              font-semibold
              py-1
              rounded-md
            ">
          Start Exam
        </button>
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
const confirmTraineeId = ref(null);
const traineeIDcheck = ref(false);
function hasOneDigit(val) {
  if (String(Math.abs(val)).charAt(0) == val) {
    return 0;
  } else {
    return;
  }
}
onMounted(() => {
  // console.log('query..', typeof route.query, 'episodeId' in route.query)
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
  if (traineeId.value != null && confirmTraineeId.value) {
    if (traineeId.value != confirmTraineeId.value) {
      traineeIDcheck.value = true
      return;
    }
    repository.traineeDoneExam(traineeId.value)
      .then((res) => {
        if (res.data.length > 0) {
          router.push({ path: `/game-episodes`, query: { traineeID: traineeId.value } });
        } else {
          if ('episodeId' in route.query) {
            router.push({ path: `/questions`, query: { traineeID: traineeId.value, episodeId: route.query.episodeId } });
          } else {
            router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
          }
        }

      })
      .catch((err) => {
        console.log(err)
      })
    // if ('episodeId' in route.query) {
    //   router.push({ path: `/questions`, query: { traineeID: traineeId.value, episodeId: route.query.episodeId } });
    // } else {
    //   router.push({ path: `/questions`, query: { traineeID: traineeId.value } });
    // }
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
const removeMessage = () => {
  traineeIDcheck.value = false
}
</script>
