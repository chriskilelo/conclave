<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
}>()
</script>

<template>
  <th
    data-slot="table-head"
    :class="cn('text-muted-foreground text-royalviolet-700 dark:text-slate-300 h-10 px-4 py-4 text-left text-md align-middle font-semibold whitespace-nowrap dark:bg-gray-900 [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]', props.class)"
  >
    <slot />
  </th>
</template>
