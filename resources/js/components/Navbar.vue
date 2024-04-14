<template>
  <!-- Add a wrapper div to hold the content -->
  <div>
    <!-- Placeholder for content to ensure proper spacing -->
    <div class="h-16"></div>
    <!-- Navbar with fixed positioning -->
    <nav class="fixed top-0 left-0 w-full bg-gray-800 py-4 z-10">
      <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
          <a href="/"><img src="images/common/LOGO-TC-V1.png" alt="Logo" class="h-8 w-8 mr-2"></a>
          <!-- <span class="text-white font-bold text-lg">Your Logo</span> -->
          <!-- {{ d }} -->
        </div>

        <!-- Navigation Links -->
        <ul class="flex space-x-4">
          <li><a href="#" class="text-white hover:text-gray-300">Hist-Connect</a></li>
          <li><a href="#" class="text-white hover:text-gray-300">Resource Hub</a></li>
          <li class="relative">
            <a href="#" class="text-white hover:text-gray-300">Tools</a>
            <!-- Dropdown for Tools -->
            <ul class="absolute top-full left-0 hidden bg-gray-800 text-white py-2 px-4 rounded-lg">
              <li><a href="#" class="hover:text-gray-300">Tool 1</a></li>
              <li><a href="#" class="hover:text-gray-300">Tool 2</a></li>
              <!-- Add more items as needed -->
            </ul>
          </li>
          <li class="relative">
            <a href="#" class="text-white hover:text-gray-300">Activities</a>
            <!-- Dropdown for Activities -->
            <ul class="absolute top-full left-0 hidden bg-gray-800 text-white py-2 px-4 rounded-lg">
              <li><a href="#" class="hover:text-gray-300">Activity 1</a></li>
              <li><a href="#" class="hover:text-gray-300">Activity 2</a></li>
              <!-- Add more items as needed -->
            </ul>
          </li>
          <li><a href="#" class="text-white hover:text-gray-300">About Us</a></li>
        </ul>

        <!-- User Info -->
        <div class="flex items-center">
          <!-- Replace with user profile pic -->
          <!-- <img src="profile-pic.jpg" alt="Profile Pic" class="h-8 w-8 rounded-full mr-2"> -->
          <!-- <span class="text-white mr-2">Username</span> -->
          <!-- <button style="color: #4186CC;" class="btn btn-secondary">Login</button> -->
          <li v-if="!isLoggedIn"><router-link to="/login">Login</router-link></li>
        <li v-if="isLoggedIn"><button @click="logout">Logout</button></li>
        <!-- {{ d }} -->
          <a href="/profile">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 2rem;width: 2rem;" class="text-white cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.25 4.5a.75.75 0 0 1 .75.75v2a.75.75 0 1 1-1.5 0v-2a.75.75 0 0 1 .75-.75zM7.25 9a.75.75 0 0 1 .75.75v6a.75.75 0 1 1-1.5 0v-6a.75.75 0 0 1 .75-.75zM12.25 6a.75.75 0 0 1 1.5 0v7.795a2 2 0 0 1-1.685 1.977l-.086.018a2 2 0 0 1-1.648-.531l-2.227-2.5a.75.75 0 1 1 1.05-1.064l1.576 1.768 1.772-2.12a.75.75 0 0 1 1.113 1.002l-2.25 2.7a.5.5 0 0 1-.384.18H9.25a.75.75 0 0 1 0-1.5h2.75a1 1 0 0 0 .75-.341l2.25-2.7a.75.75 0 1 1 1.114 1.002l-2.227 2.67a2 2 0 0 1-1.648.531l-.086-.018a2 2 0 0 1-1.685-1.977V6z"/>
            </svg>
          </a>
        </div>
      </div>
    </nav>
    <!-- Main content of the page -->
    <div class="container mx-auto">
      <!-- Your main content goes here -->
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from "vue-router"
import { useRouter } from 'vue-router'
import { useAuthStore } from '../store/auth.js'
import { ref } from 'vue'

const authStore = useAuthStore()

const isLoggedIn = ref(authStore.isLoggedIn)

const router = useRouter()

const d = ref(authStore.userDetails)

const logout = async () => {
    try {
        const response = await fetch('/api/logout', {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(authStore.userDetails)
        });
        if (!response.ok) {
          throw new Error('Logout error');
        }else{
            const a = await response.json()
            console.log(a)
            
            isLoggedIn.value = false
            
            // Reset userDetails
            d.value = null
            authStore.userDetails = null
            authStore.logout()
            localStorage.removeItem('userDetails');
            router.push('/')
        }
    } catch (error) {
        console.error('error error:', error);

    }
}
</script>
  