<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
import { HeaderInterface } from '@/interfaces/header';

defineProps<HeaderInterface>();

const links = [
    { key: 'home', name: 'Home', href: '/' },
    { key: 'accounts', name: 'Accounts', href: route('account.create') },
    { key: 'deals', name: 'Deals', href: route('deal.create') },
];
</script>
<template>
    <header class="text-bg-dark mb-5">
        <div class="container d-flex justify-content-center py-3">
            <ul class="nav gap-2">
                <li v-for="link in links" :key="link.key">
                    <Link :href="link.href" :class="`text-${link.key == navActive ? 'bg-primary' : 'white'}`"
                        class="nav-link px-3 rounded-2 ">
                    {{ link.name }}</Link>
                </li>
            </ul>
        </div>
    </header>
</template>