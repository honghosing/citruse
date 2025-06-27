<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Business',
        href: '/businesses/create',
    }
];

import { ref } from 'vue'
import axios from 'axios'

const form = ref({
    name: '',
    address: '',
    country: '',
    vat_number: '',
    business_type: '',
})

const responseMessage = ref('')

const submit = async () => {
    try {
        const response = await axios.post('/test-business-endpoint', form.value)
        responseMessage.value = response.data.message
    } catch (error) {
        responseMessage.value = 'Error: ' + error.response?.data?.message || error.message
    }
}
</script>

<template>
    <Head title="Business" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Create Business</h2>

            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label>Name</label>
                    <input v-model="form.name" type="text" class="border p-2 w-full" />
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input v-model="form.address" type="text" class="border p-2 w-full" />
                </div>

                <div class="mb-3">
                    <label>Country</label>
                    <input v-model="form.country" type="text" class="border p-2 w-full" />
                </div>

                <div class="mb-3">
                    <label>VAT Number</label>
                    <input v-model="form.vat_number" type="text" class="border p-2 w-full" />
                </div>

                <div class="mb-3">
                    <label>Business Type</label>
                    <select v-model="form.business_type" class="border p-2 w-full">
                        <option disabled value="">-- Select --</option>
                        <option value="producer">Producer</option>
                        <option value="distributor">Distributor</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
            </form>

            <div v-if="responseMessage" class="mt-4 text-green-600">
                {{ responseMessage }}
            </div>
        </div>
    </AppLayout>
</template>
