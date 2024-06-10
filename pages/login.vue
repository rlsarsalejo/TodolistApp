<script setup>
import { useAuthStore } from '~/store/auth';
import '~/middleware/guest';
definePageMeta({
  middleware:["guest"]
});
const auth = useAuthStore();
  const form = reactive({
    email: null,
    password: null,
  });
  //get and display the errors
  const errors = ref([]);

  //construction for checking if user is on the data or not
  const handleSubmit = async () => {
    try{
      await auth.login(form);
    }catch (error){
        errors.value = error.data.errors;
    }
   
  }

</script>

<template>
  <div class="flex justify-center items-center h-[70vh]">
  <div class="w-full  max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-2">
    <form @submit.prevent="handleSubmit" class="space-y-6">
        <div class="flex justify-between ">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
        </div>
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input v-model="form.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com"  />
        <!--Display Error Message-->
        <span v-if="errors.email" class=" text-red-600" >{{ errors.email[0] }}</span>
      </div>
      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  />
         <!--Display Error Message-->
         <span v-if="errors.password" class=" text-red-600" >{{ errors.password[0] }}</span>
      </div>
      <div class="flex items-start">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
          </div>
          <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
        <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
      </div>
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
      <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
        Not registered? <NuxtLink to="/register"  class="text-blue-700 hover:underline dark:text-blue-500">Create account</NuxtLink>
      </div>
    </form>
  </div>
</div>

</template>



<style lang="scss" scoped>

</style>