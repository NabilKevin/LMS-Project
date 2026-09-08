<template>
  <UCard
    class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm ring-0"
    :ui="{ body: 'p-0 sm:px-1 sm:py-4 bg-white' }"
  >
    <div class="p-6 sm:p-8">
      <!-- Breadcrumb skeleton -->
      <div class="mb-7 flex items-center gap-2">
        <USkeleton class="h-4 w-24" />
        <span class="text-slate-300">/</span>
        <USkeleton class="h-4 w-32" />
      </div>

      <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
        <div class="max-w-2xl w-full">
          <!-- Badge skeleton -->
          <USkeleton class="mb-3 h-6 w-28 rounded-full" />

          <!-- Title skeleton -->
          <USkeleton class="h-9 w-full max-w-md sm:h-10" />

          <!-- Teacher name skeleton -->
          <div class="mt-3 flex items-center gap-2">
            <USkeleton class="size-4 rounded-full" />
            <USkeleton class="h-4 w-48" />
          </div>
        </div>

        <div class="w-full md:max-w-xs">
          <!-- Progress label skeleton -->
          <div class="mb-2 flex items-center justify-between">
            <USkeleton class="h-4 w-24" />
            <USkeleton class="h-4 w-10" />
          </div>

          <!-- Progress bar skeleton -->
          <USkeleton class="h-2 w-full rounded-full" />

          <!-- Caption skeleton -->
          <USkeleton class="mt-2 h-3 w-32" />
        </div>
      </div>
    </div>
  </UCard>
</template>
