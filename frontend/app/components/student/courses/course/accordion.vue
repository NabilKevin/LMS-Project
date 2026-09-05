<script setup lang="ts">
const chapters = [
  {
    label: "Bab 1 · Fondasi Bilangan",
    icon: "i-lucide-layers-2",
    description: "Konsep dasar dan operasi bilangan",
    materials: [
      {
        title: "1.1 Pengenalan Bilangan",
        meta: "Video • 12 menit",
        icon: "i-lucide-play-circle",
        status: "completed",
      },
      {
        title: "1.2 Operasi Hitung Dasar",
        meta: "Bacaan • 8 menit",
        icon: "i-lucide-file-text",
        status: "completed",
      },
      {
        title: "1.3 Latihan Bilangan Bulat",
        meta: "Latihan • 10 soal",
        icon: "i-lucide-clipboard-check",
        status: "completed",
      },
    ],
  },
  {
    label: "Bab 2 · Pecahan & Desimal",
    icon: "i-lucide-pie-chart",
    description: "Memahami bagian dari keseluruhan",
    materials: [
      {
        title: "2.1 Mengenal Pecahan",
        meta: "Video • 15 menit",
        icon: "i-lucide-play-circle",
        status: "completed",
      },
      {
        title: "2.2 Pecahan Senilai",
        meta: "Bacaan • 10 menit",
        icon: "i-lucide-file-text",
        status: "completed",
      },
      {
        title: "2.3 Kuis Pecahan",
        meta: "Kuis • 8 soal",
        icon: "i-lucide-clipboard-check",
        status: "locked",
      },
    ],
  },
  {
    label: "Bab 3 · Persamaan Linear",
    icon: "i-lucide-sigma",
    description: "Menyelesaikan persamaan satu variabel",
    materials: [
      {
        title: "3.1 Variabel dan Konstanta",
        meta: "Video • 18 menit",
        icon: "i-lucide-play-circle",
        status: "locked",
      },
      {
        title: "3.2 Langkah Penyelesaian",
        meta: "Bacaan • 12 menit",
        icon: "i-lucide-file-text",
        status: "locked",
      },
      {
        title: "3.3 Evaluasi Bab 3",
        meta: "Ujian • 15 soal",
        icon: "i-lucide-clipboard-check",
        status: "locked",
      },
    ],
  },
  {
    label: "Bab 4 · Geometri Dasar",
    icon: "i-lucide-shapes",
    description: "Bangun datar dan pengukuran",
    materials: [],
    disabled: true,
  },
];
</script>

<template>
  <UAccordion
    :items="chapters"
    type="multiple"
    :default-value="['0', '1']"
    :ui="{
      item: 'border-b-0',
      trigger: 'px-5 py-5 text-base',
      content: 'px-0 pb-0',
    }"
    class="bg-white cursor-pointer rounded-2xl border border-slate-200 shadow-sm"
  >
    <template #leading="{ item }">
      <div
        class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-secondary"
      >
        <UIcon :name="item.icon" class="size-5" />
      </div>
    </template>
    <template #default="{ item }">
      <div class="flex min-w-0 flex-1 flex-col text-left">
        <span class="font-bold text-slate-800">{{ item.label }}</span>
        <span class="mt-0.5 text-xs font-normal text-slate-400">{{
          item.description
        }}</span>
      </div>
    </template>
    <template #body="{ item }">
      <StudentCoursesCourseLearningList :materials="item.materials" />
    </template>
  </UAccordion>
</template>
