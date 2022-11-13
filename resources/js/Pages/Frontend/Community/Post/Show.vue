<template>
  <guest-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        r/{{ community.name }}
      </h2>
      <div class="flex justify-end m-2 p-2">
        <Link
          v-if="$page.props.auth.auth_check"
          :href="route('communities.posts.create', community.slug)"
          class="px-3 py-3 rounded bg-indigo-500"
          >Create Post</Link
        >
      </div>
    </template>

    <section class="flex md:flex-row m-2 p-2">
      <div class="w-8/12">
        <div class="m-2 p-2 bg-slate-200">
          <h2 class="font-semibold text-2xl text-black">
            <Link :href="route('community.show', community.slug)">
              r/{{ community.name }}</Link
            >
          </h2>
        </div>
        <div class="m-2 p-2 bg-slate-200">
          <span class="text-sm text-slate-400"
            >Posted by {{ post.data.username }}</span
          >
          <div v-if="$page.props.auth.auth_check && post.data.owner">
            <Link
              class="font-semibold text-blue-400 hover:text-blue-700"
              :href="
                route('communities.posts.edit', [
                  community.slug,
                  post.data.slug,
                ])
              "
              >Edit</Link
            >
          </div>
          <div v-if="$page.props.auth.auth_check && post.data.owner">
            <Link
              method="delete"
              as="button"
              type="button"
              class="font-semibold text-red-400 hover:text-red-700"
              :href="
                route('communities.posts.destroy', [
                  community.slug,
                  post.data.slug,
                ])
              "
              >Delete</Link
            >
          </div>
          <h1 class="font-semibold text-3xl text-black">
            {{ post.data.title }}
          </h1>
          <p class="text-slate-700">{{ post.data.description }}</p>
          <a
            :href="post.url"
            class="font-semibold text-blue-500 text-sm hover:text-blue-900"
            >{{ post.data.url }}</a
          >
        </div>
        <div>
            <ul role="list" class="divide-y divide bg-gray-200 m-2 p-2">

                <li v-for="(comment, index) in post.data.comments" :key="index" class="py-4 flex flex-col">
                    <div class="text text-sm">Commented by <span class="font-semibold ml-1">{{ comment.username }}</span>
                    
                    </div>
                    <div class="text-slate-600 m-2 p-2">{{ comment.content }}</div>
                </li>
            </ul>
        </div>
        <form action="" class="m-2 p-2 max-w-md" @submit.prevent="submit">
          <div class="m-2">
            <label
              for="comment"
              class="
                block
                mb-2
                text-sm
                front-medium
                text-gray-500
                dark:text-gray-400
              "
              >Your comment</label
            >
            <textarea
            v-model="form.content"
              name="comment"
              id="comment"
              class="block w-full text-sm text-gray-500 dark:text-gray-400"
            ></textarea>
          </div>
          <div class="mt-2">
            <button
              class="
                px-4
                py-2
                bg-blue-400
                hover:bg-blue-700
                text-white
                rounded-sm
              "
            >
              Comment
            </button>
          </div>
        </form>
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
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/PostCard.vue";
import { Link , useForm} from "@inertiajs/inertia-vue3";
 const props = defineProps({
  community: Object,
  post: Object,
});
const form = useForm({
   content: ''
});

const submit = () => {
    form.post(route('frontend.posts.comments', [props.community.slug, props.post.data.slug]),
    {
        onSuccess: () => form.reset('content')
    }
    )
  
};
</script>
  