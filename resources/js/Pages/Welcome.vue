<template>
    <guest-layout>
     
     
     
  
      <section class="flex md:flex-row m-2 p-2">
        <div class="w-8/12">
          <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id">
        
      </PostCard>
      <div class="mt-4 p-2">
        
      </div>
        </div>
  
        <div class="w-4/12 p-2">
          
          <div class="m-2 p-2 bg-slate-700 text-white-200">
            <h2>Top Communites</h2>
            <CommunityList :communities="communities.data"></CommunityList>
          </div>
        </div>
      </section>
    </guest-layout>
  </template>
  
  <script setup>
  
  import GuestLayout from "@/Layouts/GuestLayout.vue"
  import PostCard from "@/Components/PostCard.vue"
  defineProps({
      communities: Object,
      posts: Object
  })
  </script>
  