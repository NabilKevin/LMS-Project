<script setup lang="ts">
const active = ref("1.1 Pengenalan Bilangan");
const items = [
  {
    title: "1.1 Pengenalan Bilangan",
    meta: "Video · 12 menit",
    icon: "i-lucide-play-circle",
    status: "active",
  },
  {
    title: "1.2 Operasi Hitung Dasar",
    meta: "Bacaan · 8 menit",
    icon: "i-lucide-file-text",
    status: "completed",
  },
  {
    title: "1.3 Latihan Bilangan Bulat",
    meta: "Latihan · 10 soal",
    icon: "i-lucide-clipboard-check",
    status: "completed",
  },
  {
    title: "1.4 Penerapan dalam Kehidupan",
    meta: "Video · 14 menit",
    icon: "i-lucide-play-circle",
    status: "locked",
  },
];
</script>

<template>
  <aside class="lg:sticky lg:top-6">
    <UCard
      class="border border-slate-200 shadow-sm bg-white ring-0"
      :ui="{
        header: 'border-b border-slate-100 px-5 py-4',
        body: 'p-2 sm:p-2',
      }"
    >
      <template #header>
        <div class="flex items-center justify-between">
          <h2 class="font-bold">Materi di Bab Ini</h2>
          <UBadge color="secondary" variant="subtle">4 materi</UBadge>
        </div>
      </template>
      <nav aria-label="Navigasi materi" class="space-y-1">
        <button
          v-for="item in items"
          :key="item.title"
          :disabled="item.status === 'locked'"
          class="flex w-full items-center gap-3 rounded-lg p-3 text-left transition-colors hover:bg-slate-50 disabled:opacity-60"
          :class="{
            'bg-blue-50 hover:bg-blue-50': active === item.title,
          }"
          @click="active = item.title"
        >
          <UIcon
            :name="item.icon"
            class="size-5 shrink-0"
            :class="active === item.title ? 'text-secondary' : 'text-slate-400'"
          />
          <span class="min-w-0 flex-1">
            <span
              class="block text-sm font-semibold"
              :class="
                active === item.title ? 'text-secondary' : 'text-slate-700'
              "
              >{{ item.title }}</span
            >
            <span class="mt-1 block text-xs text-slate-400">{{
              item.meta
            }}</span>
          </span>
          <UIcon
            v-if="item.status === 'completed'"
            name="i-lucide-check-circle-2"
            class="size-4 text-emerald-500"
          />
          <UIcon
            v-else-if="item.status === 'locked'"
            name="i-lucide-lock"
            class="size-4 text-slate-300"
          />
        </button>
      </nav>
    </UCard>
  </aside>
</template>
