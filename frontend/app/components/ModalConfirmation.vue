<script setup lang="ts">
defineProps<{
  title: string;
  btnText1: string;
  btnText2: string;
}>();

const emit = defineEmits<{ close: [boolean] }>();
</script>

<template>
  <UModal
    :close="{
      onClick: () => emit('close', false),
      class:
        'text-gray-500 cursor-pointer font-bold hover:bg-slate-100 active:bg-slate-300',
    }"
    :title="title"
    :ui="{
      content: 'bg-white ring-white',
      title: 'text-black',
    }"
  >
    <template #footer>
      <div class="flex gap-2">
        <UButton
          color="neutral"
          variant="outline"
          :label="btnText1"
          class="cursor-pointer bg-white text-black hover:bg-slate-100 active:bg-slate-300"
          @click="emit('close', false)"
        />
        <UButton
          color="secondary"
          class="text-white cursor-pointer"
          :label="btnText2"
          @click="emit('close', true)"
        />
      </div>
    </template>
  </UModal>
</template>
