<script setup lang="ts">
import { computed, ref } from "vue";
const showForum = ref(true);
const searchQuery = ref("");
const filterStatus = ref("Semua");
const selectedThread = ref(null);
const isSlideoverOpen = ref(false);

const filterOptions = [
  { label: "Semua", value: "Semua" },
  { label: "Belum Terjawab", value: "Belum Terjawab" },
  { label: "Sudah Terpecahkan", value: "Sudah Terpecahkan" },
];
const discussions = [
  {
    id: 1,
    title: "Bagaimana cara membedakan bilangan bulat positif dan negatif?",
    author: "Budi Santoso",
    avatar: "/placeholder-user.jpg",
    status: "open",
    replies: 5,
    category: "Pertanyaan",
    timeAgo: "2 jam lalu",
    question:
      "Saya masih bingung tentang cara membedakan bilangan bulat positif dan negatif. Bisa dijelaskan dengan contoh yang lebih sederhana?",
    repliesData: [
      {
        id: 1,
        author: "Siti Nurhaliza",
        role: null,
        avatar: "/placeholder-user.jpg",
        timeAgo: "1 jam lalu",
        text: "Bilangan positif adalah bilangan yang lebih besar dari nol (1, 2, 3, ...), sedangkan bilangan negatif adalah bilangan yang lebih kecil dari nol (-1, -2, -3, ...). Nol sendiri bukan positif maupun negatif.",
        nested: [
          {
            id: 2,
            author: "Andi Wijaya",
            role: "Instruktur",
            avatar: "/placeholder-user.jpg",
            timeAgo: "45 menit lalu",
            text: "Penjelasan Siti sangat tepat. Untuk contoh konkret: jika kamu naik lift 5 lantai, itu bilangan +5. Jika kamu turun 3 lantai, itu bilangan -3. Mudah dipahami, bukan?",
          },
        ],
      },
      {
        id: 3,
        author: "Rini Dwi Cahya",
        role: null,
        avatar: "/placeholder-user.jpg",
        timeAgo: "30 menit lalu",
        text: "Terima kasih atas penjelasannya! Sekarang saya mengerti. Jadi garis bilangan menunjukkan dari kiri ke kanan: negatif, nol, kemudian positif.",
        nested: [],
      },
    ],
  },
  {
    id: 2,
    title: "Apa perbedaan bilangan asli dan bilangan cacah?",
    author: "Dewi Kusuma",
    avatar: "/placeholder-user.jpg",
    status: "resolved",
    replies: 3,
    category: "Konsep Dasar",
    timeAgo: "4 jam lalu",
    question:
      "Perbedaan bilangan asli (1, 2, 3, ...) dan bilangan cacah (0, 1, 2, 3, ...) apa ya? Terlihat hampir sama.",
    repliesData: [
      {
        id: 1,
        author: "Budi Santoso",
        role: "Instruktur",
        avatar: "/placeholder-user.jpg",
        timeAgo: "3 jam lalu",
        text: "Perbedaannya sederhana: bilangan asli TIDAK termasuk nol (1, 2, 3, ...), tetapi bilangan cacah TERMASUK nol (0, 1, 2, 3, ...). Itu saja perbedaannya!",
        nested: [],
      },
    ],
  },
  {
    id: 3,
    title: "Bagaimana aplikasi bilangan dalam kehidupan sehari-hari?",
    author: "Agus Hermawan",
    avatar: "/placeholder-user.jpg",
    status: "open",
    replies: 2,
    category: "Aplikasi Praktis",
    timeAgo: "6 jam lalu",
    question:
      "Bisa berikan contoh nyata bagaimana bilangan digunakan dalam kehidupan sehari-hari kita?",
    repliesData: [
      {
        id: 1,
        author: "Eka Prasetya",
        role: null,
        avatar: "/placeholder-user.jpg",
        timeAgo: "5 jam lalu",
        text: "Contohnya banyak sekali! Uang yang kita gunakan sehari-hari, jumlah barang di toko, penomoran rumah, jam, dan masih banyak lagi.",
        nested: [],
      },
    ],
  },
];

