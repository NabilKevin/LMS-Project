<script setup lang="ts">
defineProps({
  materials: Array<{
    title: string;
    meta: string;
    status: string;
    icon: string;
  }>,
});
</script>

<template>
  <div
    v-if="materials?.length"
    class="divide-y divide-slate-100 border-t border-slate-100 bg-white"
  >
    <div
      v-for="material in materials"
      :key="material.title"
      class="flex min-h-20 items-center justify-between gap-4 px-5 py-4 transition-colors hover:bg-slate-50 cursor-pointer"
    >
      <div class="flex min-w-0 items-center gap-4">
        <UIcon :name="material.icon" class="size-5 shrink-0 text-slate-400" />
        <div class="min-w-0">
          <p class="truncate text-sm font-bold text-slate-800">
            {{ material.title }}
          </p>
          <p class="mt-1 text-xs text-slate-400">
            {{ material.meta }}
          </p>
        </div>
      </div>
      <UIcon
        v-if="material.status === 'completed'"
        name="i-lucide-check-circle-2"
        class="size-5 shrink-0 text-emerald-500"
      />
      <UIcon
        v-else
        name="i-lucide-lock"
        class="size-5 shrink-0 text-slate-300"
      />
    </div>
  </div>
  <div
    v-else
    class="border-t border-slate-100 bg-white px-5 py-6 text-sm text-slate-400"
  >
    Materi akan segera tersedia.
  </div>
</template>
