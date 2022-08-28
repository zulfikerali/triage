<template>
    <div class="container px-6 py-8 mx-auto lg:px-20">
        <h1 v-if="currentEpisodes" class="mb-10 text-3xl font-semibold text-center text-indigo-700 capitalize lg:text-4xl dark:text-white">
            {{  currentEpisodes.episode_name }} Questions
        </h1>

        <div class="flex flex-wrap justify-center">
            <div v-if="!!currentEpisodes">
            <div
                v-for="(question, index) in currentEpisodes.questions"
                :key="question.id"
                class="w-1/4 m-3 cursor-pointer border border-gray-400 rounded-lg hover:bg-green-500 hover:text-white"
                :class="{'bg-green-500 text-white' : index === current }"
            >
                <h1 class="text-center capitalize font-thin text-xl">Video {{ index + 1 }}</h1>
                <video
                    class="w-auto lg:rounded-lg p-1"
                >
                    <source :src="'/videos/' + question.video_path" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <div class="px-4 py-2 bg-blue-500 rounded-lg text-white cursor-pointer" @click.prevent="goToPage">
            Start Exam
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import repository from "../../api/repository";
const router = useRouter();
const episodes = ref([]);
const currentEpisodes = ref(null);
const current = ref(0);
onMounted(() => {
    repository
        .episodes()
        .then((res) => {
            episodes.value = res.data;
            console.log(res.data);
            setQuestions(res.data)
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
            setQuestions(res.data)
        })
        .catch((err) => {
            console.log(err);
        });
};
const setQuestions = (data) => {
    currentEpisodes.value = data.find(e => e.status === '1');
}
const alrearyActive = () => {
    alert("already active!");
};
const goToPage = () => {
    // router.push({ name: 'EpisodeQuestions')
    router.push('/start-game')
}
const commingSoon = () => {
    alert('Comming soon ..')
}
</script>