const openThread = (thread: any) => {
  selectedThread.value = thread;
  isSlideoverOpen.value = true;
};

const closeSlideOver = () => {
  isSlideoverOpen.value = false;
  selectedThread.value = null;
};

const getStatusColor = (status: string) => {
  return status === "resolved" ? "emerald" : "blue";
};

const getStatusLabel = (status: string) => {
  return status === "resolved" ? "Terpecahkan" : "Terbuka";
};

const filteredDiscussions = computed(() =>
  discussions.filter((d) => {
    const matchesSearch =
      d.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      d.question.toLowerCase().includes(searchQuery.value.toLowerCase());
    const matchesFilter =
      filterStatus.value === "Semua" ||
      (filterStatus.value === "Belum Terjawab" && d.status === "open") ||
      (filterStatus.value === "Sudah Terpecahkan" && d.status === "resolved");
    return matchesSearch && matchesFilter;
  }),
);
</script>

<template>
  <div class="mt-5 space-y-5">
    <div
      class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:flex-row sm:items-center"
    >
      <UInput
        v-model="searchQuery"
        icon="i-lucide-search"
        placeholder="Cari topik diskusi..."
        class="min-w-0 flex-1"
      />
      <USelect
        v-model="filterStatus"
        :items="filterOptions"
        value-key="value"
        class="sm:w-48"
      />
      <UButton
        label="Buat Topik Baru"
        icon="i-lucide-plus"
        color="secondary"
        class="shrink-0"
        variant="subtle"
        :ui="{ base: 'cursor-pointer' }"
      />
    </div>
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-lg font-bold text-slate-950">Diskusi Materi</h2>
        <p class="text-sm text-slate-500">
          Tanya dan berbagi pemahaman dengan teman sekelas.
        </p>
      </div>
      <UButton
        :label="showForum ? 'Tampilkan Kosong' : 'Tampilkan Data'"
        color="secondary"
        variant="soft"
        size="sm"
        @click="showForum = !showForum"
      />
    </div>
    <div v-if="showForum && filteredDiscussions.length" class="space-y-3">
      <UCard
        v-for="thread in filteredDiscussions"
        :key="thread.id"
        class="cursor-pointer border border-slate-200 shadow-sm ring-0 transition-shadow hover:shadow-md bg-white"
        @click="openThread(thread)"
      >
        <div class="flex items-start justify-between gap-3">
          <UBadge :color="getStatusColor(thread.status)" variant="subtle">{{
            getStatusLabel(thread.status)
          }}</UBadge
          ><UIcon name="i-lucide-chevron-right" class="size-4 text-slate-300" />
        </div>
        <h3 class="mt-3 text-base font-bold leading-6 text-slate-900">
          {{ thread.title }}
        </h3>
        <div class="mt-4 flex items-center gap-2">
          <UAvatar :src="thread.avatar" :alt="thread.author" size="xs" /><span
            class="text-sm font-medium text-slate-700"
            >{{ thread.author }}</span
          ><span class="text-xs text-slate-400">· {{ thread.timeAgo }}</span>
        </div>
        <div
          class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3 text-xs text-slate-500"
        >
          <span class="flex items-center gap-1"
            ><UIcon name="i-lucide-message-circle" class="size-4" />{{
              thread.replies
            }}
            Balasan</span
          ><UBadge color="secondary" variant="outline">{{
            thread.category
          }}</UBadge>
        </div>
      </UCard>
    </div>
    <div
      v-else
      class="flex min-h-80 flex-col items-center justify-center rounded-xl border border-dashed border-slate-300 bg-white px-6 text-center"
    >
      <div
        class="mb-4 flex size-14 items-center justify-center rounded-full bg-blue-50 text-secondary"
      >
        <UIcon name="i-lucide-messages-square" class="size-7" />
      </div>
      <h2 class="text-lg font-bold">Belum ada diskusi di materi ini.</h2>
      <p class="mt-2 max-w-sm text-sm leading-6 text-slate-500">
        Jadilah yang pertama bertanya!
      </p>
    </div>
  </div>
  <StudentLearningSlideover
    v-model:open="isSlideoverOpen"
    :selectedThread="selectedThread"
  />
</template>
