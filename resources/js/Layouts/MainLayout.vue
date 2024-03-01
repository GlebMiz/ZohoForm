<script setup lang="ts">
import Header from '@/Components/Header.vue';
import { HeaderInterface } from '@/interfaces/header';

defineProps<HeaderInterface>();

</script>

<template>
    <Header :nav-active="navActive" />
    <main>
        <div class="container">
            <slot />
        </div>
    </main>
</template>
