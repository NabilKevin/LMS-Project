<script setup lang="ts">
definePageMeta({
  layout: "student-dashboard",
});

const statusOptions = ["Active", "Completed"];

const courses = [
  {
    title: "Introduction to Algorithms",
    status: "Active",
    code: "CS-101",
    instructor: "Dr. Budi Santoso",
    year: "2026/2027",
    progress: 65,
    icon: "i-lucide-binary",
    tone: "blue",
  },
  {
    title: "Database Systems",
    status: "Active",
    code: "IT-202",
    instructor: "Prof. Ratna Sari",
    year: "2026/2027",
    progress: 42,
    icon: "i-lucide-database",
    tone: "indigo",
  },
  {
    title: "Human Computer Interaction",
    status: "Active",
    code: "DES-204",
    instructor: "Dr. Maya Pratama",
    year: "2026/2027",
    progress: 88,
    icon: "i-lucide-panels-top-left",
    tone: "sky",
  },
  {
    title: "Computer Networks",
    status: "Active",
    code: "CS-210",
    instructor: "Ir. Dimas Wijaya",
    year: "2026/2027",
    progress: 31,
    icon: "i-lucide-network",
    tone: "blue",
  },
  {
    title: "Information Security",
    status: "Active",
    code: "IT-305",
    instructor: "Dr. Nia Permata",
    year: "2026/2027",
    progress: 74,
    icon: "i-lucide-shield-check",
    tone: "indigo",
  },
  {
    title: "Software Engineering",
    status: "Active",
    code: "SE-301",
    instructor: "Prof. Arif Hidayat",
    year: "2026/2027",
    progress: 55,
    icon: "i-lucide-layers-3",
    tone: "sky",
  },
];

const selectedStatus = ref("Active");
const search = ref("");

const filteredCourses = computed(() =>
  courses.filter((course) => {
    const matchesSearch = `${course.title} ${course.code} ${course.instructor}`
      .toLowerCase()
      .includes(search.value.toLowerCase());
    const matchesStatus =
      selectedStatus.value === "All" || course.status === selectedStatus.value;
    return matchesSearch && matchesStatus;
  }),
);
</script>

<template>
  <div class="mx-auto max-w-7xl">
    <section
      class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between"
    >
      <StudentCoursesHeader
        :selectedStatus="selectedStatus"
        :statusOptions="statusOptions"
        :search="search"
      />
    </section>
    <section class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
      <StudentCoursesCard :filteredCourses="filteredCourses" />
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
</template>
