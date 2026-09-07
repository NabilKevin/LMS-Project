<script setup lang="ts">
const statusOptions = [
  {
    label: "Semua",
    value: "all",
  },
  {
    label: "Belum Selesai",
    value: "not completed",
  },
  {
    label: "Selesai",
    value: "completed",
  },
];

const props = defineProps<{
  handleSearch: (status: string, search: string) => void;
}>();

const selectedStatus = ref("all");
const search = ref("");

const debouncedQuery = refDebounced(search, 500);

watch(debouncedQuery, (searchValue) =>
  props.handleSearch(selectedStatus.value, searchValue),
);
watch(selectedStatus, (statusValue) =>
  props.handleSearch(statusValue, debouncedQuery.value),
);
</script>

<template>
  <div>
    <p class="mb-2 text-sm font-medium text-slate-500">Ruang Belajar</p>
    <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
      Mata Pelajaran
    </h1>
    <p class="mt-2 text-base text-slate-500">
      Kelola dan pantau kemajuan belajar Kamu.
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
        placeholder="Cari Mata Pelajaran..."
        aria-label="Cari Mata Pelajaran"
        class="h-11 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-4 text-sm text-slate-900 outline-none shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
      />
    </div>
    <USelect
      v-model="selectedStatus"
      :items="statusOptions"
      option-attribute="label"
      value-attribute="value"
      aria-label="Filter berdasarkan status"
      class="w-full sm:w-36"
      :ui="{
        base: 'bg-secondary-100 hover:bg-secondary-200 cursor-pointer text-secondary font-semibold',
        item: 'bg-secondary-100 hover:bg-secondary-200 hover:text-secondary-700! focus:text-secondary-700! cursor-pointer text-secondary font-semibold p-2',
        group: 'p-0',
      }"
      variant="subtle"
      color="secondary"
      highlight
    />
  </div>
</template>
