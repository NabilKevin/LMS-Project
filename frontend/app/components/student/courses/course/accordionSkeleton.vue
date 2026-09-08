<template>
  <div
    class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
  >
    <div
      v-for="i in 4"
      :key="i"
      class="flex items-center gap-4 px-5 py-5"
      :class="{ 'border-b border-slate-100': i !== 4 }"
    >
      <!-- Icon box skeleton -->
      <USkeleton class="size-10 shrink-0 rounded-lg" />

      <!-- Text skeleton -->
      <div class="flex min-w-0 flex-1 flex-col gap-2">
        <USkeleton class="h-4 w-1/3" />
        <USkeleton class="h-3 w-1/4" />
      </div>

      <!-- Chevron skeleton -->
      <USkeleton class="size-4 shrink-0 rounded-full" />
    </div>
  </div>
</template>
