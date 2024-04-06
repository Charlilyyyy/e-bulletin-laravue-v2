<template>
    <!-- Left Sidebar Navbar -->
    <div class="bg-gray-100 p-4 rounded-lg mb-4">
        <SidebarNav/>
    </div>
  
    <!-- Filter -->
    <div class="bg-gray-100 p-4 rounded-lg">
        <Filter/>
    </div>
</template>

<script setup>
import SidebarNav from './SidebarNav.vue'
import Filter from './Filter.vue'

</script>