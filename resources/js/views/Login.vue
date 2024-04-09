<template>
    <div class="overflow-y-hidden">
        <Navbar/>
        <div class="container mx-auto mt-8 ">
            <!-- Main Content Layout -->
            <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Sign in to your account
                        </h2>
                    </div>
                    <form class="mt-8 space-y-6" @submit.prevent="login">
                        <input type="hidden" name="remember" value="true">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="email-address" class="sr-only">Email address</label>
                                <input v-model="cred.email" id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input v-model="cred.password" id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Forgot your password?
                                </a>
                            </div>
                        </div>
                        {{ cred }}
                        <div>
                            <button @click="apiLogin()" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: solid/lock-closed -->
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M4 7a4 4 0 016.93-2.586A4.002 4.002 0 0120 8v6a4 4 0 01-7.071 2.586A4.002 4.002 0 014 13V7zm2-2a2 2 0 012.001 1.85l.42 3.997a2 2 0 11-1.998-.002l-.421-3.997A2 2 0 016 5z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</template>
  
<script setup>
import Navbar from '../components/Navbar.vue'
import { useRouter } from 'vue-router'
import { reactive } from 'vue'
import { useAuthStore } from '../store/auth.js'

const cred = reactive({
    email: '',
    password: ''
});

const router = useRouter()

const authStore = useAuthStore()

const apiLogin = async () => {
    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(cred)
        });
        if (!response.ok) {
          throw new Error('Login error');
        }else{
            const a = await response.json()
            console.log(a)
            router.push('/')
            authStore.userDetails = a.user
            authStore.login()
        }
    } catch (error) {
        console.error('Login error:', error);

    }
}
</script>
  