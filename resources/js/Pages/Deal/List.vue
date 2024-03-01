<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />
    <MainLayout nav-active="deals">
        <div class="small-container">
           <Link :href="route('deal.create')" class="btn btn-primary btn px-4">New deal</Link>
        </div>
    </MainLayout>
</template>

<style lang="scss">

</style>