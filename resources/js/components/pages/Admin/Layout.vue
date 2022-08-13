<template>
   <div class="min-h-[calc(100vh-65px)] bg-gray-50">
      <nav class="bg-white border-b border-gray-200 fixed z-30 w-full noPrint">
         <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
               <div class="flex items-center justify-start">
                  <button id="toggleSidebarMobile" @click="open = !open" aria-expanded="true" aria-controls="sidebar"
                     class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                     <svg id="toggleSidebarMobileHamburger" v-if="!open" class="w-6 h-6" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                           clip-rule="evenodd"></path>
                     </svg>
                     <svg id="toggleSidebarMobileClose" v-else class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                           clip-rule="evenodd"></path>
                     </svg>
                  </button>
                  <div href="#" class="text-xl font-bold flex items-center lg:ml-2.5 w-8 mr-1">
                     <img src="/logos/first.jpeg" class="h-8 mr-2" alt="Logo">
                  </div>
               </div>
               <div>
                  <span class="self-center text-sm lg:text-2xl">ARMY MEDICAL CORPS CENTRE AND SCHOOL</span>
               </div>
               <div>
                  <img src="/logos/second.jpeg" class="h-8 w-8 mr-2" alt="Logo" />
               </div>
            </div>
         </div>
      </nav>
      <div class="flex overflow-hidden bg-white pt-16">
         <aside id="sidebar" :class="open ? '' : 'hidden' "
            class="fixed z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
            aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
               <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                  <div class="flex-1 px-3 bg-white divide-y space-y-1">
                     <ul class="space-y-2 pb-2">
<!--                        <li>-->
<!--                           <router-link to="/dashboard" href="#"-->
<!--                              class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">-->
<!--                              <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"-->
<!--                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
<!--                                 &lt;!&ndash;! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. &ndash;&gt;-->
<!--                                 <path-->
<!--                                    d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 64C238.3 64 224 78.33 224 96C224 113.7 238.3 128 256 128C273.7 128 288 113.7 288 96C288 78.33 273.7 64 256 64zM256 416C291.3 416 320 387.3 320 352C320 334.6 313.1 318.9 301.9 307.4L365.1 161.7C371.3 149.5 365.8 135.4 353.7 130C341.5 124.7 327.4 130.2 322 142.3L257.9 288C257.3 288 256.6 287.1 256 287.1C220.7 287.1 192 316.7 192 352C192 387.3 220.7 416 256 416V416zM144 112C126.3 112 112 126.3 112 144C112 161.7 126.3 176 144 176C161.7 176 176 161.7 176 144C176 126.3 161.7 112 144 112zM96 288C113.7 288 128 273.7 128 256C128 238.3 113.7 224 96 224C78.33 224 64 238.3 64 256C64 273.7 78.33 288 96 288zM416 224C398.3 224 384 238.3 384 256C384 273.7 398.3 288 416 288C433.7 288 448 273.7 448 256C448 238.3 433.7 224 416 224z" />-->
<!--                              </svg>-->
<!--                              <span class="ml-3">Dashboard</span>-->
<!--                           </router-link>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                           <router-link to="/episodes"-->
<!--                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">-->
<!--                              <svg-->
<!--                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"-->
<!--                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
<!--                                 &lt;!&ndash;! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. &ndash;&gt;-->
<!--                                 <path-->
<!--                                    d="M384 32C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384zM384 96H256V224H384V96zM384 288H256V416H384V288zM192 224V96H64V224H192zM64 416H192V288H64V416z" />-->
<!--                              </svg>-->
<!--                              <span class="ml-3 flex-1 whitespace-nowrap">Episodes</span>-->
<!--                           </router-link>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                           <router-link to="/create-question"-->
<!--                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">-->
<!--                              <svg-->
<!--                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"-->
<!--                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">-->
<!--                                 &lt;!&ndash;! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. &ndash;&gt;-->
<!--                                 <path-->
<!--                                    d="M282.5 64H320C355.3 64 384 92.65 384 128V448C384 483.3 355.3 512 320 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H101.5C114.6 26.71 150.2 0 192 0C233.8 0 269.4 26.71 282.5 64zM192 128C209.7 128 224 113.7 224 96C224 78.33 209.7 64 192 64C174.3 64 160 78.33 160 96C160 113.7 174.3 128 192 128zM105.4 230.5C100.9 243 107.5 256.7 119.1 261.2C132.5 265.6 146.2 259.1 150.6 246.6L151.1 245.3C152.2 242.1 155.2 240 158.6 240H216.9C225.2 240 232 246.8 232 255.1C232 260.6 229.1 265.6 224.4 268.3L180.1 293.7C172.6 298 168 305.9 168 314.5V328C168 341.3 178.7 352 192 352C205.1 352 215.8 341.5 215.1 328.4L248.3 309.9C267.9 298.7 280 277.8 280 255.1C280 220.3 251.7 192 216.9 192H158.6C134.9 192 113.8 206.9 105.8 229.3L105.4 230.5zM192 384C174.3 384 160 398.3 160 416C160 433.7 174.3 448 192 448C209.7 448 224 433.7 224 416C224 398.3 209.7 384 192 384z" />-->
<!--                              </svg>-->
<!--                              <span class="ml-3 flex-1 whitespace-nowrap">Create Questions</span>-->
<!--                           </router-link>-->
<!--                        </li>-->
                        <!-- <li>
                           <router-link to="/question-list"
                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                              <svg
                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                 <path
                                    d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z" />
                              </svg>
                              <span class="ml-3 flex-1 whitespace-nowrap">Question List</span>
                           </router-link>
                        </li> -->
