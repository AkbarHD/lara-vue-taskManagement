<template>
    <AdminLayout>
        <div class="w-2/3 mx-auto mt-10">
            <div class="text-bold font-weight-bold text-3xl mb-5">
                Create Project
            </div>
            <div class="flex w-full">
                <div class="w-2/3 border p-8">Form 1</div>
                <div class="w-1/3 bg-gray-100 p-8 flex flex-col ">
                    <div class="border p-4 bg-white rounded">
                        <div class="text-lg font-bold">Create Team</div>
                        <hr class="mb-2">
                        <form @submit.prevent="createTeam">
                            <label for="name" class="block mb-2">Name Team</label>
                            <div class="mb-4">
                                <input type="text" id="name" v-model="formTeam.name"
                                    class="w-full p-2 border rounded border-gray-800 bg-gray-200">
                                <div class="text-red-800" v-if="errors.name">{{ errors.name }}</div>
                            </div>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Create</button>
                        </form>
                    </div>

                    <div class="border p-4 bg-white rounded mt-4">
                        <h3 class="text-lg font-bold">List Team</h3>
                        <hr class="mb-2">
                        <table class="table w-full">
                            <tbody>
                                <tr class="border-b " v-for="(team, index) in teams" :key="index">
                                    <td class="p-2 hover:bg-gray-300">{{ team.name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';
const formTeam = reactive({
    name: null
});

defineProps({
    errors: Object,
    teams: Object
})


const createTeam = () => {
    router.post('/teams/create', formTeam);
    formTeam.name = null;
}
</script>
