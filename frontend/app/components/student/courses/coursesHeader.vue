<script setup lang="ts">
const search = defineModel<string>("search", { default: "" });
const selectedStatus = defineModel<string>("selectedStatus", { default: "" });

defineProps<{
  statusOptions: string[];
}>();
</script>

<template>
  <div>
    <p class="mb-2 text-sm font-medium text-slate-500">Learning workspace</p>
    <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
      My Courses
    </h1>
    <p class="mt-2 text-base text-slate-500">
      Manage and track your learning progress.
    </p>
  </div>

  <div class="flex flex-col gap-3 sm:flex-row">
    <div class="relative sm:w-64">
      <UIcon
        name="i-lucide-search"
        class="absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"
      />
      <input
        v-model="search"
        type="search"
        placeholder="Search courses..."
        aria-label="Search courses"
        class="h-11 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-4 text-sm text-slate-900 outline-none shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
      />
    </div>
    <USelect
      v-model="selectedStatus"
      :items="statusOptions"
      aria-label="Filter by status"
      class="w-full sm:w-36"
      :ui="{
        base: 'bg-secondary-100 hover:bg-secondary-200 cursor-pointer text-secondary font-semibold',
        item: 'bg-secondary-100 hover:bg-secondary-200 hover:text-secondary-700 cursor-pointer text-secondary font-semibold p-2',
        group: 'p-0',
      }"
      variant="subtle"
      color="secondary"
      highlight
    />
  </div>
</template>
