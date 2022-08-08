<template>
  <!-- <div class="max-w-screen-md mx-auto text-gray-900">
    <div class="flex justify-center">
      <div class="flex-1">
        <div class="border w-auto">
          <div class="border p-4 font-semibold">Log In</div>

          <div class="p-4 bg-white">
            <form
              class="md:w-10/12 md:p-4 w-full mx-auto"
              @submit.prevent="login"
            >
              <div
                class="
                  w-full
                  my-1
                  py-2
                  sm:flex sm:items-center sm:justify-between
                "
              >
                <label for="Email" class="w-4/12"> Email </label>
                <input
                  type="email"
                  v-model="user.email"
                  name="email"
                  class="
                    border border-gray-300
                    bg-white
                    sm:w-8/12
                    w-full
                    p-2
                    mt-3
                    sm:mt-0
                    focus:outline-none
                    rounded-sm
                  "
                />
              </div>
              <div
                class="
                  w-full
                  my-1
                  py-2
                  sm:flex sm:items-center sm:justify-between
                "
              >
                <label for="Password" class="w-4/12"> Password </label>
                <input
                  type="password"
                  v-model="user.password"
                  name="password"
                  class="
                    border border-gray-300
                    bg-white
                    sm:w-8/12
                    w-full
                    p-2
                    mt-3
                    sm:mt-0
                    focus:outline-none
                    rounded-sm
                  "
                />
              </div>
              <div
                class="w-full my-1 py-2 sm:flex sm:items-center sm:justify-end"
              >
                <div
                  class="
                    sm:w-8/12
                    w-full
                    flex
                    justify-between
                    items-center
                    mt-3
                    sm:mt-0
                  "
                >
                  <button
                    type="submit"
                    class="
                      p-3
                      rounded-sm
                      text-white
                      bg-blue-500
                      hover:bg-blue-600
                    "
                  >
                    Log In
                  </button>
                  <router-link
                    :to="{ name: 'register' }"
                    class="text-sm text-blue-500 hover:underline"
                  >
                    New member ? Sing Up !
                  </router-link>
                </div>
              </div>
              <div class="w-full my-1 sm:flex sm:justify-end">
                <router-link
                  :to="{ name: 'forgot-password' }"
                  class="
                    text-sm text-gray-500
                    hover:text-gray-800 hover:underline
                  "
                >
                  Fogot your password ?
                </router-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="flex items-center justify-center h-[calc(100vh-60px)] bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg rounded-lg w-96">
      <div class="flex justify-between">
        <img src="/logos/first.jpeg" class="w-12 h-12" />
        <img src="/logos/second.jpeg" class="w-12 h-12" />
      </div>
      <h3 class="text-2xl font-bold text-center">Login to your account</h3>
      <form @submit.prevent="login">
        <div class="mt-4">
          <div>
            <label class="block" for="email">Email</label>
            <input type="email" v-model="user.email" placeholder="Email"
              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
            <!-- <span class="text-xs tracking-wide text-red-600">Email field is required </span> -->
          </div>
          <div class="mt-4">
            <label class="block">Password</label>
            <input type="password" v-model="user.password" placeholder="Password"
              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
          </div>
          <div class="flex items-baseline justify-between">
            <router-link to="/" class="px-6 py-2 mt-4 text-black border border-2 border-blue-500 rounded-lg hover:border-blue-900">Home</router-link>
            <button type="submit" class="px-6 py-2 mt-4 border border-2 border-teal-400 rounded-lg hover:border-teal-800">Login</button>
            <!-- <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a> -->
          </div>
        </div>
      </form>
    </div>
  </div>
</template>


<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import repository from "../../api/repository.js";
const router = useRouter();
const user = ref({
  email: "",
  password: "",
});

const login = () => {
  try {
    repository
      .login(user.value)
      .then((res) => {
        localStorage.setItem("user", JSON.stringify(res.data));
        router.push({ name: "Dashboard" });
      })
      .catch((err) => {
        console.log(err);
      });
  } catch (e) {
    this.errors = e.data;
  }
};
</script>
