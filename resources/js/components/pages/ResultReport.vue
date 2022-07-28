<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-3/5 bg-white shadow-lg watermark">
      <div class="flex justify-center p-4 gap-2">
        <div class="p-2 flex border-r-2 border-indigo-200 gap-4">
          <div class="mb-4 w-20 h-20">
            <img
              src="/logos/first.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
          </div>
          <div class="mb-4 w-20 h-20">
            <img
              src="/logos/second.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
          </div>
        </div>
        <div>
          <h1 class="text-3xl font-extrabold text-indigo-500">
            Army Medical Corps Center & School
          </h1>
          <p class="text-base">
            Shaheed Salahuddin Cantonment, Ghatail, Tangail, Bangladesh
          </p>
        </div>
      </div>
      <div class="w-full h-0.5 bg-indigo-300"></div>
      <div class="flex flex-row justify-center gap-96 items-center m-4">
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
        <!-- <div class="w-40">
          <address class="text-sm">
            <span class="font-bold"> Exam Date : </span>
            12/12/2022
          </address>
        </div>
        <div class="w-40">
          <address class="text-sm">
            <span class="font-bold"> Trainee ID : </span>
            1542457
          </address>
        </div>
        <div class="w-40">
          <address class="text-sm">
            <span class="font-bold">Episode No :</span>
            1
          </address>
        </div> -->
        <div class="py-4">
          <table class="border border-gray-400">
            <tbody>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Marks</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{result.marks}}</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Correct Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{result.correct}}</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Wrong Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{result.wrong}}</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Total Questions</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{result.questions * 2 }}</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- <div class="flex justify-center gap-20 h-96">
        <div class="flex flex-col justify-center items-center">
          <div class="w-40">
            <address class="text-sm">
              <span class="font-bold"> Exam Date : </span>
              12/12/2022
            </address>
          </div>
          <div class="w-40">
            <address class="text-sm">
              <span class="font-bold"> Trainee ID : </span>
              1542457
            </address>
          </div>
          <div class="w-40">
            <address class="text-sm">
              <span class="font-bold">Episode No :</span>
              1
            </address>
          </div>
          <div></div>
        </div>
        <div class="flex justify-center p-2 rounded-lg">
          <table class="border border-gray-400">
            <tbody>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Marks</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">2</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Correct Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">4</div>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Wrong Answer</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">4</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> -->
      <div class="w-full h-0.5 bg-indigo-300"></div>

      <div class="p-4">
        <div class="flex items-center justify-center">Thank you.</div>
        <div class="flex items-end justify-end space-x-3">
          <button class="px-4 py-2 text-sm text-green-600 bg-green-100">
            Print
          </button>
           <router-link to="/" class="px-4 py-2 text-sm text-blue-600 bg-blue-100">
            Home
          </router-link>
          <!-- <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">
            Save
          </button>
          <button class="px-4 py-2 text-sm text-red-600 bg-red-100">
            Cancel
          </button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-6/12 mt-4 text-left bg-white shadow-lg">
      <div class="flex justify-between px-8 py-6">
        <div class="flex items-center">sale invoice</div>
        <div class="flex items-center gap-4">
          <button class="px-2 py-1 bg-gray-200 hover:bg-gray-400">Save</button>
          <button class="px-2 py-1 bg-gray-200 hover:bg-gray-400">Print</button>
        </div>
      </div>
      <div class="w-full h-0.5 bg-gray-800"></div>
    </div>
  </div> -->
</template>

<script setup>
defineProps({
  result: {
    type: Object,
    required: true,
  },
  episode:{
    type: [String, Number],
    default : ''
  },
  traineeId:{
    type: [String, Number],
    default : ''
  }
});
function hasOneDigit(val) {
  if (String(Math.abs(val)).charAt(0) == val) {
    return 0;
  } else {
    return;
  }
}
const dateFormate = () => {
  let date = new Date();
  return date.getDate() + "/" + hasOneDigit(date.getMonth()) + date.getMonth() + "/" + date.getFullYear();
};
const getResult = (data) => {
  let questions = 0, attempt = 0, marks = 0;
  questions = data.length * 2
  data.forEach(q => {
    if(q.selectedColorCode != null){
      attempt++
      if(q.selectedColorCode == q.correctColorCode){
        marks++
      }
    }
    if(q.selectedPriority != null){
      attempt++
      if(q.selectedPriority == q.correctPriority){
        marks++
      }
    }
  });
  return {
    questions: questions,
    attempt: attempt,
    marks: marks
  }
  console.log('TotalQuestion: '+questions+', Attempt: '+attempt+', Marks: '+marks)
}
</script>

<style scoped>
.watermark {
  background-image: url("/logos/watermark.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
</style>