<script setup lang="ts">
import Header from '@/Components/Header.vue';


</script>

<template>
    <Header />
    <main>
        <div class="container">
            <slot />
        </div>
    </main>
</template>
