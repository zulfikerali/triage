<!-- <template>
  <div
    class="flex items-center justify-center bg-gray-100 h-[calc(100vh-60px)]"
  >
    <div
      class="
        px-8
        py-6
        mx-4
        mt-4
        text-left
        bg-white
        shadow-lg
        md:w-1/3
        lg:w-1/3
        sm:w-1/3
      "
    >
      <div class="flex justify-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-20 h-20 text-blue-600"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path d="M12 14l9-5-9-5-9 5 9 5z" />
          <path
            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
          />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
          />
        </svg>
      </div>
      <h3 class="text-2xl font-bold text-center">Join us</h3>
      <form action="">
        <div class="mt-4">
          <div>
            <label class="block" for="Name">Name</label>
            <input
              type="text"
              placeholder="Name"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div class="mt-4">
            <label class="block" for="email">Email</label>
            <input
              type="text"
              placeholder="Email"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div class="mt-4">
            <label class="block">Password</label>
            <input
              type="password"
              placeholder="Password"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div class="mt-4">
            <label class="block">Confirm Password</label>
            <input
              type="password"
              placeholder="Password"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <span class="text-xs text-red-400">Password must be same!</span>
          <div class="flex">
            <button
              class="
                w-full
                px-6
                py-2
                mt-4
                text-white
                bg-blue-600
                rounded-lg
                hover:bg-blue-900
              "
            >
              Create Account
            </button>
          </div>
          <div class="mt-6 text-grey-dark">
            Already have an account?
            <a class="text-blue-600 hover:underline" href="#"> Log in </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
const user = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
</script> -->
<template>
  <div class="max-w-screen-md mx-auto text-gray-900">
    <div class="flex justify-center">
      <div class="flex-1">
        <div class="border w-auto">
          <div class="border p-4 font-semibold">Register</div>

          <div class="p-4 bg-white">
            <!-- <errors v-if="errors" :content="errors" @close="errors = null" /> -->

            <form
              @submit.prevent="register"
              class="md:w-10/12 md:p-4 w-full mx-auto"
            >
              <div
                class="
                  w-full
                  my-1
                  py-2
                  sm:flex sm:items-center sm:justify-between
                "
              >
                <label for="Name" class="w-4/12"> Name </label>
                <input
                  type="text"
                  name="name"
                  v-model="user.name"
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
                <label for="Email" class="w-4/12"> Email </label>
                <input
                  type="email"
                  name="email"
                  v-model="user.email"
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
                  name="password"
                  v-model="user.password"
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
                <label for="Password confirm" class="w-4/12">
                  Confirm Password
                </label>
                <input
                  type="password"
                  name="password_confirmation"
                  v-model="user.password_confirmation"
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
                      flex
                      justify-center
                      items-center
                      p-2
                      px-6
                      rounded-sm
                      text-white
                      bg-blue-500
                      hover:bg-blue-600
                    "
                  >
                    Register
                  </button>

                  <!-- <router-link
                    :to="{ name: 'login' }"
                    class="text-sm text-blue-500 hover:underline"
                  >
                    Already a member ? Sing In !
                  </router-link> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import repository from "../../api/repository.js";
import { useRouter } from 'vue-router'
const router = useRouter()
const user = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
const register = () => {
  try {
    repository
      .registration(user.value)
      .then((res) => {
        console.log(res.data);
        router.push({name: 'Login'})
      })
      .catch((err) => {
        console.log(err);
      });
  } catch (error) {
    console.log(error);
  }
};
</script>
