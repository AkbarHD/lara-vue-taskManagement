<template>
    <AdminLayout>
        <div class="w-2/3 mx-auto mt-10">
            <div class="text-bold font-weight-bold text-3xl mb-5">
                Create Project
            </div>
            <div class="flex w-full">
                <div class="w-2/3 border p-8">Form 1</div>
                <div class="w-1/3 bg-gray-100 p-8">
                    <div class="text-lg font-bold">Create Team</div>
                    <hr class="mb-2">
                    <form action="/create" method="post">
                        <label for="name" class="block mb-2">Name Team</label>
                        <div class="mb-4">
                            <input type="text" id="name" class="w-full p-2 border rounded border-gray-800 bg-gray-200">
                        </div>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { reactive } from 'vue';
const form = reactive({
    name: null
});
</script>
