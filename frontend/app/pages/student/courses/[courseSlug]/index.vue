<script setup lang="ts">
import { useCourses } from "~/composables/api/useCourses";
import type { Course } from "~/types/courses";

definePageMeta({
  layout: "student-dashboard",
});

const route = useRoute();
const slug = computed<string>(() => {
  const param = route.params.courseSlug;
  if (Array.isArray(param)) return param[0] ?? "";
  return param ?? "";
});

const course = ref<Course>();
const loading = ref(true);

const { getCourse } = useCourses();
const { error } = useAppToast();

const fetch = async () => {
  loading.value = true;

  try {
    const { data } = await getCourse(slug.value);
    console.log(data);
    course.value = data;
  } catch (er: any) {
    if (import.meta.client) {
      error("Failed to get courses, please refresh the page!");
    }
  } finally {
    loading.value = false;
  }
};

fetch();
</script>

<template>
  <div class="mx-auto flex max-w-5xl flex-col gap-6">
    <StudentCoursesCourseHeaderSkeleton v-if="loading" />
    <StudentCoursesCourseHeader v-else :course="course" />

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
        <span
          v-if="loading"
          class="hidden text-sm text-slate-400 sm:block items-center justify-center"
        >
          <USkeleton class="h-3 w-2 inline-block" /> bab ·
          <USkeleton class="h-3 w-2 inline-block" /> materi
        </span>
        <span v-else class="hidden text-sm text-slate-400 sm:block"
          >{{ course?.total_topics }} bab ·
          {{ course?.total_sub_topics }} materi
        </span>
      </div>

      <StudentCoursesCourseAccordionSkeleton v-if="loading" />
      <StudentCoursesCourseAccordion v-else :topics="course?.topics" />
    </section>
  </div>
</template>
