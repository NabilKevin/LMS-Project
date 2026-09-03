<script setup lang="ts">
import type { LoginResponse } from "~/types/auth";

definePageMeta({
  layout: "student-dashboard",
});

const courses = [
  {
    title: "Introduction to Psychology",
    code: "PSYC 101 · Dr. Sarah Johnson",
    progress: 78,
    tone: "blue",
    icon: "i-lucide-brain-circuit",
  },
  {
    title: "Web Development Fundamentals",
    code: "CS 120 · Prof. Michael Chen",
    progress: 56,
    tone: "violet",
    icon: "i-lucide-code-2",
  },
  {
    title: "Academic Writing & Research",
    code: "ENG 105 · Dr. Emily Davis",
    progress: 92,
    tone: "amber",
    icon: "i-lucide-notebook-pen",
  },
];

const deadlines = [
  {
    title: "Research Paper Outline",
    course: "Academic Writing & Research",
    date: "Today · 11:59 PM",
    icon: "i-lucide-file-text",
    tone: "red",
  },
  {
    title: "JavaScript Functions Quiz",
    course: "Web Development Fundamentals",
    date: "Tomorrow · 9:00 AM",
    icon: "i-lucide-code-2",
    tone: "amber",
  },
  {
    title: "Chapter 7 Reading",
    course: "Introduction to Psychology",
    date: "Sep 02 · 11:59 PM",
    icon: "i-lucide-book-open",
    tone: "blue",
  },
];

const stats = [
  {
    label: "Progres keseluruhan",
    value: "74%",
    detail: "+6% dari minggu lalu",
    icon: "i-lucide-trending-up",
    tone: "blue",
  },
  {
    label: "Pembelajaran yang telah diselesaikan",
    value: "12",
    detail: "2 semester sekarang",
    icon: "i-lucide-graduation-cap",
    tone: "green",
  },
  {
    label: "Runtutan belajar saat ini",
    value: "14 days",
    detail: "Pertahankan!",
    icon: "i-lucide-flame",
    tone: "orange",
  },
];

const user = useCookie<LoginResponse["user"]>("user_data");

const date = new Date();
</script>

