<template>
  <!-- component -->
  <div
    class="
      min-w-screen min-h-screen
      bg-blue-100
      flex
      items-center
      p-5
      lg:p-20
      overflow-hidden
      relative
    "
  >
  <Transition name="slide-fade">
  <div
      v-if="slide == 1"
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
      "
    >
      <div class="w-full md:w-1/2">
        <div class="mb-10 md:mb-20 text-gray-600 font-light">
          <h1
            class="
              font-black
              uppercase
              text-3xl
              lg:text-3xl
              text-yellow-500
              mb-10
            "
          >
            ARMY MEDICAL CORPS CENTRE AND SCHOOL
          </h1>
          <p>SHAHEED SALAHUDDIN CANTONMENT, GHATAIL, TANGAIL, BANGLADESH</p>
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
          <div class="w-36">
            <img
              src="http://triage.test/logos/first.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
          </div>
          <div class="w-36">
            <img
              src="http://triage.test/logos/second.jpeg"
              class="max-w-full h-auto rounded-full"
              alt=""
            />
          </div>
        </div>
      </div>
    </div>
    <div
      v-else
      class="
        min-h-full min-w-full
        rounded-3xl
        bg-white
        shadow-xl
        p-10
        lg:p-20
        text-gray-800
        relative
      "
    >
      <div class="flex md:flex items-center text-center">
        <div class="w-full md:w-1/2">
          <div class="mb-10 md:mb-20 text-gray-600 font-light">
            <h1 class="font-black uppercase text-3xl text-yellow-500 mb-10">
              PLANNED BY:
            </h1>
            <p class="text-lg">
              LT COL SHAIKH MOHAMMAD MAMUNUR RASHID, MPH, FCGP, AMC CHIEF
              INSTRUCTOR
            </p>
          </div>
        </div>
        <div class="w-full md:w-1/2">
          <div class="mb-10 md:mb-20 text-gray-600 font-light">
            <h1 class="font-black uppercase text-3xl text-yellow-500 mb-10">
              GUIDED BY:
            </h1>
            <p class="text-lg">
              BRIGADIER GENERAL MD IQBAL HASAN, BGBM, M Phil, MPH, MDM, M MEd.
              COMMANDANT & PAPA HEALERS
            </p>
          </div>
        </div>
      </div>
      <span class="flex items-end justify-end cursor-pointer text-blue-800" @click="goToPage">Go to Episode page →</span>
    </div>
</Transition>
    
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

  <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
  <!-- <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
    <div>
        <a title="Buy me a beer" href="https://www.buymeacoffee.com/scottwindon" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg"/>
        </a>
    </div>
</div> -->
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
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
</style>