<!-- components/TodoItem.vue -->
<template>
    <div>
        <input type="checkbox" v-model="localTodo.completed" @change="updateTodo" />
        <input type="text" v-model="localTodo.title" @blur="updateTodo" />
        <button @click="deleteTodo">Delete</button>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    todo: Object,
});

const emit = defineEmits(['delete-todo', 'update-todo']);

const localTodo = ref({ ...props.todo });

const updateTodo = () => {
    emit('update-todo', localTodo.value.id, localTodo.value);
};

const deleteTodo = () => {
    emit('delete-todo', localTodo.value.id);
};

watch(() => props.todo, (newTodo) => {
    localTodo.value = { ...newTodo };
});
</script>