<template>
  <section class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
    <div>
      <p class="mb-2 text-sm font-medium text-[#6f7e94]">
        {{
          date.toLocaleDateString("id-ID", {
            weekday: "long",
            month: "long",
            day: "numeric",
            year: "numeric",
          })
        }}
      </p>
      <h1 class="text-3xl font-bold tracking-tight text-[#172238] sm:text-4xl">
        Selamat Pagi, {{ user?.full_name }}
      </h1>
      <p class="mt-2 text-[#6f7e94]">
        Inilah perkembangan belajar Anda hari ini.
      </p>
    </div>
    <UButton
      label="Lihat Kalender"
      icon="i-lucide-calendar-days"
      variant="outline"
      color="secondary"
      class="w-fit rounded-xl bg-white"
      :ui="{ base: 'cursor-pointer' }"
    />
  </section>

  <section
    class="mt-8 rounded-2xl bg-[#2563eb] p-6 text-white shadow-lg shadow-blue-100 sm:p-8"
  >
    <div
      class="flex flex-col justify-between gap-8 md:flex-row md:items-center"
    >
      <div>
        <p class="text-sm font-medium text-blue-100">Perjalanan belajarmu</p>
        <h2 class="mt-2 text-2xl font-bold tracking-tight sm:text-3xl">
          Langkah kecil setiap hari<br class="hidden sm:block" />
          menghasilkan hasil yang besar.
        </h2>
        <p class="mt-3 max-w-md text-sm leading-6 text-blue-100">
          Progresmu semester ini keren banget. Jaga terus semangatmu!
        </p>
        <UButton
          label="Lanjutkan belajar"
          trailing-icon="i-lucide-arrow-right"
          color="secondary"
          class="mt-6 rounded-xl border-0 bg-white text-[#2563eb] hover:bg-slate-100"
          :ui="{ base: 'cursor-pointer' }"
        />
      </div>
      <div
        class="relative grid size-36 shrink-0 place-items-center self-end rounded-full border-[10px] border-blue-400/50 md:mr-10 md:self-auto"
      >
        <div
          class="absolute inset-0 rounded-full border-[10px] border-white border-b-transparent border-l-transparent"
          style="transform: rotate(30deg)"
        />
        <div class="text-center">
          <p class="text-3xl font-bold">74%</p>
          <p class="text-[11px] font-medium text-blue-100">
            Progres keseluruhan
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-6 grid gap-4 md:grid-cols-3">
    <UCard
      v-for="stat in stats"
      :key="stat.label"
      :ui="{ body: 'p-5 sm:p-6' }"
      class="rounded-2xl border border-slate-200 bg-white shadow-sm ring-0"
      ><div class="flex items-start justify-between">
        <div>
          <p class="text-sm font-medium text-[#6f7e94]">
            {{ stat.label }}
          </p>
          <p class="mt-2 text-2xl font-bold tracking-tight">
            {{ stat.value }}
          </p>
          <p
            class="mt-1 text-xs font-medium"
            :class="
              stat.tone === 'blue'
                ? 'text-[#2563eb]'
                : stat.tone === 'green'
                  ? 'text-[#16a36b]'
                  : 'text-[#ed8b2f]'
            "
          >
            {{ stat.detail }}
          </p>
        </div>
        <div
          class="grid size-10 place-items-center rounded-xl"
          :class="
            stat.tone === 'blue'
              ? 'bg-blue-50 text-blue-600'
              : stat.tone === 'green'
                ? 'bg-emerald-50 text-emerald-600'
                : 'bg-orange-50 text-orange-600'
          "
        >
          <UIcon :name="stat.icon" class="size-5" />
        </div></div
    ></UCard>
  </section>

  <div class="mt-8 grid gap-8 xl:grid-cols-[1fr_390px]">
    <section>
      <div class="mb-4 flex items-center justify-between">
        <div>
          <h2 class="text-xl font-bold tracking-tight">Lanjutkan belajar</h2>
          <p class="mt-1 text-sm text-[#6f7e94]">Lanjut dari materi terakhir</p>
        </div>
        <UButton
          label="View all courses"
          variant="link"
          color="secondary"
          trailing-icon="i-lucide-arrow-right"
          class="px-0"
          :ui="{ base: 'cursor-pointer' }"
        />
      </div>
      <div class="space-y-3">
        <UCard
          v-for="course in courses"
          :key="course.title"
          :ui="{ body: 'p-4 sm:p-5' }"
          class="rounded-2xl border border-slate-200 bg-white shadow-sm ring-0"
          ><div class="flex items-center gap-4">
            <div
              class="grid size-11 shrink-0 place-items-center rounded-xl"
              :class="
                course.tone === 'blue'
                  ? 'bg-blue-50 text-blue-600'
                  : course.tone === 'violet'
                    ? 'bg-violet-50 text-violet-600'
                    : 'bg-amber-50 text-amber-600'
              "
            >
              <UIcon :name="course.icon" class="size-5" />
            </div>
            <div class="min-w-0 flex-1">
              <div
                class="flex flex-col justify-between gap-1 sm:flex-row sm:items-center"
              >
                <h3 class="truncate text-sm font-bold">
                  {{ course.title }}
                </h3>
                <span class="text-sm font-bold text-[#172238]"
                  >{{ course.progress }}%</span
                >
              </div>
              <p class="mt-1 truncate text-xs text-[#6d7a90]">
                {{ course.code }}
              </p>
              <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-[#edf0f5]">
                <div
                  class="h-full rounded-full bg-[#2563eb]"
                  :style="{ width: `${course.progress}%` }"
                />
              </div>
            </div>
            <UButton
              icon="i-lucide-arrow-up-right"
              variant="ghost"
              color="secondary"
              class="hidden sm:flex"
              aria-label="Open course"
              :ui="{ base: 'cursor-pointer' }"
            /></div
        ></UCard>
      </div>
    </section>

    <section>
      <div class="mb-4 flex items-center justify-between">
        <div>
          <h2 class="text-xl font-bold tracking-tight">
            Tenggat waktu terdekat
          </h2>
          <p class="mt-1 text-sm text-[#6f7e94]">
            Jangan sampai ada yang terlewat
          </p>
        </div>
        <UButton
          icon="i-lucide-ellipsis"
          variant="ghost"
          color="secondary"
          aria-label="More deadline options"
          :ui="{ base: 'cursor-pointer' }"
        />
      </div>
      <UCard
        :ui="{ body: 'p-2 sm:p-3' }"
        class="rounded-2xl border border-slate-200 bg-white shadow-sm ring-0"
        ><div class="divide-y divide-[#edf0f5]">
          <div
            v-for="deadline in deadlines"
            :key="deadline.title"
            class="flex items-center gap-3 p-3"
          >
            <div
              class="grid size-10 shrink-0 place-items-center rounded-xl"
              :class="
                deadline.tone === 'red'
                  ? 'bg-red-50 text-red-500'
                  : deadline.tone === 'amber'
                    ? 'bg-amber-50 text-amber-600'
                    : 'bg-blue-50 text-blue-600'
              "
            >
              <UIcon :name="deadline.icon" class="size-4" />
            </div>
            <div class="min-w-0 flex-1">
              <p class="truncate text-sm font-semibold">
                {{ deadline.title }}
              </p>
              <p class="mt-1 truncate text-xs text-[#6d7a90]">
                {{ deadline.course }}
              </p>
              <p
                class="mt-1 text-xs font-medium"
                :class="
                  deadline.tone === 'red' ? 'text-red-500' : 'text-[#6d7a90]'
                "
              >
                {{ deadline.date }}
              </p>
            </div>
            <UIcon
              name="i-lucide-chevron-right"
              class="size-4 shrink-0 text-[#b0bac8]"
            />
          </div>
        </div>
        <UButton
          label="View all assignments"
          variant="link"
          color="secondary"
          class="m-3 px-0"
          :ui="{ base: 'cursor-pointer' }"
      /></UCard>
    </section>
  </div>
</template>
