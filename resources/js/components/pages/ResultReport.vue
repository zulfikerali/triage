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
          <table class="border border-gray-400">
            <tbody>
              <tr class="whitespace-nowrap">
                <td class="px-2 py-2">
                  <div class="text-sm text-gray-900">Marks</div>
                </td>
                <td class="px-2 py-2 text-right">
                  <div class="text-sm text-gray-500">{{ result.marks }}</div>
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
            </tbody>
          </table>
        </div>
      </div>
     <div class="w-full h-0.5 bg-indigo-300"></div>

      <div class="p-4">
        <div class="flex items-center justify-center">Thank you.</div>
        <div class="flex items-end justify-end space-x-3">
          <button
            onclick="window.print()"
            class="px-4 py-2 text-sm text-green-600 bg-green-100"
          >
            Print
          </button>
          <router-link
            to="/start-game"
            class="px-4 py-2 text-sm text-blue-600 bg-blue-100"
          >
            Home
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
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
</script>

<style scoped>
.watermark {
  background-image: url("/logos/watermark.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
</style>