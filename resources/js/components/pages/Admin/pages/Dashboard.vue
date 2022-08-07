<template>
  <Layout>
    <!-- component -->
    <div class="flex items-center justify-center">
      <div class="
          grid grid-cols-1
          gap-6
          sm:grid-cols-2
          md:grid-cols-2
          lg:grid-cols-3
          xl:grid-cols-3
        ">
        <!-- 1 card -->
        <div @click="goToPage('/episodes')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">

          <div class="mt-8">
            <p class="text-xl font-semibold my-2">Episodes</p>
            <div class="border-t-2"></div>

            <div class="flex justify-between">

            </div>
          </div>
        </div>
        <div @click="goToPage('/result/episodes')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">

          <div class="mt-8">
            <p class="text-xl font-semibold my-2">Results</p>
            <div class="border-t-2"></div>

            <div class="flex justify-between">

            </div>
          </div>
        </div>
        <div @click="goToPage('/create-question')" class="relative bg-white py-6 px-6 rounded-3xl w-80 my-4 shadow-xl cursor-pointer">
          <div class="mt-8">
            <p class="text-xl font-semibold my-2">Create Questions</p>
            <div class="border-t-2"></div>

            <div class="flex justify-between">

            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { useRouter } from "vue-router";
import repository from "../../../../api/repository";
import Layout from "../../Admin/Layout.vue";
const router = useRouter();
const logout = () => {
  console.log("click");
  repository
    .logout()
    .then((res) => {
      console.log(res.data);
      localStorage.removeItem("user");
      router.push("/");
    })
    .catch((err) => {
      console.log(err);
    });
};
const goToPage = (path) => {
  router.push({path: path, replace: true})
}
</script>

<style>
</style>