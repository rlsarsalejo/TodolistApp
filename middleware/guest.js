import { useTokenStore } from "~/store/token";

export default defineNuxtRouteMiddleware((to,from)=>{
    const tokenStore = useTokenStore();
    if (tokenStore.getStatus){
        return navigateTo("/dashboard");
    }
});