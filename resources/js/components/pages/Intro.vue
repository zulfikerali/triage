<template>
  <div class="
      bg-blue-100
      h-[calc(100vh-60px)]
      items-center
      p-5
      lg:p-20
      overflow-hidden
      relative
    ">
    <div class="flex justify-center mb-4">
      <!-- <div class="text-blue-600 mb-4">
        <span class="cursor-pointer text-blue-800 border border-blue-500 px-3 py-2 rounded-lg" @click="goToPage">Start
          Test</span>
      </div> -->
      <a @click="goToPage"
        class="flex bg-blue-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-600 mr-6 cursor-pointer">
        Start
        <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 w-6 stroke-current text-white stroke-2"
          viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"></line>
          <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
      </a>
    </div>
    <div class="absolute top-0 right-0 z-20 p-4 noPrint">
      <span v-if="isAuthenticated">
        <router-link to="/dashboard" class="py-2 px-2 border border-blue-800 rounded-lg mr-2">Dashboard
        </router-link>
        <button @click="logout" class="py-2 px-2 border border-red-500 rounded-lg">Logout</button>
      </span>
      <span v-if="!isAuthenticated">
        <router-link to="/login" class="py-2 px-2 border border-gray-800 rounded-lg">Log In
        </router-link>
      </span>
    </div>
    <!-- <div class="absolute top-0 right-100 z-20 p-4 noPrint">
      <div class="container flex items-center mx-auto text-blue-600 capitalize dark:text-gray-300 gap-4">
        <span class="cursor-pointer text-blue-800 border border-blue-500 px-3 py-2 rounded-lg" @click="goToPage">Start Test</span>
      </div>
    </div> -->
    <transition name="slide-fade">
      <div v-show="slide == 1" class="
            flex
            min-h-full min-w-full
            rounded-3xl
            bg-white
            shadow-xl
            p-10
            lg:p-20
            text-gray-800
            relative
            md:flex
            items-center
            text-center
            watermark
          ">
        <div class="w-full md:w-1/2">
          <div class="
                mb-10
                md:mb-20
                text-gray-600
                font-light
                flex
                justify-center
                gap-4
              ">
            <div class="w-36">
              <img src="/logos/first.jpeg" class="max-w-full h-auto rounded-full" alt="" />
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2">
          <div class="mb-10 md:mb-10 text-gray-600">
            <h1 class="
                  font-black
                  uppercase
                  text-2xl
                  lg:text-2xl
                  text-yellow-500
                  font-thin
                  mb-10
                ">
              ARMY MEDICAL CORPS CENTRE AND SCHOOL
            </h1>
            <p class="text-bold">SHAHEED SALAHUDDIN CANTONMENT</p>
            <p>GHATAIL, TANGAIL, BANGLADESH</p>
          </div>
        </div>
        <div class="w-full md:w-1/2">
          <div class="
                mb-10
                md:mb-20
                text-gray-600
                font-light
                flex
                justify-center
                gap-4
              ">
            <div class="w-36 mt-2">
              <img src="/logos/second.jpeg" class="max-w-full h-auto rounded-full" alt="" />
            </div>
          </div>
        </div>
      </div>
    </transition>
    <transition name="slide">
      <div v-show="slide != 1" class="
        min-h-full min-w-full
        rounded-3xl
        bg-white
        shadow-xl
        p-10
        lg:p-20
        text-gray-800
        relative
        watermark
      ">
        <div class="flex md:flex items-center text-center">
          <div class="w-full md:w-1/2">
            <div class="mb-10 md:mb-20 text-gray-600 font-light">
              <h1 class="font-black uppercase text-3xl text-yellow-500 mb-10">
                PLANNED BY:
              </h1>
              <p class="text-lg">
                LT COL (DR) SHAIKH MOHAMMAD MAMUNUR RASHID
              </p>
              <p>MBBS, MD, MPH, FCGP, AMC</p>
              <p>
                CHIEF INSTRUCTOR
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="mb-10 md:mb-20 text-gray-600 font-light">
              <h1 class="font-black uppercase text-3xl text-yellow-500 mb-10">
                GUIDED BY:
              </h1>
              <p class="text-lg">
                BRIGADIER GENERAL (DR) MD IQBAL HASAN
              </p>
              <p>
                MBBS, BGBM, M Phil, MPH, MDM, M MEd,
              </p>
              <p>
                COMMANDANT & PAPA HEALERS
              </p>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <div class="
        w-64
        md:w-96
        h-96
        md:h-full
        bg-blue-200 bg-opacity-30
        absolute
        -top-64
        md:-top-96
        right-20
        md:right-32
        rounded-full
        pointer-events-none
        -rotate-45
        transform
      "></div>
    <div class="
        w-96
        h-full
        bg-yellow-200 bg-opacity-20
        absolute
        -bottom-96
        right-64
        rounded-full
        pointer-events-none
        -rotate-45
        transform
      "></div>

  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import repository from "../../api/repository";
const router = useRouter();
const slide = ref(1);
const isAuthenticated = ref(null)
onMounted(() => {
  isAuthenticated.value = localStorage.getItem('user') != null
  setInterval(() => {
    slide.value = 2;
  }, 3000);
});
const goToPage = () => {
  router.push("/start-game");
};
const logout = () => {
  repository.logout()
    .then((res) => {
      localStorage.removeItem('user');
      isAuthenticated.value = localStorage.getItem('user') != null
      // isAuthenticated = false
      // router.push('/')
    })
    .catch((err) => {
      console.log(err)
    })
}
</script>
<style scoped>
.slide-enter-to {
  right: 0%;
}

.slide-enter-from {
  right: -100%;
}

.slide-enter-active {
  transition: all 0.5s ease;
}

.watermark {
  background-image: url('/logos/watermark.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
</style>
