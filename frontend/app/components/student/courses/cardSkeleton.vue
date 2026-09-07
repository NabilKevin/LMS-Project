<template>
  <!-- Render skeleton 6 kali saat loading -->
  <UCard
    v-for="i in 6"
    :key="`skeleton-${i}`"
    :ui="{ body: 'p-0' }"
    class="overflow-hidden bg-white shadow-sm rounded-2xl border border-slate-200 ring-0"
  >
    <!-- Top Banner Skeleton -->
    <div
      class="flex h-40 items-center justify-center bg-slate-100 animate-pulse"
    >
      <!-- Icon Box Skeleton -->
      <USkeleton class="size-16 rounded-2xl" />
    </div>

    <!-- Body Content Skeleton -->
    <div class="flex min-h-[250px] flex-col p-5">
      <!-- Title & Badge Skeleton -->
      <div class="flex items-start justify-between gap-3">
        <!-- Title -->
        <USkeleton class="h-6 w-2/3" />
        <!-- Badge -->
        <USkeleton class="h-6 w-20 shrink-0" :ui="{ base: 'rounded-md' }" />
      </div>

      <!-- ID & Teacher Name Skeleton -->
      <USkeleton class="mt-3 h-4 w-1/2" />

      <!-- Bottom Section Skeleton -->
      <div class="mt-auto pt-7">
        <!-- Progress Text Skeleton -->
        <div class="mb-2 flex items-center justify-between">
          <USkeleton class="h-4 w-16" />
          <!-- Teks "Progress" -->
          <USkeleton class="h-4 w-28" />
          <!-- Teks "0% Completed" -->
        </div>

        <!-- Progress Bar Skeleton -->
        <USkeleton class="h-2 w-full rounded-full" />

        <!-- Button Skeleton -->
        <USkeleton class="mt-5 h-9 w-full rounded-xl" />
      </div>
    </div>
  </UCard>
</template>
