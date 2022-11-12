<template>
  <h1>{{ subreddit.name }}</h1>
</template>

<script setup>
defineProps({
    subreddit: Object,
})
</script>
