<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "@/Components/Pagination.vue" 
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  communities: Object,
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All communities
      </h2>
    </template>

    <div class="flex justify-end">
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link
          :href="route('communities.create')"
          class="
            inline-flex
            items-center
            justify-center
            rounded-md
            border border-transparent
            bg-indigo-600
          "
          >Create</Link
        >
      </div>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-slate-100 m-2 p-2">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="
                    py-3.5
                    pl-4
                    pr-3
                    text-left text-sm
                    font-semibold
                    text-gray-900
                    sm:pl-6
                  "
                >
                  Name
                </th>
                <th
                  scope="col"
                  class="
                    px-3
                    py-3.5
                    text-left text-sm
                    font-semibold
                    text-gray-900
                  "
                >
                  Slug
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="community in communities.data" v-bind:key="community.id">
                <td
                  class="
                    whitespace-nowrap
                    py-4
                    pl-4
                    pr-3
                    text-smfont-medium text-gray-900
                    sm:pl-6
                  "
                >
                  {{ community.name }}
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  {{ community.slug }}
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  <Link
                    :href="route('communities.edit', community.id)"
                    class="text-indigo-600 hover:text-indigo-900 mr-3"
                    >Edit</Link
                  >
                  <Link
                    :href="route('communities.destroy', community.id)"
                    class="text-indigo-600 hover:text-red-600"
                    method="delete"
                    as="button"
                    type="button"
                    >Delete</Link
                  >
                </td>
              </tr>
            </tbody>
          </table>
          <div class="m-2 p-2">
            <Pagination :links="communities.links"></Pagination>

          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>