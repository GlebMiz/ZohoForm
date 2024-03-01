<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />
  <MainLayout nav-active="accounts">
    <div class="small-container">
      <Link :href="route('account.create')" class="btn btn-primary btn px-4">New account</Link>
    </div>
  </MainLayout>
</template>

<style lang="scss"></style>