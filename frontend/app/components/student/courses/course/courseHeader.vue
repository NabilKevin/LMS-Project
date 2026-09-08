<script setup lang="ts">
import type { Course } from "~/types/courses";

defineProps<{
  course?: Course;
}>();
</script>

<template>
  <UCard
    class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm ring-0"
    :ui="{ body: 'p-0 sm:px-1 sm:py-4 bg-white' }"
  >
    <div class="p-6 sm:p-8">
      <UBreadcrumb
        :items="[
          { label: 'Kursus Saya', to: '/student/courses' },
          { label: course?.course_name },
        ]"
        class="mb-7"
        color="secondary"
      />
      <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
        <div class="max-w-2xl">
          <UBadge color="secondary" variant="subtle" class="mb-3">{{
            course?.class_name
          }}</UBadge>
          <h1
            class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl"
          >
            {{ course?.course_name }}
          </h1>
          <div class="mt-3 flex items-center gap-2 text-sm text-slate-500">
            <UIcon name="i-lucide-user-round" class="size-4" />
            <span
              >Pengajar:
              <strong class="font-semibold text-slate-700">{{
                course?.teacher_name
              }}</strong></span
            >
          </div>
        </div>
        <div class="w-full md:max-w-xs">
          <div class="mb-2 flex items-center justify-between text-sm">
            <span class="font-medium text-slate-600">Kemajuan kursus</span>
            <span class="font-bold text-secondary"
              >{{ course?.progress }}%</span
            >
          </div>
          <UProgress
            :model-value="course?.progress"
            color="secondary"
            size="md"
            :ui="{
              base: 'bg-gray-300!',
            }"
          />
          <p class="mt-2 text-xs text-slate-400">
            {{ course?.total_topics }} dari
            {{ course?.total_sub_topics }} materi selesai
          </p>
        </div>
      </div>
    </div>
  </UCard>
</template>
