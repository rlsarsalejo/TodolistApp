<template>
    <div>
        <!-- <div class=" text-center">
            <h1>Welcome To Dashboard</h1>
            <h2>Name: {{ auth.getUser?.name }}</h2>
        </div> -->
        <div class=" max-h-full">
            <TodoForm />
        </div>
     
    </div>


</template>

<script setup>
    import { useAuthStore } from '~/store/auth';
    import TodoForm from '~/components/TodoForm.vue';
    const auth = useAuthStore();
    definePageMeta({
        middleware:["auth"]
    });

</script>

<style  scoped>
    .text-center{
        text-align: center;
    }
</style>