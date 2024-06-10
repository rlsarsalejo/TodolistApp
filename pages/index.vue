<template>
    <div>
<!--Navbar Section-->


<!--Welcome Banner Section-->


<div class=" max-h-screen lg:m-96 lg:mt-32  justify-center  text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Start Your Day With A Task</h5>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <NuxtLink to="/login"  class="text-lg font-bold w-full sm:w-36 bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            Start 
        </NuxtLink>
       <button @click="counter.increment">Counter {{ counter.count }}</button>
    </div>
</div>

</div>
</template>

<script setup>
import { useCounterStore } from '~/store/counter';

const counter = useCounterStore();
</script>

<style lang="scss" scoped>

</style>