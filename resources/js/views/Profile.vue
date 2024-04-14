<template>
    <div>
        <Navbar/>
        
        <div class="container mx-auto mt-8">
            <Header :header="'My Posts'"/>
            <!-- {{ profile }} -->
            <div v-for="post in profile" :id="post.id">
                <DisplayContent
                    :post="post"
                    :editable="true"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from '../components/Navbar.vue'
import Header from '../components/Header.vue'
import DisplayContent from '../components/DisplayContent.vue'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { useAuthStore } from '../store/auth.js'

let profile = ref([])

onMounted(() => {
    // console.log('object');
    fetchUserPost()
})

const authStore = useAuthStore()

const fetchUserPost = async () => {
    axios.get('api/userPosts', {
            headers: {
                Authorization: `Bearer ${authStore.token}`
            }
        })
        .then(response => {
          profile.value = response.data;
          console.log(response);
        })
        .catch(error => {
          console.error('Error fetching profile: ', error);
        });
}
</script>