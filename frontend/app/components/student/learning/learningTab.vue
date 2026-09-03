<script setup lang="ts">
import { ref } from "vue";

const done = ref(false);
</script>

<template #learning>
  <div class="mt-5 space-y-6">
    <UCard
      :ui="{ body: 'p-0 sm:p-0' }"
      class="overflow-hidden border-0 shadow-sm ring-1 ring-slate-200"
    >
      <div class="flex aspect-video items-center justify-center bg-slate-900">
        <button
          aria-label="Putar video materi"
          class="flex size-16 items-center justify-center rounded-full bg-white text-secondary shadow-lg"
        >
          <UIcon name="i-lucide-play" class="ml-1 size-7 fill-current" />
        </button>
      </div>
      <div
        class="flex justify-between bg-white px-4 py-3 text-sm text-black border border-slate-200"
      >
        <span>Video pembelajaran · Pengenalan Bilangan</span>
        <span>12:00</span>
      </div>
    </UCard>
    <UCard class="border border-slate-200 shadow-sm ring-0 bg-white">
      <article class="space-y-4 text-[15px] leading-7 text-slate-600">
        <h2 class="text-xl font-bold text-slate-950">
          Memahami Bilangan di Sekitar Kita
        </h2>
        <p>
          Bilangan digunakan untuk menyatakan
          <strong class="text-slate-900">jumlah, urutan, dan ukuran</strong>
          dalam kehidupan sehari-hari.
        </p>
        <p>Beberapa hal penting yang perlu diingat:</p>
        <ul class="list-disc space-y-2 pl-5 marker:text-secondary">
          <li>Bilangan asli digunakan untuk menghitung.</li>
          <li>Bilangan nol menyatakan tidak adanya jumlah.</li>
          <li>Bilangan bulat mencakup positif, nol, dan negatif.</li>
        </ul>
      </article>
    </UCard>
    <UAlert
      icon="i-lucide-paperclip"
      color="secondary"
      variant="subtle"
      title="Lampiran"
      description="Bahan tambahan untuk membantu memahami materi ini."
    >
      <div
        class="mt-3 flex items-center justify-between rounded-lg border border-slate-200 bg-white px-3 py-3"
      >
        <div class="flex items-center gap-3">
          <div
            class="flex size-9 items-center justify-center rounded-md bg-red-50 text-red-500"
          >
            <UIcon name="i-lucide-file-down" class="size-5" />
          </div>
          <div>
            <p class="text-sm font-semibold text-slate-700">
              rumus_bilangan.pdf
            </p>
            <p class="text-xs text-slate-400">PDF · 248 KB</p>
          </div>
        </div>
        <UButton
          icon="i-lucide-download"
          aria-label="Unduh PDF"
          color="secondary"
          variant="ghost"
        />
      </div>
    </UAlert>
    <div
      class="flex flex-col gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:items-center sm:justify-between"
    >
      <UButton
        :label="done ? 'Sudah Selesai' : 'Tandai Selesai'"
        icon="i-lucide-check-circle"
        color="secondary"
        variant="outline"
        @click="done = true"
      />
      <UButton
        label="Materi Selanjutnya"
        trailing-icon="i-lucide-arrow-right"
        color="secondary"
        variant="subtle"
      />
    </div>
  </div>
</template>
