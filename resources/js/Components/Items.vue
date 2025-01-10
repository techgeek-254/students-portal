<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Add Items</h1>
        <form @submit.prevent="submitForm">
            <div v-for="(item, index) in items" :key="index" class="mb-4">
                <label class="block font-medium">Name</label>
                <input v-model="item.name" type="text" class="border rounded px-2 py-1 w-full" required />
                
                <label class="block font-medium mt-2">Description</label>
                <textarea v-model="item.description" class="border rounded px-2 py-1 w-full"></textarea>
                
                <button type="button" @click="removeItem(index)" class="text-red-500 mt-2">Remove</button>
            </div>

            <button type="button" @click="addItem" class="text-blue-500">Add Another Item</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Submit</button>
        </form>

        <div v-if="successMessage" class="mt-4 text-green-500">
            {{ successMessage }}
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

export default {
    data() {
        return {
            items: [{ name: '', description: '' }],
            successMessage: null,
        };
    },
    methods: {
        addItem() {
            this.items.push({ name: '', description: '' });
        },
        removeItem(index) {
            this.items.splice(index, 1);
        },
        submitForm() {
            const form = useForm({ items: this.items });
            form.post(route('items.store'), {
                onSuccess: () => {
                    this.successMessage = 'Items saved successfully!';
                    this.items = [{ name: '', description: '' }];
                },
            });
        },
    },
};
</script>

<style>
/* Add your styles here */
</style>
