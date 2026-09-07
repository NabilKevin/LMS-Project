<script setup lang="ts">
import { useCourses } from "~/composables/api/useCourses";
import type { Courses } from "~/types/courses";
import type { Pagination } from "~/types/pagination";

definePageMeta({
  layout: "student-dashboard",
});

const { getCourses } = useCourses();
const { error } = useAppToast();

const courses = ref<Courses[]>([]);
const paginationData = ref<Pagination>();
const page = ref(1);
const loading = ref(true);

const handleSearch = (status: string, search?: string) => {
  fetch(status, search);
};

const fetch = async (status: string = "all", search?: string) => {
  loading.value = true;

  try {
    const { data, pagination } = await getCourses(page.value, status, search);
    courses.value = [...data];
    paginationData.value = pagination;
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
  <div class="mx-auto max-w-7xl">
    <section
      class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between"
    >
      <StudentCoursesHeader :handleSearch="handleSearch" />
    </section>
    <section class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
      <StudentCoursesCardSkeleton v-if="loading" />
      <StudentCoursesCard v-else :courses="courses" />
    </section>

    <div
      v-if="courses?.length === 0 && !loading"
      class="mt-8 rounded-2xl border border-slate-200 bg-white p-10 text-center shadow-sm"
    >
      <UIcon name="i-lucide-search-x" class="mx-auto size-8 text-slate-400" />
      <p class="mt-3 font-semibold text-slate-900">No courses found</p>
      <p class="mt-1 text-sm text-slate-500">
        Try a different course name or code.
      </p>
    </div>
  </div>
</template>
