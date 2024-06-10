import {defineStore} from 'pinia';
import { useAuthStore } from './auth';
export const useTodoStore = defineStore('todo',{
    state: () => ({
        todos: [],
    }),
    actions:{
        async fetchTodos(){
            const authStore = useAuthStore();
            try{
                this.todos = await $fetch('http://localhost:8000/api/todos',{
                    headers:{
                        Authorization: `Bearer ${authStore.getToken}`
                    },
                });
            }catch (error){
                throw error;
            }
        },
        async addTodo(formData){
            const authStore = useAuthStore();
            try{
                const todo = await $fetch('http://localhost:8000/api/create',{
                    method: 'POST',
                    body: {...formData},
                    headers:{
                        Authorization:`Bearer ${authStore.getToken}`,
                    }
                });
                this.todos.push(todo);
            }catch(error){
                throw error;
            }
        },
        async updateTodo(id,formData){
            const authStore = useAuthStore();
            try{
                const todo = await $fetch(`http://localhost:8000/api/update/${id}`,{
                    method: 'PUT',
                    body: {... formData},
                    headers:{
                        Authorization: `Bearer ${authStore.getToken}`,
                    },
                });
                const index = $this.todos.findIndex((todo)=>todo.id === id);
                this.todos[index] = todo;
            }catch (error){
                throw error;
            }
        },
        async deleteTodo(id){
            const authStore = useAuthStore();
            try{
                await $fetch(`http://localhost:8000/api/delete/${id}`,{
                    method: 'DELETE',
                    headers:{
                        Authorization: `Bearer ${authStore.getToken}`,
                    },
                });
                this.todos = this.todos.filter((todo)=> todo.id !==id);
            }catch (error){
                throw error;
            }
        }
    }
});