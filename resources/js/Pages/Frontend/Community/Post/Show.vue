<template>
    <guest-layout>
      <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  r/{{ community.name}}
              </h2>
              <div class="flex justify-end m-2 p-2">
        <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-3 rounded bg-indigo-500">Create Post</Link>
      </div>
          </template>
     
     
  
      <section class="flex md:flex-row m-2 p-2">
        <div class="w-8/12">
            <div class="m-2 p-2 bg-slate-200">
                <h2 class="font-semibold text-2xl text-black">
                    <Link :href="route('community.show', community.slug)">
                        r/{{ community.name }}</Link>

                </h2>
            </div>
            <div class="m-2 p-2 bg-slate-200">

                <span class="text-sm text-slate-400">Posted by {{ post.data.username }}</span>
                <div v-if="$page.props.auth.auth_check && post.data.owner">
                    <Link class="font-semibold text-blue-400 hover:text-blue-700" :href="(route('communities.posts.edit', [community.slug, post.data.slug]))">Edit</Link>
                </div>
                <div v-if="$page.props.auth.auth_check && post.data.owner">
                    <Link method="delete" as="button" type="button" class="font-semibold text-red-400 hover:text-red-700" :href="(route('communities.posts.destroy', [community.slug, post.data.slug]))">Delete</Link>
                </div>
                <h1 class="font-semibold text-3xl text-black">
                    {{ post.data.title }}
                </h1>
                <p class="text-slate-700">{{ post.data.description }}</p>
                <a :href="post.url" class="font-semibold text-blue-500 text-sm hover:text-blue-900">{{ post.data.url }}</a>
            </div>
        
     
     
        </div>
  
        <div class="w-4/12 p-2">
          
          <div class="m-2 p-2 bg-slate-700 text-white-200">
            <h2>Latest Communites</h2>
          </div>
        </div>
      </section>
    </guest-layout>
  </template>
  
  <script setup>
  
  import GuestLayout from "@/Layouts/GuestLayout.vue"
  import PostCard from "@/Components/PostCard.vue"
  import { Link } from '@inertiajs/inertia-vue3';
  defineProps({
      community: Object,
      post: Object
  })
  </script>
  