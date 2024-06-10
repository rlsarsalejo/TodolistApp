<!-- components/TodoForm.vue -->
<template>
    <div class="bg-red-20 flex items-center justify-center max-h-full">
      <div class="bg-white shadow-lg rounded-lg px-14 p-10 w-full min-w-full">
        <!-- Top Section -->
        <div class="flex justify-end items-center mb-4">
          <div class="flex space-x-2">
            <span class="bg-blue-500 text-white px-3 py-1 rounded-full">Pending Tasks {{ pendingTasks }}</span>
            <span class="bg-blue-500 text-white px-3 py-1 rounded-full">Tasks Done {{ tasksDone }}</span>
          </div>
        </div>
  
        <!-- Middle Section: Task List -->
        <div class="mb-4">
          <ul class="space-y-2">
            <li
              v-for="(todo, index) in todos"
              :key="index"
              :class="{ 'bg-green-100': todo.done }"
              class="flex justify-between items-center p-2 rounded"
            >
              <input
                type="checkbox"
                class="mr-2"
                @click="toggleDone(index)"
                :checked="todo.done"
              >
              <span :class="{ 'line-through': todo.done }">{{ todo.text }}</span>
              <div class="space-x-2">
                <button class="bg-emerald-600 text-white rounded-sm px-2">Edit</button>
                <button class="bg-red-500 text-white px-2 rounded-sm" @click="deleteTodo(index)">Delete</button>
              </div>
            </li>
          </ul>
        </div>
  
        <!-- Bottom Section: Add Task -->
        <div class="flex items-center space-x-2">
          <input
            v-model="newTodo"
            id="text"
            name="text"
            type="text"
            :class="{ 'border-green-500': inputGlow }"
            placeholder="New task"
            class="flex-grow border border-gray-300 p-2 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
          <button class="bg-blue-500 text-white p-2 rounded-r hover:bg-blue-600" @click="addTodo">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  
  const todos = ref([
    { text: 'Do something awesome!', done: false }
  ]);
  
  const newTodo = ref('');
  const inputGlow = ref(false);
  
  const pendingTasks = computed(() => todos.value.filter(todo => !todo.done).length);
  const tasksDone = computed(() => todos.value.filter(todo => todo.done).length);
  
  const toggleDone = (index) => {
    todos.value[index].done = !todos.value[index].done;
    inputGlow.value = todos.value[index].done;
  };
  
  const addTodo = () => {
    if (newTodo.value.trim() !== '') {
      todos.value.push({ text: newTodo.value, done: false });
      newTodo.value = '';
    } else {
      // Handle empty todo input
    }
  };
  
  const deleteTodo = (index) => {
    todos.value.splice(index, 1);
  };
  
  </script>
  
  <style scoped>
  .line-through {
    text-decoration: line-through;
  }
  .border-green-500:focus {
    border-color: #38a169;
  }
  </style>
  