<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import LoadingButton from "@/components/common/LoadingButton.vue";
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { Checkbox } from "@/components/ui/checkbox"
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref } from "vue";

const isDelaying = ref(false);

const page = usePage();

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Create honorific',
        href: '/honorifics/create',
    },
];

const form = useForm({
    name: '',
    description: '',
    is_active: false,
    created_by: page.props.auth?.user?.email || "No email found",

});

const submit = () => {
    // Show "Creating..."
    isDelaying.value = true;

    // Add a 1 second delay before sending request
    setTimeout(() => {
        form.post(route('honorifics.store'), {
            onFinish: () => {
                // Reset after request finishes
                isDelaying.value = false;
                // Clear all fields except "created_by" We shall retain it because the user is still logged in
                form.reset('name', 'description', 'is_active');
            },
        });
    }, 1000); // 1-second delay before actual submit
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">

        <Head title="Create Honorific" />

        <div class="flex flex-col pt-10 px-4 sm:px-6 md:px-12 w-full max-w-2xl">
            <div class="flex font-semibold whitespace-nowrap text-3xl dark:text-green-400">
                <Link
                    class="text-royalviolet-700 hover:text-royalviolet-400 dark:text-green-600 dark:hover:text-green-400"
                    href="/honorifics">Honorifics&nbsp;/
                </Link>
                <span class="">
                    <span class="text-slate-600 dark:text-slate-400">&nbsp;Create</span>
                </span>
            </div>

            <HeadingSmall title="" description="Fill out the details below to create a new honorific" />

            <form @submit.prevent="submit" class="space-y-6 mt-12">
                <div class="grid gap-2">
                    <Label for="name">Honorific</Label>
                    <Input id="name" class="mt-1 block" v-model="form.name" placeholder="Honorific name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="description">Description</Label>
                    <Textarea id="description" class="h-40" placeholder="Description of the honorific"
                        v-model="form.description" />
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="grid gap-2">
                    <Label for="created_by">Created By</Label>
                    <Input id="created_by" class="font-bold bg-gray-100" readonly v-model="form.created_by" />
                    <InputError class="mt-2" :message="form.errors.created_by" />
                </div>

                <div class="flex gap-2">
                    <Checkbox id="is_active" v-model="form.is_active" />
                    <Label for="is_active">Active?</Label>
                    <InputError class="mt-2" :message="form.errors.is_active" />
                </div>

                <div class="grid gap-2 ">
                    <LoadingButton :loading="isDelaying || form.processing" :disabled="isDelaying || form.processing">
                        <template #loading>Creating ...</template>
                        Create Honorific
                    </LoadingButton>
                </div>
            </form>
        </div>
    </AppLayout>
</template>