<template>
  <div class="w-full bg-white h-[calc(100vh-65px)]">
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
    <div class="text-center pt-2 font-bold text-2xl">
      Exam Result
    </div>
    <!-- <hr> -->
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
        <table class="w-full border">
          <tbody>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r" colspan="2">
                Total Patient
              </td>
              <td class="p-2 border-r">
                {{ result.questions }}
              </td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r">Description</td>
              <td class="p-2 border-r">Color Code</td>
              <td class="p-2 border-r">Priority</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r">Attempted</td>
              <td class="p-2 border-r">{{ result.color_code_attempt }}</td>
              <td class="p-2 border-r">{{ result.priority_attempt }}</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r">Correct</td>
              <td class="p-2 border-r">{{ result.color_code_correct }}</td>
              <td class="p-2 border-r">{{ result.priority_correct }}</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r">Wrong</td>
              <td class="p-2 border-r">{{ result.color_code_wrong }}</td>
              <td class="p-2 border-r">{{ result.priority_wrong }}</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r">Marks</td>
              <td class="p-2 border-r">{{ result.ccm }}</td>
              <td class="p-2 border-r">{{ result.pm }}</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r" colspan="2">Total Attempted</td>
              <td class="p-2 border-r">{{ result.attempt }}</td>
            </tr>
            <tr class="text-center border-b text-sm text-gray-600">
              <td class="p-2 border-r" colspan="2">Total Marks</td>
              <td class="p-2 border-r">{{ result.marks }}</td>
            </tr>
          </tbody>
        </table>

        <!-- </table> -->
      </div>
    </div>
    <div class="w-full h-0.5 border border-indigo-300 printFooterLine2"></div>
    <!-- <hr class="printFooterLine2"> -->
    <div>
      <div class="w-full h-0.5 bg-indigo-300 printFooterLine hidden"></div>
      <div class="flex flex-col items-center justify-center printFooter text-sm">
        ???This document is computer generated and does not require the authorized signature or the
        Institution???s stamp in order to be considered valid???.
      </div>
      <div class="flex bg-white text-sm flex-col items-center justify-center printFooter2 hidden">
        Developed by: Darco Technologies Limited
      </div>
    </div>
    <div class="p-4">
      <div class="flex items-center justify-center space-x-3 noPrint">
        <button @click="printResult" class="px-4 py-2 text-sm text-green-600 bg-green-100">
          Print
        </button>
        <button @click="backToResult" class="px-4 py-2 text-sm text-blue-600 bg-blue-100">
          Back
        </button>
      </div>
    </div>
  </div>
  <div id="printDiv" class="hidden print:block">
    <div class="w-full bg-white h-[calc(100vh-65px)] page relative px-4">
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
      <div class="text-center pt-2 font-bold text-2xl">
        Exam Result
      </div>
      <div class="flex justify-around mt-10">
        <div class="py-4">
          <table>
            <tbody>
              <tr>
                <td class="px-2 py-2 text-left">
                  <div class="text-l">Trainee ID :</div>
                </td>
                <td class="px-2 py-2 text-center">
                  <div class="text-sm text-gray-500"> {{ traineeId }} </div>
                </td>
              </tr>
              <tr>
                <td class="px-2 py-2 text-left">
                  <div class="text-l text-gray-900">Episode No :</div>
                </td>
                <td class="px-2 py-2 text-center">
                  <div class="text-sm text-gray-500"> {{ episode }} </div>
                </td>
              </tr>
              <tr>
                <td class="px-2 py-2 text-left">
                  <div class="text-l text-gray-900">Exam Date :</div>
                </td>
                <td class="px-2 py-2 text-center">
                  <div class="text-sm text-gray-500">
                    {{ dateFormate() }}
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
                  {{ result.questions }}
                </td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">Description</td>
                <td class="p-2 border-r">Color Code</td>
                <td class="p-2 border-r">Priority</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">Attempted</td>
                <td class="p-2 border-r">{{ result.color_code_attempt }}</td>
                <td class="p-2 border-r">{{ result.priority_attempt }}</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">Correct</td>
                <td class="p-2 border-r">{{ result.color_code_correct }}</td>
                <td class="p-2 border-r">{{ result.priority_correct }}</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">Wrong</td>
                <td class="p-2 border-r">{{ result.color_code_wrong }}</td>
                <td class="p-2 border-r">{{ result.priority_wrong }}</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">Marks</td>
                <td class="p-2 border-r">{{ result.ccm }}</td>
                <td class="p-2 border-r">{{ result.pm }}</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r" colspan="2">Total Attempted</td>
                <td class="p-2 border-r">{{ result.attempt }}</td>
              </tr>
              <tr class="text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r" colspan="2">Total Marks</td>
                <td class="p-2 border-r">{{ result.marks }}</td>
              </tr>
            </tbody>
          </table>

          <!-- </table> -->
        </div>
      </div>
      <div class="text-sm absolute left-0 bottom-2 w-full text-center bf">
        <div class="py-2 px-4 text-center">
          ???This document is computer generated and does not require the authorized signature or the
          Institution???s stamp in order to be considered valid???.
        </div>
        <div class="py-2 border-t border-indigo-300">Developed by: Darco Technologies Limited</div>
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
const printResult = () => {
  const printContents = document.getElementById('printDiv').innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  location.reload()
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
  const epId = props.episode == '' ? route.params.episodeId : parseInt(props.episode)
  console.log(epId)
  router.push(`/result-report/${epId}`);
};
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
