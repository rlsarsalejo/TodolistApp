<script setup>
import { useAuthStore } from '~/store/auth';
const auth = useAuthStore();
definePageMeta({
  middleware:["guest"],
});
  const form = reactive({
    name:null,
    email: null,
    password: null,
    password_confirmation: null,
  });
  //get and display the errors
  const errors = ref([]);

  //construction for checking if user is on the data or not
  const handleSubmit = async () => {
    try{
      await auth.register(form);
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
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create New Account</h5>
        </div>
        <!--User Name-->
        <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Fullname</label>
        <input v-model="form.name" type="text"  id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Mark Heros" />
        <span v-if="errors.name" class=" text-red-600" >{{ errors.name[0] }}</span>

      </div>
      <!--Email-->
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input v-model="form.email" type="email"  id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com"  />
        <span v-if="errors.email" class=" text-red-600" >{{ errors.email[0] }}</span>

      </div>
      <!--Password-->
      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input v-model="form.password" type="password"  id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  />
        <span v-if="errors.password" class=" text-red-600" >{{ errors.password[0] }}</span>

      </div>

       <!--Confirm Password-->
       <div>
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Your Password</label>
        <input v-model="form.password_confirmation" type="password"  id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  />
        <span v-if="errors.password_confirmation" class=" text-red-600" >{{ errors.password_confirmation[0] }}</span>

      </div>
     
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account</button>
      <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
       Already Registered? <NuxtLink to="/login"  class="text-blue-700 hover:underline dark:text-blue-500">Sign In</NuxtLink>
      </div>
    </form>
  </div>
</div>
</template>


