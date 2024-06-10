<!-- components/TodoList.vue -->
<template>
    <div>
        <h2>Todo List</h2>
        <TodoForm @add-todo="addTodo" />
        <ul>
            <li v-for="todo in todos" :key="todo.id">
                <TodoItem :todo="todo" @delete-todo="deleteTodo" @update-todo="updateTodo" />
            </li>
        </ul>
    </div>
</template>

<script setup>
import { useTodoStore } from '~/stores/todo';
import { onMounted } from 'vue';
import TodoItem from './TodoItem.vue';
import TodoForm from './TodoForm.vue';

const todoStore = useTodoStore();

onMounted(() => {
    todoStore.fetchTodos();
});

const todos = todoStore.todos;

const addTodo = (todo) => {
    todoStore.addTodo(todo);
};

const deleteTodo = (id) => {
    todoStore.deleteTodo(id);
};

const updateTodo = (id, todo) => {
    todoStore.updateTodo(id, todo);
};
</script>
