<template>
  <div
    class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
  >
    <div>
      <p class="mb-2 text-sm font-semibold text-secondary">
        Bab 1 · Fondasi Bilangan
      </p>
      <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
        Pengenalan Bilangan
      </h1>
      <p class="mt-2 text-sm text-slate-500">
        Pelajari konsep dasar bilangan dan penggunaannya.
      </p>
    </div>
    <div class="flex gap-2">
      <UButton
        icon="i-lucide-chevron-left"
        label="Sebelumnya"
        color="secondary"
        variant="outline"
        disabled
      />
      <UButton
        label="Selanjutnya"
        trailing-icon="i-lucide-chevron-right"
        color="secondary"
        variant="outline"
      />
    </div>
  </div>
</template>
