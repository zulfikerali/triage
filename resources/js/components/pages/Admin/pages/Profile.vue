<template>
  <Layout>
    <div class="mx-auto my-12 w-full max-w-lg">
      <h1 class="text-3xl font-medium">Profile<span class="text-sm ml-1">({{ profile.userData.email }})</span></h1>
      <p class="mt-3">Change your email and password</p>
      <form class="mt-5" @submit.prevent="updateUser">
        <div class="grid gap-6 sm:grid-cols-1">
          <div class="relative z-0">
            <input v-model="profile.userData.email" type="email"
              class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
              placeholder=" " />
            <label
              class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
              Email</label>
          </div>
          <div class="relative z-0">
            <input v-model="profile.userData.password" type="password"
              class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
              placeholder=" " required />
            <label
              class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">New
              Password
            </label>
          </div>
          <div class="relative z-0">
            <input @keyup="matchPassword" v-model="profile.userData.confirmPassword" type="password"
              class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
              placeholder=" " required />
            <label
              class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Confirm
              Password
            </label>
            <span v-if="profile.passContainer">
              <span v-if="profile.isMatched" class="text-xs tracking-wide text-green-600">Password matched </span>
              <span v-else class="text-xs text-red-600">Password not matched </span>
            </span>
          </div>
        </div>
        <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white">Update</button>
      </form>
    </div>
    <!-- <div class="flex items-center justify-start bg-white h-[calc(100vh-60px)]">
      <div class="mx-auto w-full max-w-lg">
        <h1 class="text-4xl font-medium">Contact us</h1>
        <p class="mt-3">Email us at help@domain.com or message us here:</p>
        <form action="https://api.web3forms.com/submit" class="mt-10">
          <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE" />
          <div class="grid gap-6 sm:grid-cols-2">
            <div class="relative z-0">
              <input type="text" name="name"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                placeholder=" " />
              <label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                name</label>
            </div>
            <div class="relative z-0">
              <input type="text" name="email"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                placeholder=" " />
              <label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                email</label>
            </div>
            <div class="relative z-0 col-span-2">
              <textarea name="message" rows="5"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                placeholder=" "></textarea>
              <label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                message</label>
            </div>
          </div>
          <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white">Send Message</button>
        </form>
      </div>
    </div> -->
  </Layout>
</template>

<script setup>
import Layout from "../../Admin/Layout.vue";
import { useRouter } from "vue-router";
import { reactive } from 'vue'
import repository from "../../../../api/repository";
const router = useRouter()
const profile = reactive({
  isMatched: false,
  passContainer: false,
  userData: JSON.parse(localStorage.getItem('user')).user
})
const updateUser = () => {
  repository.updateProfile(profile.userData)
    .then((res) => {
      localStorage.setItem('user', JSON.stringify(res.data))
      router.push({ path: '/dashboard' })
    })
    .catch((err) => {
      console.log(err)
    })
}
const matchPassword = (e) => {
  profile.passContainer = true
  if (profile.userData.password == e.target.value) {
    profile.isMatched = true
  } else {
    profile.isMatched = false
  }
  console.log(e.target.value)
}

</script>

<style>
</style>