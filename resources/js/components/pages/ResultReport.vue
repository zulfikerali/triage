<template>
  <div class="flex min-h-screen bg-gray-100">
    <div class="w-full bg-white watermark ">
      <div class="flex items-center justify-center p-4 gap-6">
        <div class="p-2 flex border-r-2 border-indigo-200 gap-4">
          <div class="mb-4 w-20 h-20">
            <img
              src="/logos/first.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
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
            <img
              src="/logos/second.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="w-full h-0.5 bg-indigo-300"></div>
      <div class="flex flex-row justify-center gap-52 items-center m-4">
        <table>
          <tbody>
            <tr>
              <td class="px-2 py-2 text-left">
                <div class="text-l">Trainee ID :</div>
              </td>
              <td class="px-2 py-2 text-right">
                <div class="text-sm text-gray-500">{{ traineeId }}</div>
              </td>
            </tr>
            <tr>
              <td class="px-2 py-2 text-left">
                <div class="text-l text-gray-900">Episode No :</div>
              </td>
              <td class="px-2 py-2 text-right">
                <div class="text-sm text-gray-500">{{ episode }}</div>
              </td>
            </tr>
            <tr>
              <td class="px-2 py-2 text-left">
                <div class="text-l text-gray-900">Exam Date :</div>
              </td>
              <td class="px-2 py-2 text-right">
                <div class="text-sm text-gray-500">
                  {{ dateFormate() }}
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="py-4">
          <table>
            <tbody>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Total Questions</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">
                    {{ result.questions * 2 }}
                  </div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">
                    Marks 
                    <span class="tinyTxt">(Color Code - {{result.ccm}}, Priority - {{result.pm}})</span>
                  </div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">
                    {{ result.marks }} 
                    <!-- out of {{ result.totalMarks }} -->
                  </div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Total Attempted</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{ result.attempt }}</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Correct Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{ result.correct }}</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Wrong Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{ result.wrong }}</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="w-full h-0.5 bg-indigo-300 printFooterLine2"></div>
      <div>
        <div class="w-full h-0.5 bg-indigo-300 printFooterLine hidden"></div>
        <div class="flex items-center justify-center printFooter">
          This is computer generated report.
        </div>
      </div>
       <div class="p-4">
        <div class="flex items-end justify-end space-x-3 noPrint">
          <button
            onclick="window.print()"
            class="px-4 py-2 text-sm text-green-600 bg-green-100"
          >
            Print
          </button>
          <!-- <button
            @click="backToResult"
            class="px-4 py-2 text-sm text-blue-600 bg-blue-100"
          >
            Back To Result Page
          </button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from "vue-router";
const route = useRoute();
const router = useRouter();
const props = defineProps({
  result: {
    type: Object,
    required: true,
  },
  episode: {
    type: [String, Number],
    default: "",
  },
  traineeId: {
    type: [String, Number],
    default: "",
  },
  examDate: {
    type: String,
    default: "",
  },
});
function hasOneDigit(val) {
  if (String(Math.abs(val)).charAt(0) == val) {
    return 0;
  } else {
    return;
  }
}
const dateFormate = () => {
  // console.log(props.examDate)
  let date;
  if (props.examDate) {
    // date = new Date();
    date = new Date(props.examDate);
  } else {
    date = new Date();
  }
  var dd = String(date.getDate()).padStart(2, "0");
  var mm = String(date.getMonth() + 1).padStart(2, "0"); //January is 0!
  var yyyy = date.getFullYear();
  return dd + "/" + mm + "/" + yyyy;
};
const backToResult = () => {
  router.push(`/result-report/${route.params.episodeId}`);
};
</script>

<style scoped>
.watermark {
  background-image: url("/logos/watermark.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
.tinyTxt{
  font-size: 12px;
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
  .noPrint {
    display: none;
  }
  .printFooter {
    position: absolute;
    bottom: 5%;
    left: 35%;
  }
  .tbl{
    width: 100%;
    background-color: brown;
  }
  .mainDiv{
    width: 100%;
    height: 100%;
  }
  .watermark {
  background-position: 85% 100%;
}
.printFooterLine{
   position: absolute;
    bottom: 10%;
    left: 0%;
    display: block;
}
.printFooterLine2{
  display: none
}
}
</style>
