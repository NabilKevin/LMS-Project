<script setup lang="ts">
defineProps<{
  selectedThread?: Record<string, any> | null;
}>();

const isSlideoverOpen = defineModel("open", { type: Boolean, default: false });

const closeSlideOver = () => {
  isSlideoverOpen.value = false;
};
</script>

<template>
  <USlideover v-model:open="isSlideoverOpen" class="bg-white">
    <template #title>
      <h3 class="text-slate-900 font-bold pr-10 leading-snug">
        {{ selectedThread?.title || "Detail diskusi" }}
      </h3>
    </template>
    <template #description>
      <p v-if="selectedThread" class="text-slate-500">
        {{ selectedThread.author }} · {{ selectedThread.timeAgo }}
      </p>
    </template>
    <template #close>
      <UButton
        icon="i-lucide-x"
        color="secondary"
        variant="ghost"
        size="sm"
        @click="closeSlideOver"
        :ui="{ base: 'cursor-pointer' }"
      />
    </template>
    <template #body>
      <StudentCoursesLearningSlideoverBody :selectedThread="selectedThread" />
    </template>
  </USlideover>
</template>
