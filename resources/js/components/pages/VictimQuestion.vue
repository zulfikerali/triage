<template>
  <!-- component -->
  <div class="text-center mt-5 mb-5">
    <h2 class="text-4xl tracking-tight">Create Conversation</h2>
  </div>
  <div class="flex justify-center my-2 mx-4 md:mx-0">
    <form
      class="w-full max-w-xl bg-white rounded-lg shadow-md p-6"
      @submit.prevent="submitForm"
      enctype="multipart/form-data"
    >
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-full px-3 mb-6">
          <label for="episode" class="block text-sm font-medium text-gray-700"
            >Episode</label
          >
          <select
            @change="changeEpisode($event)"
            id="episode"
            class="
              mt-1
              block
              w-full
              py-2
              px-3
              border border-gray-300
              bg-white
              rounded-md
              shadow-sm
              focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
            "
          >
            <option value="" disabled selected>Select Episode</option>
            <option
              v-show="allEposode.length > 0"
              v-for="ep in allEposode"
              :key="ep.id"
              :value="ep.id"
            >
              {{ ep.episode_name }}
            </option>
          </select>
        </div>
        <div class="w-full md:w-full px-3 mb-6">
          <label for="episode" class="block text-sm font-medium text-gray-700"
            >Question</label
          >
          <select
            v-model="questionData.question"
            class="
              mt-1
              block
              w-full
              py-2
              px-3
              border border-gray-300
              bg-white
              rounded-md
              shadow-sm
              focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
            "
          >
            <option v-show="allQues.length > 0" value="" disabled>
              Select Question
            </option>
            <option
              v-show="allQues.length > 0"
              v-for="(q, i) in allQues"
              :key="q.id"
              :value="q.id"
            >
              Question {{ i + 1 }}
            </option>
            <option v-show="allQues.length == 0" value="" disabled>
              No Question
            </option>
          </select>
        </div>
        <div class="w-full md:w-full px-3 mb-6">
          <label
            for="colorcodemarks"
            class="block text-sm font-medium text-gray-700 mb-1"
            >First Responder Question</label
          >
          <input
            id="colorcodemarks"
            v-model="questionData.paramedicQues"
            placeholder="Type asking question"
            class="
              appearance-none
              block
              w-full
              bg-white
              text-gray-900
              font-medium
              border border-gray-400
              rounded-lg
              py-2
              px-3
              leading-tight
              focus:outline-none
            "
            type="text"
          />
        </div>
        <div class="w-full md:w-full px-3 mb-6">
          <label
            for="colorcodemarks"
            class="block text-sm font-medium text-gray-700 mb-1"
            >Victim Response/Answer</label
          >
          <input
            id="colorcodemarks"
            v-model="questionData.victimQues"
            placeholder="Type victim answer"
            class="
              appearance-none
              block
              w-full
              bg-white
              text-gray-900
              font-medium
              border border-gray-400
              rounded-lg
              py-2
              px-3
              leading-tight
              focus:outline-none
            "
            type="text"
          />
        </div>
        <div class="w-full md:w-full px-3 mb-6">
          <button
            type="submit"
            class="
              block
              w-full
              bg-blue-600
              text-gray-100
              font-bold
              border border-gray-200
              rounded-lg
              py-3
              px-3
              hover:bg-blue-500
            "
          >
            Create Conversation
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import repository from "../../api/repository";
const questionData = ref({
  episode: "",
  question: "",
  paramedicQues: null,
  victimQues: null,
});
const allEposode = ref([]);
const allQues = ref([]);
const episodes = () => {
  repository
    .episodes()
    .then((res) => {
      allEposode.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
const changeEpisode = (e) => {
  repository
    .getQuestionsByEpisode(e.target.value)
    .then((res) => {
      allQues.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
const submitForm = () => {
  if (
    questionData.value.episode == "" &&
    questionData.value.question == "" &&
    questionData.value.paramedicQues == null &&
    questionData.value.victimQues == null
  ) {
    alert("Please fill all field");
    return;
  }
  repository
    .storeVictimQuestion({ questionData: questionData.value })
    .then((res) => {
      console.log(res.data);
      questionData.value.episode = "";
      questionData.value.question = "";
      questionData.value.paramedicQues = null;
      questionData.value.victimQues = null;
    })
    .catch((err) => {
      console.log(err);
    });
};

onMounted(() => {
  episodes();
});
</script>

<style>
</style>