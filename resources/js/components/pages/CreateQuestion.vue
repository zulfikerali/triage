<template>
  <!-- component -->
  <div class="text-center mt-5 mb-5">
    <h2 class="text-4xl tracking-tight">Create Question</h2>
  </div>
  <div class="flex justify-center my-2 mx-4 md:mx-0">
    <form
      class="w-full max-w-xl bg-white rounded-lg shadow-md p-6"
      @submit.prevent="submitForm"
      enctype="multipart/form-data"
    >
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-full px-3 mb-6">
          <label class="block text-sm font-medium text-gray-700">
            Video File
          </label>
          <div
            class="
              mt-1
              flex
              justify-center
              px-6
              pt-5
              pb-6
              border-2 border-gray-300 border-dashed
              rounded-md
            "
          >
            <div class="space-y-1 text-center">
              <div v-if="videosrc == null">
                <svg
                  class="mx-auto h-12 w-12 text-gray-400"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 48 48"
                  aria-hidden="true"
                >
                  <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>

              <div v-else class="mb-4">
                <video width="200" controls>
                  <source :src="videosrc" id="video_here" />
                  Your browser does not support HTML5 video.
                </video>
              </div>
              <div class="flex justify-center gap-4 text-sm text-gray-600">
                <label
                  for="file-upload"
                  class="
                    relative
                    cursor-pointer
                    bg-white
                    rounded-md
                    font-medium
                    text-indigo-600
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                  <span>Upload a file</span>
                  <input
                    id="file-upload"
                    name="file-upload"
                    type="file"
                    class="sr-only"
                    accept="video/mp4,video/x-m4v,video/*"
                    @change="onFileChange"
                  />
                </label>
                <label
                v-if="videosrc != null"
                @click="removeFile()"
                  class="
                    relative
                    cursor-pointer
                    bg-white
                    rounded-md
                    font-medium
                    text-red-600
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                  <span>Remove</span>
                </label>
                <!-- <p class="pl-1">or drag and drop</p> -->
              </div>
              <!-- <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p> -->
            </div>
          </div>
        </div>
        <div class="w-full md:w-full px-3 mb-6">
          <label for="episode" class="block text-sm font-medium text-gray-700"
            >Episode</label
          >
          <select
            id="episode"
            v-model="questionData.episode"
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
            <option value="" disabled>Select Episode</option>
            <option value="1">Episode 1</option>
            <option value="2">Episode 2</option>
            <option value="3">Episode 3</option>
            <option value="4">Episode 4</option>
            <option value="5">Episode 5</option>
            <option value="6">Episode 6</option>
          </select>
        </div>

        <div class="w-full flex items-center justify-between px-1 mb-3">
          <div class="w-full md:w-full px-3 mb-6">
            <!-- <label
              for="colorcode"
              class="block text-sm font-medium text-gray-700"
              >Color Code</label
            >
            <select
              id="colorcode"
              v-model="questionData.colorCode"
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
                sm:text-sm
              "
            >
              <option value="" disabled>Select Color Code</option>
              <option class="bg-red-500 text-white" value="1">Red</option>
              <option class="bg-yellow-500 text-white" value="2">Yellow</option>
              <option class="bg-green-500 text-white" value="3">Green</option>
              <option class="bg-gray-500 text-white" value="4">Black</option>
            </select> -->
            <label
              for="colorcode"
              class="block text-sm font-medium text-gray-700 mb-1"
              >Color Code</label
            >

            <div class="relative">
              <div
                class="
                  h-10
                  bg-white
                  flex
                  border border-gray-200
                  rounded
                  items-center
                "
              >
                <input
                  :value="selecItem"
                  name="select"
                  id="select"
                  class="px-4 appearance-none outline-none text-gray-800 w-full"
                  checked
                />

                <button
                  class="
                    cursor-pointer
                    outline-none
                    focus:outline-none
                    transition-all
                    text-gray-300
                    hover:text-gray-600
                  "
                ></button>
                <label
                  @click="openDropdown()"
                  for="show_more"
                  class="
                    cursor-pointer
                    outline-none
                    focus:outline-none
                    border-l border-gray-200
                    transition-all
                    text-gray-300
                    hover:text-gray-600
                  "
                >
                  <svg
                    class="w-4 h-4 mx-2 fill-current"
                    :class="dropdown ? 'rotate-0' : 'rotate-180'"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <polyline points="18 15 12 9 6 15"></polyline>
                  </svg>
                </label>
              </div>
              <div
                v-if="dropdown"
                class="
                  absolute
                  rounded
                  shadow
                  bg-white
                  overflow-hidden
                  peer-checked:flex
                  flex-col
                  w-full
                  mt-1
                  border border-gray-200
                "
              >
                <div
                  class="cursor-pointer group"
                  v-for="cc in colorCodes"
                  :key="cc.id"
                >
                  <a
                    @click.prevent="setColorCode(cc)"
                    class="
                      block
                      p-2
                      border-transparent border-l-4
                      group-hover:border-blue-300
                      text-white
                    "
                    :class="[
                      bgColor(cc.id),
                      questionData.colorCode == cc.id ? 'border-blue-300' : '',
                    ]"
                    >{{ cc.color_code_name }}</a
                  >
                </div>
                <!-- <div class="cursor-pointer group">
                  <a
                    class="
                      block
                      p-2
                      border-transparent border-l-4
                      bg-yellow-500
                      group-hover:border-blue-300 group-hover:bg-yellow-600
                      text-white
                    "
                    >Yellow</a
                  >
                </div>
                <div class="cursor-pointer group">
                  <a
                    class="
                      block
                      p-2
                      border-transparent border-l-4
                      bg-green-500
                      group-hover:border-blue-300 group-hover:bg-green-600
                      text-white
                    "
                    >Green</a
                  >
                </div>
                <div class="cursor-pointer group">
                  <a
                    class="
                      block
                      p-2
                      border-transparent border-l-4
                      bg-gray-800
                      group-hover:border-blue-300 group-hover:bg-gray-900
                      text-white
                    "
                    >Black</a
                  >
                </div> -->
              </div>
            </div>
          </div>
          <div class="w-full md:w-full px-1 mb-6">
            <label
              for="colorcodemarks"
              class="block text-sm font-medium text-gray-700 mb-1"
              >Color Code Marks</label
            >
            <input
              id="colorcodemarks"
              v-model="questionData.colorCodeMark"
              placeholder="Enter color code mark"
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
              type="number"
            />
          </div>
        </div>
        <div class="w-full flex items-center justify-between px-1 mb-3">
          <div class="w-full md:w-full px-3 mb-6">
            <label
              for="priority"
              class="block text-sm font-medium text-gray-700"
              >Priority</label
            >
            <select
              id="priority"
              v-model="questionData.priority"
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
              <option value="" disabled>Select Priority</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
            </select>
          </div>
          <div class="w-full md:w-full px-1 mb-6">
            <label
              for="prioritymarks"
              class="block text-sm font-medium text-gray-700 mb-1"
              >Priority Marks</label
            >
            <input
              id="prioritymarks"
              v-model="questionData.prioritMark"
              placeholder="Enter priority mark"
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
              type="number"
            />
          </div>
        </div>
        <div class="w-full md:w-full px-1 mb-6">
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
            Create Question
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
  file: null,
  episode: "",
  colorCode: "",
  colorCodeMark: null,
  priority: "",
  prioritMark: null,
});
const name = ref(null);
const dropdown = ref(false);
const selecItem = ref("Select Color Code");
const colorCodes = ref([]);
const videosrc = ref(null);
const onFileChange = (e) => {
  if (e.target.files[0]) {
    name.value = e.target.files[0].name;
    questionData.value.file = e.target.files[0];

    if (/^video/.test(e.target.files[0].type)) {
      // only video file
      var reader = new FileReader(); // instance of the FileReader
      reader.readAsDataURL(e.target.files[0]); // read the local file
      reader.onloadend = function () {
        // set video data as background of div
            videosrc.value = reader.result
        // var video = document.getElementById("video_here");
        // video.src = reader.result;
      };
    }
  } else {
    alert("file is empty!");
  }
};
const submitForm = () => {
  if (
    questionData.value.file == null &&
    questionData.value.episode == "" &&
    questionData.value.colorCode == "" &&
    questionData.value.colorCodeMark == null &&
    questionData.value.priority == "" &&
    questionData.value.prioritMark == null
  ) {
    alert("Please fill all field");
    return;
  }
  let formData = new FormData();
  formData.append("file", questionData.value.file);
  formData.append("episode", questionData.value.episode);
  formData.append("colorCode", questionData.value.colorCode);
  formData.append("colorCodeMark", questionData.value.colorCodeMark);
  formData.append("priority", questionData.value.priority);
  formData.append("prioritMark", questionData.value.prioritMark);
  repository
    .storeQuestion(formData)
    .then((res) => {
      questionData.value.file = null;
      questionData.value.episode = "";
      questionData.value.colorCode = "";
      questionData.value.colorCodeMark = null;
      questionData.value.priority = "";
      questionData.value.prioritMark = null;
      //   console.log(res.data);
    })
    .catch((err) => {
      console.log(err);
    });
};
const openDropdown = () => {
  dropdown.value = !dropdown.value;
};
const allColorCode = () => {
  repository
    .allColorCode()
    .then((res) => {
      colorCodes.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });
};
const bgColor = (id) => {
  if (id == 1) {
    return "bg-red-500 group-hover:bg-red-600";
  } else if (id == 2) {
    return "bg-yellow-500 group-hover:bg-yellow-600";
  } else if (id == 3) {
    return "bg-green-500 group-hover:bg-green-600";
  } else {
    return "bg-gray-800 group-hover:bg-gray-900";
  }
};
const setColorCode = (code) => {
  questionData.value.colorCode = code.id;
  selecItem.value = code.color_code_name;
  openDropdown();
};
const removeFile = () => {
    questionData.value.file = null
    videosrc.value = null
}
onMounted(() => {
  allColorCode();
});
</script>

<style>
</style>