<!--                        <li>-->
<!--                           <router-link to="/result/episodes"-->
<!--                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">-->
<!--                              <svg-->
<!--                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"-->
<!--                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">-->
<!--                                 &lt;!&ndash;! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. &ndash;&gt;-->
<!--                                 <path-->
<!--                                    d="M623.1 136.9l-282.7-101.2c-13.73-4.91-28.7-4.91-42.43 0L16.05 136.9C6.438 140.4 0 149.6 0 160s6.438 19.65 16.05 23.09L76.07 204.6c-11.89 15.8-20.26 34.16-24.55 53.95C40.05 263.4 32 274.8 32 288c0 9.953 4.814 18.49 11.94 24.36l-24.83 149C17.48 471.1 25 480 34.89 480H93.11c9.887 0 17.41-8.879 15.78-18.63l-24.83-149C91.19 306.5 96 297.1 96 288c0-10.29-5.174-19.03-12.72-24.89c4.252-17.76 12.88-33.82 24.94-47.03l190.6 68.23c13.73 4.91 28.7 4.91 42.43 0l282.7-101.2C633.6 179.6 640 170.4 640 160S633.6 140.4 623.1 136.9zM351.1 314.4C341.7 318.1 330.9 320 320 320c-10.92 0-21.69-1.867-32-5.555L142.8 262.5L128 405.3C128 446.6 213.1 480 320 480c105.1 0 192-33.4 192-74.67l-14.78-142.9L351.1 314.4z" />-->
<!--                              </svg>-->
<!--                              <span class="ml-3 flex-1 whitespace-nowrap">Results</span>-->
<!--                           </router-link>-->
<!--                        </li>-->
                        <li>
                           <router-link to="/profile"
                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                              <svg
                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                 <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                 <path
                                    d="M512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM176 128c35.35 0 64 28.65 64 64s-28.65 64-64 64s-64-28.65-64-64S140.7 128 176 128zM272 384h-192C71.16 384 64 376.8 64 368C64 323.8 99.82 288 144 288h64c44.18 0 80 35.82 80 80C288 376.8 280.8 384 272 384zM496 320h-128C359.2 320 352 312.8 352 304S359.2 288 368 288h128C504.8 288 512 295.2 512 304S504.8 320 496 320zM496 256h-128C359.2 256 352 248.8 352 240S359.2 224 368 224h128C504.8 224 512 231.2 512 240S504.8 256 496 256zM496 192h-128C359.2 192 352 184.8 352 176S359.2 160 368 160h128C504.8 160 512 167.2 512 176S504.8 192 496 192z" />
                              </svg>
                              <span class="ml-3 flex-1 whitespace-nowrap">Profile</span>
                           </router-link>
                        </li>
                        <li>
                           <a href="#" @click="logout"
                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                              <svg
                                 class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                 <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                 <path
                                    d="M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z" />
                              </svg>
                              <span class="ml-3 flex-1 whitespace-nowrap">Log Out</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </aside>
         <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
         <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
               <div class="pt-6 px-4 nopm ">
                  <slot></slot>
               </div>
            </main>
         </div>
      </div>
   </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { useRouter } from "vue-router";
import repository from "../../../api/repository.js";
const router = useRouter()
const open = ref(false)
const logout = () => {
   repository.logout()
      .then((res) => {
        localStorage.removeItem('user');
         router.push('/')
      })
      .catch((err) => {
         console.log(err)
         localStorage.removeItem('user');
         router.push('/')
      })
}
</script>
<style scoped>
@media print {
    .noPrint{
        display: none;
    }
    .nopm{
        padding: 0;
        margin: 0;
    }
}
</style>
