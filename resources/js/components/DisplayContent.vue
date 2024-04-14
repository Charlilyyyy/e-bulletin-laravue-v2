<template>
    <div class="p-6 bg-gray-100 rounded-lg shadow-md mb-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-blue-500 pl-4">{{ post.topic }}</h3>
        <p>{{ post.story }}</p>
        <p v-if="post.user" class="mt-2 font-bold text-gray-600">By: {{ post.user.first_name }} {{ post.user.last_name }}</p>
        <!-- Add your main content here -->
        <!-- {{ post.user.first_name }} -->
        <!-- {{ post }} -->
        <div class="mt-2" v-if="editable">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Edit
            </button>
            <button class="mx-2 bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Delete
            </button>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    post: Object,
    editable: Boolean
})
</script>