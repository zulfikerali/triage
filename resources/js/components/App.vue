<template>
<div class="watermark">
  <div class="absolute top-0 left-0 z-20 p-4 noPrint">
     <div class="relative inline-block">
            <!-- Dropdown toggle button -->
            <button @click="toggle" class="relative z-10 block p-2 text-gray-700 bg-white border border-blue rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none">
              <svg v-if="toggleMenu" class="w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
              <svg v-else  class="w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.<path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
            </button>
            <!-- Dropdown menu -->
            <div v-show="toggleMenu" class="absolute left-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800">
            <span class="block cursor-pointer px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" @click.prevent="navigation('/')"> Home </span>
            <span class="block cursor-pointer px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" @click.prevent="navigation('/admin/episodes')"> Episodes </span>
            <span class="block cursor-pointer px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" @click.prevent="navigation('/result/episodes')"> Episode Result </span>
            <span class="block cursor-pointer px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" @click.prevent="navigation('/create-question')"> Create Question </span>
            <span class="block cursor-pointer px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" @click.prevent="navigation('/create-victim-question')"> Create Conversation </span>
            </div>
        </div>
  </div>
  <router-view></router-view>
</div>
</template>
<script setup>
  import { ref } from 'vue'
  import {useRouter} from 'vue-router'
  const router = useRouter()
  const navigation = (path) => {
    toggle()
    router.push(path)
  }
  const toggleMenu = ref(false)
  const toggle = () => {
    toggleMenu.value = !toggleMenu.value
  }

</script>

<style scoped>
.watermark{
    background-image: url('/logos/watermark.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
@media print {
  .noPrint{
    display: none;
  }
}
</style>
