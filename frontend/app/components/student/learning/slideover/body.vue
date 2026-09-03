<script setup lang="ts">
defineProps({
  selectedThread: Object,
});

const replyText = ref("");

const sendReply = () => {
  if (replyText.value.trim()) {
    replyText.value = "";
  }
};
</script>

<template>
  <div v-if="selectedThread" class="flex h-full flex-col">
    <div class="border-b border-slate-200 pb-5">
      <div class="flex items-center gap-2">
        <UAvatar
          :src="selectedThread.avatar"
          :alt="selectedThread.author"
          size="sm"
        />
        <div>
          <p class="text-sm font-semibold text-slate-800">
            {{ selectedThread.author }}
          </p>
          <p class="text-xs text-slate-400">
            {{ selectedThread.timeAgo }}
          </p>
        </div>
      </div>
      <div class="mt-5 rounded-xl bg-white p-4">
        <p
          class="text-xs font-semibold uppercase tracking-wider text-slate-400"
        >
          Pertanyaan
        </p>
        <p class="mt-2 text-sm leading-6 text-slate-700">
          {{ selectedThread.question }}
        </p>
      </div>
    </div>
    <div class="min-h-0 flex-1 overflow-y-auto py-5">
      <h3 class="mb-4 text-sm font-bold text-slate-900">
        {{ selectedThread.replies }} Balasan
      </h3>
      <div class="space-y-5">
        <div v-for="reply in selectedThread.repliesData" :key="reply.id">
          <div class="flex gap-3">
            <UAvatar :src="reply.avatar" :alt="reply.author" size="sm" />
            <div class="min-w-0 flex-1">
              <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm font-semibold text-slate-800">{{
                  reply.author
                }}</span>
                <UBadge
                  v-if="reply.role"
                  color="amber"
                  variant="subtle"
                  size="sm"
                  >{{ reply.role }}</UBadge
                >
                <span class="text-xs text-slate-400">{{ reply.timeAgo }}</span>
              </div>
              <p class="mt-2 text-sm leading-6 text-slate-600">
                {{ reply.text }}
              </p>
            </div>
          </div>
          <div
            v-for="nested in reply.nested"
            :key="nested.id"
            class="ml-8 mt-4 border-l-2 border-slate-200 pl-4"
          >
            <div class="flex gap-3">
              <UAvatar :src="nested.avatar" :alt="nested.author" size="xs" />
              <div>
                <div class="flex flex-wrap items-center gap-2">
                  <span class="text-sm font-semibold text-slate-800">{{
                    nested.author
                  }}</span>
                  <UBadge
                    v-if="nested.role"
                    color="amber"
                    variant="subtle"
                    size="sm"
                    >{{ nested.role }}</UBadge
                  >
                  <span class="text-xs text-slate-400">{{
                    nested.timeAgo
                  }}</span>
                </div>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                  {{ nested.text }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sticky bottom-0 border-t border-slate-200 bg-white pt-4">
      <div class="mb-2 flex items-center gap-1">
        <UButton
          icon="i-lucide-bold"
          color="secondary"
          variant="ghost"
          size="xs"
          aria-label="Tebal"
        />
        <UButton
          icon="i-lucide-italic"
          color="secondary"
          variant="ghost"
          size="xs"
          aria-label="Miring"
        />
        <UButton
          icon="i-lucide-code"
          color="secondary"
          variant="ghost"
          size="xs"
          aria-label="Kode"
        />
        <UButton
          icon="i-lucide-paperclip"
          color="secondary"
          variant="ghost"
          size="xs"
          aria-label="Lampiran"
        />
      </div>
      <UTextarea v-model="replyText" placeholder="Tulis balasan..." :rows="3" />
      <UButton
        label="Kirim Balasan"
        icon="i-lucide-send"
        color="secondary"
        class="mt-3 w-full"
        variant="subtle"
        @click="sendReply"
        :ui="{ base: 'cursor-pointer' }"
      />
    </div>
  </div>
</template>
