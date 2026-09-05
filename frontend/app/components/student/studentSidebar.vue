<script setup lang="ts">
import type { LoginResponse } from "~/types/auth";

const navItems = [
  {
    label: "Dashboard",
    icon: "i-lucide-layout-dashboard",
    to: "/student",
  },
  {
    label: "Mata Pelajaran",
    icon: "i-lucide-book-open",
    to: "/student/courses",
  },
  // {
  //   label: "Assignments",
  //   icon: "i-lucide-clipboard-check",
  //   to: "/student/assignments",
  // },
  // {
  //   label: "Calendar",
  //   icon: "i-lucide-calendar-days",
  //   to: "/student/calendar",
  // },
];

const route = useRoute();

const { user, logout } = useAuth();
const { success, error } = useAppToast();

const handleLogout = async () => {
  const modalBody = {
    title: "Apakah anda yakin ingin logout?",
    btnText1: "Cancel",
    btnText2: "Yes",
  };

  const { confirm } = useAppModalConfirmation();

  const confirmation = await confirm(modalBody);

  if (confirmation) {
    try {
      await logout();
      success("Success logout!");
    } catch {
      error("Failed logout!");
    }
  }
};
</script>

<template>
  <aside
    class="fixed inset-y-0 left-0 hidden w-64 border-r border-slate-200 bg-white text-slate-900 lg:flex lg:flex-col"
  >
    <div class="flex h-20 items-center gap-3 border-b border-slate-200 px-7">
      <div class="grid size-9 place-items-center rounded-xl">
        <img src="/images/favicon.png" alt="Logo" />
      </div>
      <span class="text-lg font-bold tracking-tight text-[#172238]"
        >LMS Portal</span
      >
    </div>
    <nav class="flex-1 space-y-1 px-4 py-7" aria-label="Main navigation">
      <p
        class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.16em] text-[#9aa6b8]"
      >
        Workspace
      </p>
      <UButton
        v-for="item in navItems"
        :key="item.label"
        :label="item.label"
        :icon="item.icon"
        :variant="route.path === item.to ? 'soft' : 'ghost'"
        :color="route.path === item.to ? 'secondary' : 'neutral'"
        :href="item.to"
        block
        class="justify-start rounded-xl px-3 py-2.5 font-medium text-slate-900 hover:bg-slate-100 active:bg-slate-300"
        :ui="{ base: 'cursor-pointer' }"
      />
    </nav>
    <div class="border-t border-slate-200 p-4">
      <UButton
        label="Settings"
        icon="i-lucide-settings"
        variant="ghost"
        color="neutral"
        block
        class="justify-start rounded-xl text-slate-900 hover:bg-slate-100 py-3"
        :ui="{ base: 'cursor-pointer' }"
      />
      <UButton
        label="Log Out"
        icon="i-lucide-log-out"
        variant="ghost"
        color="error"
        block
        class="justify-start rounded-xl py-3"
        :ui="{ base: 'cursor-pointer' }"
        @click="handleLogout"
      />
      <div class="mt-4 flex items-center gap-3 rounded-xl bg-[#f7f9fc] p-3">
        <UAvatar
          :src="user?.photo_url ?? '/images/photo_profile_null.jpeg'"
          :alt="user?.full_name"
          size="sm"
        />
        <div class="min-w-0 flex-1">
          <p class="truncate text-sm font-semibold">{{ user?.full_name }}</p>
          <p class="truncate text-xs text-[#8693a7]">{{ user?.role }}</p>
        </div>
        <UIcon name="i-lucide-ellipsis" class="size-4 text-[#9aa6b8]" />
      </div>
    </div>
  </aside>
</template>
