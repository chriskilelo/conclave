<script setup lang="ts">
import { Button } from "@/components/ui/button";
import { type ButtonHTMLAttributes } from "vue";

const props = defineProps<{
    loading?: boolean;
    disabled?: boolean;
    type?: ButtonHTMLAttributes["type"];
    variant?: "default" | "destructive" | "outline" | "secondary" | "ghost" | "link" | null; // optional - pass to UI Button if you want
    size?: "default" | "sm" | "lg" | "icon" | null; // optional - pass to UI Button if you want
}>();

const emit = defineEmits<{
    (e: "click", event: MouseEvent): void;
}>();
</script>

<template>
    <Button :type="props.type || 'submit'" :variant="props.variant" :size="props.size"
        :disabled="props.disabled || props.loading" :class="[
            props.loading
                ? 'bg-royalviolet-600 text-white hover:bg-royalviolet-600 cursor-wait'
                : ''
        ]" @click="emit('click', $event)">
        <template v-if="props.loading">
            <svg class="animate-spin h-4 w-4 text-green-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            <slot name="loading">Loading...</slot>
        </template>

        <template v-else>
            <slot />
        </template>
    </Button>
</template>
