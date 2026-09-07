<script setup lang="ts">
import type { Courses } from "~/types/courses";

defineProps<{
  courses: Courses[];
}>();

type Tone = keyof typeof toneMap;
</script>

<template>
  <UCard
    v-for="course in courses"
    :key="course.id"
    :ui="{ body: 'p-0' }"
    class="overflow-hidden bg-white shadow-sm rounded-2xl border border-slate-200 shadow-sm ring-0"
  >
    <div
      class="flex h-40 items-center justify-center"
      :class="toneMap['sky' as Tone].bg"
    >
      <div
        class="grid size-16 place-items-center rounded-2xl bg-white text-blue-600 shadow-sm ring-1 ring-slate-100"
      >
        <!-- <UIcon :name="course.icon" class="size-8" /> -->
        <UIcon name="i-lucide-shield-check" class="size-8" />
      </div>
    </div>
    <div class="flex min-h-[250px] flex-col p-5">
      <div class="flex items-start justify-between gap-3">
        <h2 class="text-lg font-bold leading-6 text-slate-900">
          {{ course.name }}
        </h2>
        <UBadge
          :label="course.academic_year"
          color="secondary"
          variant="soft"
          class="shrink-0"
        />
      </div>
      <p class="mt-2 text-sm text-slate-500">
        {{ course.id }} <span aria-hidden="true">•</span>
        {{ course.teacher_name }}
      </p>

      <div class="mt-auto pt-7">
        <div class="mb-2 flex items-center justify-between text-sm">
          <span class="font-medium text-slate-500">Progress</span>
          <span class="font-semibold text-slate-900"
            >{{ course.progress }}% Selesai</span
          >
        </div>
        <div
          class="h-2 overflow-hidden rounded-full bg-slate-100"
          role="progressbar"
          :aria-valuenow="course.progress"
          aria-valuemin="0"
          aria-valuemax="100"
          :aria-label="`${course.name} progress`"
        >
          <UProgress
            class="h-full rounded-full transition-all"
            :model-value="course.progress"
            color="secondary"
            :ui="{
              base: 'bg-gray-300!',
            }"
          />
        </div>
        <UButton
          label="Continue Learning"
          icon="i-lucide-arrow-right"
          trailing
          class="mt-5 w-full justify-center rounded-xl"
          color="secondary"
          variant="subtle"
          :ui="{ base: 'cursor-pointer ' }"
          :href="`/student/courses/${course.slug}`"
        />
      </div>
    </div>
  </UCard>
</template>
