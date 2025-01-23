<template>
    <div>
        <Navbar />
        <!-- slot itu berfungsi untuk menampung konten -->
        <slot />
    </div>
</template>
<script setup>
import Navbar from '@/Components/layout/Navbar.vue';
</script>
