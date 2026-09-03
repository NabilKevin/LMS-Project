<script setup lang="ts">
definePageMeta({
  layout: "student-dashboard",
});
</script>

<template>
  <div class="mx-auto flex max-w-5xl flex-col gap-6">
    <StudentCourseHeader />

    <section aria-labelledby="syllabus-heading">
      <div class="mb-4 flex items-end justify-between">
        <div>
          <p class="text-sm font-semibold text-slate-950">Jalur pembelajaran</p>
          <h2
            id="syllabus-heading"
            class="mt-1 text-2xl font-bold tracking-tight text-slate-950"
          >
            Daftar Materi
          </h2>
        </div>
        <span class="hidden text-sm text-slate-400 sm:block"
          >4 bab · 12 materi</span
        >
      </div>

      <StudentCourseAccordion />
    </section>
  </div>
</template>
