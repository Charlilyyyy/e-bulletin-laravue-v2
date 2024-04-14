<template>
    <div class="my-3">
        <h1 class="text-2xl font-bold mb-4">{{ header }}</h1>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    header: String
})
</script>