<script setup lang="ts">
import type { Topic } from "~/types/topics";
defineProps<{
  topics?: Topic[];
}>();
</script>

<template>
  <UAccordion
    :items="topics"
    type="multiple"
    :default-value="['0']"
    :ui="{
      item: 'border-b-0',
      trigger: 'px-5 py-5 text-base',
      content: 'px-0 pb-0',
    }"
    class="bg-white cursor-pointer rounded-2xl border border-slate-200 shadow-sm"
    v-if="topics?.length"
  >
    <template #leading="{ item }">
      <div
        class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-secondary"
      >
        <!-- <UIcon :name="item.icon" class="size-5" /> -->
        <UIcon name="i-lucide-layers-2" class="size-5" />
      </div>
    </template>
    <template #default="{ item }">
      <div class="flex min-w-0 flex-1 flex-col text-left">
        <span class="font-bold text-slate-800">{{ item.topic_name }}</span>
        <span class="mt-0.5 text-xs font-normal text-slate-400">{{
          item.topic_name
        }}</span>
      </div>
    </template>
    <template #body="{ item }">
      <StudentCoursesCourseLearningList :sub-topic="item.sub_topic" />
    </template>
  </UAccordion>
  <div
    v-else
    class="border-t border-slate-100 bg-white px-5 py-6 text-md font-medium text-slate-400 text-center"
  >
    Materi akan segera tersedia.
  </div>
</template>
