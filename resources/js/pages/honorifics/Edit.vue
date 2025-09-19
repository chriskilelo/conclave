<script setup lang="ts">
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import LoadingButton from "@/components/common/LoadingButton.vue";
import HeadingSmall from "@/components/HeadingSmall.vue";
import InputError from "@/components/InputError.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Checkbox } from "@/components/ui/checkbox";
import AppLayout from "@/layouts/AppLayout.vue";
import { type BreadcrumbItem } from "@/types";
import { ref } from "vue";

// Get honorific data from page props
const page = usePage();
interface Honorific {
    id: number;
    name: string;
    description: string;
    is_active: boolean;
    created_by: string;
    created_at?: string;
    updated_at?: string;
}
const honorific = page.props.honorific as Honorific; // <-- must be passed from controller

const isDelaying = ref(false);

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: "Edit honorific",
        href: `/honorifics/${honorific.id}/edit`,
    },
];

const form = useForm({
    name: honorific.name,
    description: honorific.description,
    is_active: Boolean(honorific.is_active), // ✅ Force to boolean
    created_by: honorific.created_by,
});

const submit = () => {
    isDelaying.value = true;

    setTimeout(() => {
        form.put(route("honorifics.update", honorific.id), {
            onFinish: () => {
                isDelaying.value = false;
            },
        });
    }, 1000); // 1-second delay for UX
};

// Add deleteHonorific method
const deleteHonorific = () => {
    if (
        window.confirm(
            "Are you sure you want to delete this honorific? This action cannot be undone."
        )
    ) {
        form.delete(route("honorifics.destroy", honorific.id));
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">

        <Head title="Edit Honorific" />

        <div class="flex flex-col pt-10 px-4 sm:px-6 md:px-12 w-full max-w-2xl">
            <div class="flex font-semibold whitespace-nowrap text-3xl dark:text-green-400">
                <Link
                    class="text-royalviolet-700 hover:text-royalviolet-400 dark:text-green-600 dark:hover:text-green-400"
                    href="/honorifics">
                Honorifics&nbsp;/
                </Link>
                <span>
                    <span class="text-slate-600 dark:text-slate-400">&nbsp;Edit</span>
                </span>
            </div>

            <HeadingSmall title="" description="Modify the details below to update the selected honorific." />

            <form @submit.prevent="submit" class="space-y-6 mt-12">
                <div class="grid gap-2">
                    <Label for="name">Honorific</Label>
                    <Input id="name" class="mt-1 block" v-model="form.name" placeholder="Honorific name"
                        :disabled="isDelaying || form.processing" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="description">Description</Label>
                    <Textarea id="description" class="h-40" placeholder="Description of the honorific"
                        v-model="form.description" :disabled="isDelaying || form.processing" />
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="grid gap-2">
                    <Label for="created_by">Created By</Label>
                    <Input id="created_by" class="font-bold bg-gray-100" readonly v-model="form.created_by" />
                </div>

                <div class="flex gap-2">
                    <Checkbox id="is_active" v-model="form.is_active" :disabled="isDelaying || form.processing" />
                    <Label for="is_active">Active?</Label>
                </div>

                <div class="mt-12 flex flex-col gap-4 md:flex-row md:justify-between w-full">
                    <!-- Update Button -->
                    <LoadingButton
                        class="w-full md:w-auto px-6 py-3 font-semibold rounded-2xl shadow-md  transition-all duration-200"
                        :loading="isDelaying || form.processing" :disabled="isDelaying || form.processing">
                        <template #loading>Updating Honorific ...</template>
                        Update Honorific
                    </LoadingButton>

                    <!-- Delete Button -->
                    <Link href="#"
                        class="w-full md:w-auto flex items-center justify-center px-6 py-3 sm:mb-12 md:mb-6 bg-gray-200 text-red-600 font-semibold rounded shadow-md hover:bg-red-500 hover:text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200"
                        @click.prevent="deleteHonorific">
                    Delete Honorific
                    </Link>
                </div>

            </form>
        </div>
    </AppLayout>
</template>
