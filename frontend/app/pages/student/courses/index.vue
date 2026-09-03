<script setup lang="ts">
definePageMeta({
  layout: "student-dashboard",
});

const statusOptions = ["Active", "Completed"];

const courses = [
  {
    title: "Introduction to Algorithms",
    code: "CS-101",
    instructor: "Dr. Budi Santoso",
    year: "2026/2027",
    progress: 65,
    icon: "i-lucide-binary",
    tone: "blue",
  },
  {
    title: "Database Systems",
    code: "IT-202",
    instructor: "Prof. Ratna Sari",
    year: "2026/2027",
    progress: 42,
    icon: "i-lucide-database",
    tone: "indigo",
  },
  {
    title: "Human Computer Interaction",
    code: "DES-204",
    instructor: "Dr. Maya Pratama",
    year: "2026/2027",
    progress: 88,
    icon: "i-lucide-panels-top-left",
    tone: "sky",
  },
  {
    title: "Computer Networks",
    code: "CS-210",
    instructor: "Ir. Dimas Wijaya",
    year: "2026/2027",
    progress: 31,
    icon: "i-lucide-network",
    tone: "blue",
  },
  {
    title: "Information Security",
    code: "IT-305",
    instructor: "Dr. Nia Permata",
    year: "2026/2027",
    progress: 74,
    icon: "i-lucide-shield-check",
    tone: "indigo",
  },
  {
    title: "Software Engineering",
    code: "SE-301",
    instructor: "Prof. Arif Hidayat",
    year: "2026/2027",
    progress: 55,
    icon: "i-lucide-layers-3",
    tone: "sky",
  },
];

const selectedStatus = ref("Active");
const selectedYear = ref("2026/2027");
const search = ref("");

const filteredCourses = computed(() =>
  courses.filter((course) =>
    `${course.title} ${course.code} ${course.instructor}`
      .toLowerCase()
      .includes(search.value.toLowerCase()),
  ),
);
</script>

<template>
  <main
    class="min-h-screen bg-slate-50 px-4 py-8 text-slate-900 sm:px-6 lg:px-8"
  >
    <div class="mx-auto max-w-7xl">
      <section
        class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between"
      >
        <div>
          <p class="mb-2 text-sm font-medium text-slate-500">
            Learning workspace
          </p>
          <h1
            class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl"
          >
            My Courses
          </h1>
          <p class="mt-2 text-base text-slate-500">
            Manage and track your learning progress.
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
              placeholder="Search courses..."
              aria-label="Search courses"
              class="h-11 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-4 text-sm text-slate-900 outline-none shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            />
          </div>
          <USelect
            v-model="selectedStatus"
            :items="statusOptions"
            aria-label="Filter by status"
            class="w-full sm:w-36"
          />
        </div>
      </section>

      <section
        class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3"
      >
        <UCard
          v-for="course in filteredCourses"
          :key="course.code"
          :ui="{ body: 'p-0' }"
          class="overflow-hidden bg-white shadow-sm rounded-2xl border border-slate-200 shadow-sm ring-0"
        >
          <div
            class="flex h-40 items-center justify-center"
            :class="
              course.tone === 'blue'
                ? 'bg-blue-50'
                : course.tone === 'indigo'
                  ? 'bg-indigo-50'
                  : 'bg-sky-50'
            "
          >
            <div
              class="grid size-16 place-items-center rounded-2xl bg-white text-blue-600 shadow-sm ring-1 ring-slate-100"
            >
              <UIcon :name="course.icon" class="size-8" />
            </div>
          </div>
          <div class="flex min-h-[250px] flex-col p-5">
            <div class="flex items-start justify-between gap-3">
              <h2 class="text-lg font-bold leading-6 text-slate-900">
                {{ course.title }}
              </h2>
              <UBadge
                :label="course.year"
                color="secondary"
                variant="soft"
                class="shrink-0"
              />
            </div>
            <p class="mt-2 text-sm text-slate-500">
              {{ course.code }} <span aria-hidden="true">•</span>
              {{ course.instructor }}
            </p>

            <div class="mt-auto pt-7">
              <div class="mb-2 flex items-center justify-between text-sm">
                <span class="font-medium text-slate-500">Progress</span>
                <span class="font-semibold text-slate-900"
                  >{{ course.progress }}% Completed</span
                >
              </div>
              <div
                class="h-2 overflow-hidden rounded-full bg-slate-100"
                role="progressbar"
                :aria-valuenow="course.progress"
                aria-valuemin="0"
                aria-valuemax="100"
                :aria-label="`${course.title} progress`"
              >
                <UProgress
                  class="h-full rounded-full transition-all"
                  :model-value="course.progress"
                  color="secondary"
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
                :href="`/student/courses/${course.title.toLowerCase().replace(/\s+/g, '-')}`"
              />
            </div>
          </div>
        </UCard>
      </section>

      <div
        v-if="filteredCourses.length === 0"
        class="mt-8 rounded-2xl border border-slate-200 bg-white p-10 text-center shadow-sm"
      >
        <UIcon name="i-lucide-search-x" class="mx-auto size-8 text-slate-400" />
        <p class="mt-3 font-semibold text-slate-900">No courses found</p>
        <p class="mt-1 text-sm text-slate-500">
          Try a different course name or code.
        </p>
      </div>
    </div>
  </main>
</template>
