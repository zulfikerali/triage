<template>
  <div
    class="
      bg-blue-100
      flex
      h-[calc(100vh-60px)]
      items-center
      p-5
      lg:p-20
      overflow-hidden
      relative
    "
  >
    <transition name="slide-fade">
        <div
          v-show="slide == 1"
          class="
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
          "
        >
        <div class="w-full md:w-1/2">
            <div
              class="
                mb-10
                md:mb-20
                text-gray-600
                font-light
                flex
                justify-center
                gap-4
              "
            >
              <div class="w-36">
                <img
                  src="/logos/first.jpeg"
                  class="max-w-full h-auto rounded-full"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="mb-10 md:mb-10 text-gray-600">
              <h1
                class="
                  font-black
                  uppercase
                  text-2xl
                  lg:text-2xl
                  text-yellow-500
                  font-thin
                  mb-10
                "
              >
                ARMY MEDICAL CORPS CENTRE AND SCHOOL
              </h1>
              <p class="text-bold">SHAHEED SALAHUDDIN CANTONMENT</p>
              <p>GHATAIL, TANGAIL, BANGLADESH</p>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div
              class="
                mb-10
                md:mb-20
                text-gray-600
                font-light
                flex
                justify-center
                gap-4
              "
            >
              <div class="w-36 mt-2">
                <img
                  src="/logos/second.jpeg"
                  class="max-w-full h-auto rounded-full"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
    </transition>
    <transition name="slide">
        <div
      v-show="slide !=1"
      class="
        min-h-full min-w-full
        rounded-3xl
        bg-white
        shadow-xl
        p-10
        lg:p-20
        text-gray-800
        relative
        watermark
      "
    >
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
      <div class="container flex items-center justify-end mx-auto text-gray-600 capitalize dark:text-gray-300 gap-4">
            <span class="cursor-pointer text-blue-800 border px-3 py-2 rounded-lg" @click="goToPage">Go to Episode page</span>
        </div>
    </div>
    </transition>
    <div
      class="
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
      "
    ></div>
    <div
      class="
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
      "
    ></div>

  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
const slide = ref(1);
onMounted(() => {
  setInterval(() => {
    slide.value = 2;
  }, 4000);
});
const goToPage = () => {
  router.push("/admin/episodes");
};
</script>
<style scoped>
.slide-enter-to {  right: 0%;}
.slide-enter-from {
    right: -100%;
}
.slide-enter-active {
    transition: all 0.5s ease;
}
.watermark{
    background-image: url('/logos/watermark.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
</style>
