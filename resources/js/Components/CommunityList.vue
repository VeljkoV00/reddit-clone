<template>
  <div>
    <ul role="list" class="divided-y divide-slate-300 dark:divide-slate-700">
        <li v-for="community in communities" :key="community.id" class="py-3 sm:py-4">
            <div class="flex items-center space-x-4">
                <Link :href="{}" class="text-slate-700 dark:text-slate-400">

                </Link >
                {{ community.name }}
                <div>
                    Posts()
                </div>
            </div>
        </li>
    </ul>
  </div>
</template>

<script setup>
import {  Link } from '@inertiajs/inertia-vue3';
defineProps({
    communities: Object
})
</script>

