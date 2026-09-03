<script setup lang="ts">
definePageMeta({
  layout: "student-dashboard",
});
const tabs = [
  {
    label: "Materi Pembelajaran",
    icon: "i-lucide-book-open",
    slot: "learning",
  },
  { label: "Forum Diskusi", icon: "i-lucide-messages-square", slot: "forum" },
];
</script>

<template>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <UBreadcrumb
      :items="[
        { label: 'Matematika', to: '#' },
        { label: 'Bab 1', to: '#' },
        { label: '1.1 Pengenalan' },
      ]"
      class="mb-5"
      color="secondary"
    />
    <StudentLearningHeader />
    <div
      class="grid items-start gap-6 lg:grid-cols-[minmax(0,7fr)_minmax(280px,3fr)]"
    >
      <section>
        <UTabs :items="tabs" class="w-full" variant="link" color="secondary">
          <template #learning>
            <StudentLearningTab />
          </template>
          <template #forum>
            <StudentLearningForumTab />
          </template>
        </UTabs>
      </section>
      <StudentLearningSidebar />
    </div>
  </div>
</template>

<style>
:root {
  color-scheme: light;
}
</style>
