<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table";
import HeadingSmall from '@/components/HeadingSmall.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Head, Link, router } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import { Pagination, PaginationContent, PaginationEllipsis, PaginationItem, PaginationNext, PaginationPrevious, } from '@/components/ui/pagination';
import { ref, watch } from 'vue';
import { debounce } from 'lodash';

// Define the breadcrumbs for the page.
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Honorifics',
        href: '/honorifics',
    },
];

// Define the structure of the object, ensuring type safety and IntelliSense support.
interface Honorific {
    id: number;
    name: string;
    description: string;
    is_active: boolean;
    created_by: string;
};

/**
 * Define the props interface for the component, ensuring type safety and IntelliSense support.
 * This interface describes the expected structure of the 'honorifics' prop passed to the component.
 */
interface Props {
    honorifics: {
        data: Honorific[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
        links: Array<{
            url: string | null;
            label: string;
            active: boolean;
        }>;
    },
    filters: {
        search?: string;
    };
};

/**
 * Define component props with TypeScript type annotations for type safety
 * 'Props' is the type that specifies the structure and types of the expected props.
 */
const props = defineProps<Props>();

// Define a reactive reference for the search input
const search = ref(props.filters.search);

// Debounced search handler
const performSearch = debounce((value: string) => {
    router.get(route('honorifics.index'), { search: value }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
}, 400);

// Watch for changes in the search input
watch(search, (value) => {
    performSearch(value ?? '');
});

const handlePageChange = (page: number) => {
    router.get(route('honorifics.index'), {
        page: page,
        search: search.value
    }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
};

</script>

<template>

    <Head title="Honorifics" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div id="honorifics-index" class="pt-10 px-8">
            <div class="pl-4">
                <span class="font-semibold whitespace-nowrap text-3xl dark:text-green-400">
                    <span class="hidden md:inline">All</span>
                    <span>&nbsp;Honorifics</span>
                </span>
                <HeadingSmall title=""
                    description="Below are all the honorifics that have been created on the system" />
            </div>


            <div class="pt-8 flex justify-between items-center flex-col-reverse md:flex-row">
                <Input id="search" v-model="search" type="text" :tabindex="2" placeholder="Search ..."
                    class="m-4 px-4 w-full md:w-1/3 rounded-lg focus:shadow-outline" autocomplete="off" name="search" />

                <Button :as="Link" :href="`/honorifics/create`" :tabindex="1">
                    <Link href="honorifics/create">
                    <span>Create</span>
                    <span class="">&nbsp;Honorific</span>
                    </Link>
                </Button>

            </div>
            <div class="pt-2">
                <div class="mt-6">
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead class="">Name</TableHead>
                                <TableHead class="">Description</TableHead>
                                <TableHead class="">Status</TableHead>
                                <TableHead class="">Created By</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow v-for="honorific in honorifics.data" :key="honorific.id" class="table-row">
                                <TableCell>
                                    <Link :href="`/honorifics/${honorific.id}/edit`" class="">
                                    {{ honorific.name }}
                                    </Link>
                                </TableCell>
                                <TableCell>
                                    <Link :href="`/honorifics/${honorific.id}/edit`" class="">
                                    {{ honorific.description }}
                                    </Link>
                                </TableCell>
                                <TableCell>
                                    <Link class="flex items-center" :href="`/honorifics/${honorific.id}/edit`">
                                    <div class="flex items-center" v-if="honorific.is_active">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                        Enabled
                                    </div>
                                    <div class="flex items-center" v-else>
                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                        Disabled
                                    </div>
                                    </Link>
                                </TableCell>
                                <TableCell>
                                    <Link :href="`/honorifics/${honorific.id}/edit`" class="">
                                    {{ honorific.created_by }}
                                    </Link>
                                </TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>
                </div>
                <!-- No data message -->
                <div v-if="honorifics.data.length === 0" class="text-center py-8">
                    No honorifics data found.
                </div>
                <div class="flex sm:flex-col-reverse md:flex-row justify-between items-center p-6">
                    <!-- Pagination -->
                    <div class="mt-4" v-if="honorifics.total > honorifics.per_page">
                        <Pagination>
                            <PaginationContent>
                                <PaginationItem>
                                    <PaginationPrevious href="#"
                                        @click.prevent="handlePageChange(honorifics.current_page - 1)"
                                        :class="{ 'pointer-events-none opacity-50': honorifics.current_page === 1 }" />
                                </PaginationItem>

                                <template v-for="(link, index) in honorifics.links.slice(1, -1)">
                                    <PaginationItem v-if="link.url">
                                        <button @click="handlePageChange(parseInt(link.label))" class="px-4 py-2"
                                            :class="{ 'bg-red-600 text-white dark:bg-green-600 rounded': link.active }">
                                            {{ link.label }}
                                        </button>
                                    </PaginationItem>
                                    <PaginationItem v-else-if="index === 1 || index === honorifics.links.length - 3">
                                        <PaginationEllipsis />
                                    </PaginationItem>
                                </template>

                                <PaginationItem>
                                    <PaginationNext href="#"
                                        @click.prevent="handlePageChange(honorifics.current_page + 1)"
                                        :class="{ 'pointer-events-none opacity-50': honorifics.current_page === honorifics.last_page }" />
                                </PaginationItem>
                            </PaginationContent>
                        </Pagination>
                    </div>
                    <!-- Summary of items being shown  -->
                    <div class="text-sm dark:text-green-400">
                        Showing {{ (honorifics.current_page - 1) * honorifics.per_page + 1 }} to
                        {{ Math.min(honorifics.current_page * honorifics.per_page, honorifics.total) }} of
                        {{ honorifics.total }} results
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
