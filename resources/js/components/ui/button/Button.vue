<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { Primitive, type PrimitiveProps } from 'reka-ui'
import { cn } from '@/lib/utils'
import { type ButtonVariants, buttonVariants } from '.'

interface Props extends PrimitiveProps {
  variant?: ButtonVariants['variant']
  size?: ButtonVariants['size']
  class?: HTMLAttributes['class']
}

const props = withDefaults(defineProps<Props>(), {
  as: 'button',
})
</script>

<template>
  <Primitive data-slot="button" :as="as" :as-child="asChild" :class="cn(
    buttonVariants({ variant, size }), props.class,
    'p-6 font-bold text-md w-full md:w-auto rounded',
    'hover:bg-royalviolet-600 hover:text-white dark:hover:text-black dark:bg-green-600 dark:hover:bg-green-400')">
    <slot />
  </Primitive>
</template>
