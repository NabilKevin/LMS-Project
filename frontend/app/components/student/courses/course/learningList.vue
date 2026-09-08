<script setup lang="ts">
import type { SubTopic } from "~/types/topics";

defineProps<{
  subTopic?: SubTopic[];
}>();

const formatConfig: Record<string, { icon: string; class: string }> = {
  pdf: {
    icon: "i-lucide-file-text",
    class: "size-5 shrink-0 text-rose-500",
  },
  text: {
    icon: "i-lucide-notebook-text",
    class: "size-5 shrink-0 text-blue-500",
  },
  slide: {
    icon: "i-lucide-presentation",
    class: "size-5 shrink-0 text-amber-500",
  },
  video: {
    icon: "i-lucide-video",
    class: "size-5 shrink-0 text-purple-500",
  },
};

const defaultConfig = {
  icon: "i-lucide-file",
  class: "size-5 shrink-0 text-slate-400",
};
</script>

<template>
  <div
    v-if="subTopic?.length"
    class="divide-y divide-slate-100 border-t border-slate-100 bg-white"
  >
    <div
      v-for="material in subTopic"
      :key="material.name"
      class="flex min-h-20 items-center justify-between gap-4 px-5 py-4 transition-colors hover:bg-slate-50 cursor-pointer"
    >
      <div class="flex min-w-0 items-center gap-4">
        <UIcon
          :name="(formatConfig[material.content_format] || defaultConfig).icon"
          :class="
            (formatConfig[material.content_format] || defaultConfig).class
          "
        />
        <div class="min-w-0">
          <p class="truncate text-sm font-bold text-slate-800">
            {{ material.name }}
          </p>
          <p class="mt-1 text-xs text-slate-400">
            {{ capitalize(material.content_format) }}
          </p>
        </div>
      </div>
      <UIcon
        v-if="material.is_completed"
        name="i-lucide-check-circle-2"
        class="size-5 shrink-0 text-emerald-500"
      />
      <UIcon
        v-else
        name="i-lucide-lock"
        class="size-5 shrink-0 text-slate-300"
      />
    </div>
  </div>
  <div
    v-else
    class="border-t border-slate-100 bg-white px-5 py-6 text-sm text-slate-400"
  >
    Materi akan segera tersedia.
  </div>
</template>
