<template>
    <div>
        <Navbar/>
        <div class="container mx-auto mt-8">
            <!-- Mini Header -->
            <div class="flex justify-between items-center mb-4 py-4 px-4" style="background-color: #35587C;">
            <h2 class="text-3xl font-bold text-gray-900">Bulletin Board</h2>
            <button @click="newPost()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Contribute +</button>
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
                    <!-- <div v-for="i in 10" :key="i" class="mb-5">
                        <DisplayContent/>
                    </div> -->

                    <div v-for="post in postStore.posts" :id="post.id">
                        <DisplayContent
                            :post="post"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <NewPost 
        :isOpen="newPostModal"
        @closeCreate="handleCloseCreate"
        @createPost="handleCreate"
    />
    <!-- {{ postStore.posts }} -->

    <!-- {{ authStore.userDetails }} -->
</template>
  
<script setup>
import Navbar from '../components/Navbar.vue'
import DisplayContent from '../components/DisplayContent.vue'
import Sidebar from '../components/Sidebar.vue'
import NewPost from '../components/NewPost.vue'
import { useAuthStore } from '../store/auth.js'
import { usePostStore } from '../store/post.js'
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

onMounted(() => {
    postStore.fetchPosts()
})


// const router = useRouter()

// const goToLogin = () => {
//     console.log('object');
//   router.push('/login')
// }
let newPostModal = ref(false)
const authStore = useAuthStore()
const postStore = usePostStore()

const newPost = () => {
    if(authStore.userDetails!=null){
        newPostModal.value = true
    }else{
        console.log('Please login to create post')
    }
}

const handleCloseCreate = (data) => {
    // console.log(data)
    newPostModal.value = data
}

const handleCreate = async (data) => {
    const userData = JSON.parse(authStore.userDetails)
    try{
        const response = await axios.post('/api/posts', {
            posts: data,
            userId: userData.id
        })
        console.log(response.data)
        postStore.posts.push(response.data.post)
    }catch (error) {
        console.error('Error while posting data:', error)
    }
}

// const renderPosts = re
</script>
  