import { useTokenStore } from "./token";
import { defineStore } from "pinia";
export const useAuthStore = defineStore("auth",{
    state: () => ({
        user:{},
    }),
    persist:{
        paths: ["user"],
    },
    getters:{
        getUser:(state) => state.user,
    },
    actions:{

    /// Login Data
    //construction for checking if user is on the data or not
      async login (formData) {
        //using try catch for identifying the error
        try{
        // connecting to the laravel backend and fetch the data
        const { data } = await $fetch ("http://localhost:8000/api/login",{
        method: 'POST',
        body:{...formData},
        });
        this.commonSetter(data);
        // catching the error from the backend
        }catch (error){
            throw error;  
        }
        },


    // Register Data
    async register (formData) {
        const token = useTokenStore();
        //using try catch for identifying the error
        try{
        // connecting to the laravel backend and fetch the data
        const { data } = await $fetch ("http://localhost:8000/api/register",{
        method: 'POST',
        body:{...formData},
        });
        this.commonSetter(data);
        // catching the error from the backend
        }catch (error){
            throw error;  
        }
        },

        // Logout user
    async logout () {
        const tokenStore = useTokenStore();
        //using try catch for identifying the error
        try{
        // connecting to the laravel backend and fetch the data
        const res = await $fetch ("http://localhost:8000/api/logout",{
        method: 'POST',
        headers:{
            Accept: "application/json",
            Authorization: `Bearer ${tokenStore.getToken}`
        },
        });
        tokenStore.removeToken();
        console.log(res);
        // catching the error from the backend
        }catch (error){
            throw error;  
        }
        },

        commonSetter(data){
            const tokenStore = useTokenStore();
            tokenStore.setToken(data.token);
            this.user = data.user;

            return navigateTo("/dashboard");
        },

    },
   
});