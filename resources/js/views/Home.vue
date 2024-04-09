<template>
    <div>
        <Navbar/>
        <div class="container mx-auto mt-8">
            <!-- Mini Header -->
            <div class="flex justify-between items-center mb-4 py-4 px-4" style="background-color: #35587C;">
            <h2 class="text-3xl font-bold text-gray-900">Bulletin Board</h2>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Contribute +</button>
            </div>
  
            <!-- Main Content Layout -->
            <div class="flex">
                <!-- Left Sidebar -->
                <div class="w-1/4 pr-8">
                    <Sidebar/>
                </div>
  
                <!-- Main Content -->
                <div class="flex-row w-3/4 overflow-y-auto" style="max-height: calc(100vh - 180px);">
                    <!-- Main Content Goes Here -->
                    <!-- This section is scrollable -->
                    <!-- Example main content -->
                    <div v-for="i in 10" :key="i" class="mb-5">
                    <DisplayContent/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import Navbar from '../components/Navbar.vue'
import DisplayContent from '../components/DisplayContent.vue'
import Sidebar from '../components/Sidebar.vue'
import { useRouter } from 'vue-router'

// const router = useRouter()

// const goToLogin = () => {
//     console.log('object');
//   router.push('/login')
// }
</script>
  