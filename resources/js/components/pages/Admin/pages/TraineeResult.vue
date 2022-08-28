<template>
    <Layout>
        <div v-if="traineeResultData != null" class="flex items-center justify-center mb-10">
            <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                <div class="flex w-full items-center justify-between border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <div class="text-lg font-bold text-slate-700">
                            {{ traineeResultData.episode_name }} Trainee Results
                        </div>
                    </div>
                    <!-- <router-link to="/result/episodes" class="underline text-red-600">Go Back</router-link> -->
                    <div>
                        <router-link to="/dashboard" class="cursor-pointer text-blue-500 hover:underline">Back to
                             result page</router-link>
                    </div>
                    <div class="flex items-center space-x-8" v-if="traineeResultData.results.length > 1">
                        <button @click="printAll"
                            class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold ">
                            Print All
                        </button>
                        <button class="
              rounded-2xl
              border
              bg-neutral-100
              px-3
              py-1
              text-xs
              font-semibold
            ">
                            Total Trainee - {{ traineeResultData != null ? traineeResultData.results.length : 0 }}
                        </button>
                    </div>
                </div>

                <div class="mt-4 mb-6 flex flex-wrap justify-center items-center"
                    v-if="traineeResultData.results.length > 0">
                    <div class="m-3" v-for="r in traineeResultData.results" :key="r.id">
                        <router-link :to="`/result-report/${r.episode_id}/${r.trainee_id}`" class="
              relative
              bg-green-400
              text-white
              p-3
              rounded-lg
              text-sm
              uppercase
              font-semibold
              tracking-tight
              overflow-visible
            ">
                            {{ r.trainee_id }}
                        </router-link>
                    </div>
                </div>
                <div class="flex justify-center mt-4 mb-4" v-else>
                    No data found..
                </div>
            </div>
        </div>
    </Layout>
    <div id="printDiv" v-if="traineeResultData != null" class="hidden print:block">
        <div v-for="result in traineeResultData.results" :key="result.id"
            class="w-full bg-white h-[calc(100vh-65px)] page relative">
            <div class="flex items-center justify-center p-4 gap-6">
                <div class="p-2 flex border-r-2 border-indigo-200 gap-4">
                    <div class="mb-4 w-20 h-20">
                        <img src="/logos/first.jpeg" class="max-w-full h-auto rounded-full" alt="" />
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-indigo-500">
                        Army Medical Corps Center & School
                    </h1>
                    <p class="text-base">
                        Shaheed Salahuddin Cantonment, Ghatail, Tangail, Bangladesh
                    </p>
                </div>
                <div class="p-2 flex border-l-2 border-indigo-200 gap-4">
                    <div class="mt-2 w-20 h-20">
                        <img src="/logos/second.jpeg" class="max-w-full h-auto rounded-full" alt="" />
                    </div>
                </div>
            </div>
            <div class="w-full h-0.5 border border-indigo-300"></div>
            <div class="flex justify-around mt-10">
                <div class="py-4">
                    <table>
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-left">
                                    <div class="text-l">Trainee ID :</div>
                                </td>
                                <td class="px-2 py-2 text-center">
                                    <div class="text-sm text-gray-500"> {{ result.trainee_id }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-left">
                                    <div class="text-l text-gray-900">Episode No :</div>
                                </td>
                                <td class="px-2 py-2 text-center">
                                    <div class="text-sm text-gray-500"> {{ result.episode_id }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-left">
                                    <div class="text-l text-gray-900">Exam Date :</div>
                                </td>
                                <td class="px-2 py-2 text-center">
                                    <div class="text-sm text-gray-500">
                                        {{ dateFormate(result.created_at) }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="py-4">
                    <table class="w-full border">
                        <tbody>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r" colspan="2">
                                    Total Patient
                                </td>
                                <td class="p-2 border-r">
                                    {{ result.result_data.questions }}
                                </td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">Description</td>
                                <td class="p-2 border-r">Color Code</td>
                                <td class="p-2 border-r">Priority</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">Attempted</td>
                                <td class="p-2 border-r">{{ result.result_data.color_code_attempt }}</td>
                                <td class="p-2 border-r">{{ result.result_data.priority_attempt }}</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">Correct</td>
                                <td class="p-2 border-r">{{ result.result_data.color_code_correct }}</td>
                                <td class="p-2 border-r">{{ result.result_data.priority_correct }}</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">Wrong</td>
                                <td class="p-2 border-r">{{ result.result_data.color_code_wrong }}</td>
                                <td class="p-2 border-r">{{ result.result_data.priority_wrong }}</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">Marks</td>
                                <td class="p-2 border-r">{{ result.result_data.ccm }}</td>
                                <td class="p-2 border-r">{{ result.result_data.pm }}</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r" colspan="2">Total Attempted</td>
                                <td class="p-2 border-r">{{ result.result_data.attempt }}</td>
                            </tr>
                            <tr class="text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r" colspan="2">Total Marks</td>
                                <td class="p-2 border-r">{{ result.result_data.marks }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- </table> -->
                </div>
            </div>
            <div class="text-sm absolute bottom-2 w-full text-center bf">
                <div class="py-2">This is computer generated report.</div>
                <div class="py-2 border-t border-indigo-300">Developed by: Darco Technologies Limited</div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from 'vue-router'
import repository from "../../../../api/repository";
import Layout from "../../Admin/Layout.vue";
const route = useRoute()
const traineeResultData = ref(null);
// console.log(route.params.episode_id)
const getTraineesbyEpisode = () => {
    repository
        .getTrainees(route.params.episode_id)
        .then((res) => {
            console.log(res.data)
            traineeResultData.value = res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};

const printAll = () => {
    const printContents = document.getElementById('printDiv').innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    location.reload()
}
const dateFormate = (examDate) => {
    let date;
    if (examDate) {
        date = new Date(examDate);
    } else {
        date = new Date();
    }
    const dd = String(date.getDate()).padStart(2, "0");
    const mm = String(date.getMonth() + 1).padStart(2, "0"); //January is 0!
    const yyyy = date.getFullYear();
    return dd + "/" + mm + "/" + yyyy;
};

onMounted(() => {
    getTraineesbyEpisode();
});
</script>

<style scoped>
@-moz-document url-prefix() {
    .bf {
        bottom: -100px;
    }
}

@page {
    size: A4;
    margin: 0;
    background: #fff;
}

@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }

}
</style>
