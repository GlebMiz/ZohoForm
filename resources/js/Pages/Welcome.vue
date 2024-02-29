<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />
    <MainLayout>
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-6 fw-bold text-body-emphasis">Zoho web form | Gleb Mighulin</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">  Welcome to the Home page of the web form application that allows users to create a deal and account in
            Zoho CRM using the Zoho CRM API.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4 gap-3">Create Account</button>
                    <button type="button" class="btn btn-outline-primary btn-lg px-4">Create Deal</button>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style lang="scss">
.welcome {

    margin: 0 auto;
    max-width: 400px;
}</style>
