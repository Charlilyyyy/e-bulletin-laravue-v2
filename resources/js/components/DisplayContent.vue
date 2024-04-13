<template>
    <div class="p-6 bg-gray-100 rounded-lg shadow-md mb-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-blue-500 pl-4">{{ post.topic }}</h3>
        <p>{{ post.story }}</p>
        <!-- Add your main content here -->
    </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    post: Object
})
</script>