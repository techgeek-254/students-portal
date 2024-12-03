<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Dialog, DialogTitle, DialogDescription } from '@headlessui/vue';

const isOpen = ref(false);  // Reactive state for modal visibility

// Functions to open and close the modal
const openModal = () => {
    isOpen.value = true;
};

const closeModal = () => {
    isOpen.value = false;
};


</script>


<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Welcome, You're logged in.
                    </div>
                </div>

                <div class="pt-14 flex items-center justify-center">
                    <!-- Button to open the modal -->
                    <button @click="openModal" class="px-4 py-2 bg-purple-900 text-white rounded hover:bg-purple-800">
                        Open Modal
                    </button>

                    <!-- Modal Dialog -->
                    <Dialog :open="isOpen" @close="closeModal"
                        class="fixed inset-0 flex items-center justify-center z-50">
                        <div class="fixed inset-0 bg-black bg-opacity-40"></div> <!-- Background overlay -->

                        <div class="relative bg-white rounded-lg max-w-md mx-auto p-6">
                            <DialogTitle class="text-xl font-bold mb-4">Modal Title</DialogTitle>
                            <DialogDescription class="mb-4">
                                This is a sample modal using Headless UI and Vue.js.
                            </DialogDescription>

                            <button @click="closeModal"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 mr-3">
                                Close Modal
                            </button>
                            <button @click=""
                                class="px-4 py-2 bg-white text-black border border-gray-400 rounded hover:bg-gray-50 hover:border-gray-900">
                                Cancel
                            </button>
                        </div>
                    </Dialog>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>



</template>
