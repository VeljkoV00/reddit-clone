<template>
  <div class="flex">
    <template v-for="(link, key) in links" :key="key">
        <div class="mb-1 mr-1 px-4 py-3 text-gray-400 leading-4 border rounded"
        v-if="link.url ===null" v-html="link.label" >
            
        </div>
        <Link v-else :href="link.url" v-html="link.label" class="mb-1 mr-1 px-4 py-3 text-gray-900 leading-4 border rounded hover:bg-slate-600
        focus:text-indigo-500
        focus:border-indigo-700
        "></Link>
    </template>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    links: []
})

</script>

<style>

</style>