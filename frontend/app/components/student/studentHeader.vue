<script setup lang="ts">
import { useAuth } from "~/composables/api/useAuth";
import type { LoginResponse } from "~/types/auth";

const { user } = useAuth();
</script>

<template>
  <header
    class="flex h-20 items-center justify-between border-b border-slate-200 bg-white/90 px-5 backdrop-blur sm:px-8"
  >
    <div class="flex items-center gap-3">
      <UButton
        icon="i-lucide-menu"
        variant="ghost"
        color="secondary"
        class="lg:hidden"
        aria-label="Open navigation"
      />
      <!-- <div class="relative hidden sm:block">
        <UIcon
          name="i-lucide-search"
          class="absolute left-3 top-1/2 size-4 -translate-y-1/2 text-[#a5afbf]"
        /><input
          class="h-10 w-64 rounded-xl border border-[#e7ebf2] bg-[#f8fafc] pl-9 pr-3 text-sm outline-none transition placeholder:text-[#a5afbf] focus:border-[#93b4f7] focus:ring-2 focus:ring-blue-100"
          placeholder="Search anything..."
        />
      </div> -->
    </div>
    <div class="flex items-center gap-2 sm:gap-4">
      <UButton
        icon="i-lucide-search"
        variant="ghost"
        color="neutral"
        class="sm:hidden"
        aria-label="Search"
      /><UButton
        icon="i-lucide-bell"
        variant="ghost"
        color="secondary"
        aria-label="Notifications"
        :ui="{ base: 'cursor-pointer' }"
      />
      <div class="hidden h-7 w-px bg-[#e7ebf2] sm:block" />
      <UAvatar
        :src="user?.photo_url ?? '/images/photo_profile_null.jpeg'"
        :alt="user?.full_name ?? 'User avatar'"
        size="sm"
      />
      <div class="hidden sm:block">
        <p class="text-sm font-semibold">{{ user?.full_name }}</p>
        <p class="text-xs text-[#8693a7]">{{ user?.role }}</p>
      </div>
      <UIcon
        name="i-lucide-chevron-down"
        class="hidden size-4 text-[#9aa6b8] sm:block"
      />
    </div>
  </header>
</template>
