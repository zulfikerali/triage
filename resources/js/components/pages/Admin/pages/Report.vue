<template>
<Layout>
<div v-if="resultValue != null">
    <ResultReportVue :result="resultValue.result_data" :episode="resultValue.episode_id" :traineeId='resultValue.trainee_id' :examDate='resultValue.created_at'/>
</div>
</Layout>
</template>
<script setup>
    import { ref, onMounted } from 'vue'
    import ResultReportVue from './ResultReport.vue';
    import { useRoute } from 'vue-router'
    import repository from '../../../../api/repository';
    import Layout from "../../Admin/Layout.vue";
    const route = useRoute()
    const resultValue = ref(null)
    const resultData = () => {
        repository.getResult(route.params.episodeId, route.params.traineeId)
        .then((res) => {
            resultValue.value = res.data
            // console.log(res.data)
        })
        .catch((err) => {
            console.log(err)
        })
    }
    onMounted(() => {
        resultData()
    })
</script>

<style scoped>

</style>