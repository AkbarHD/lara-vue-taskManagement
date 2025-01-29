<template>
    <AdminLayout>
        <div class="w-2/3 mx-auto mt-10">
            <div class="text-bold font-weight-bold text-3xl mb-5">
                Create Project
            </div>
            <div class="flex w-full">
                <div class="w-2/3 border p-8">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl ">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                            <form @submit.prevent="createProject">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="team"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teams</label>
                                        <select id="team" v-model="forProject.team_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option v-for="(team, index) in teams" :key="index" :value="team.id">
                                                {{ team.name }}</option>

                                        </select>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                            Project</label>
                                        <input type="text" v-model="forProject.name_proyek" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Name Project" required="">
                                    </div>
                                    <div class="w-full">
                                        <label for="start"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start</label>
                                        <input type="date" id="start" v-model="forProject.start"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Product brand" required="">
                                    </div>
                                    <div class="w-full">
                                        <label for="end"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End</label>
                                        <input type="date" id="end" v-model="forProject.end"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="$2999" required="">
                                    </div>

                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Add product
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
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
                                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Create
                                Project</button>
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

const forProject = reactive({
    team_id: null, // Sesuaikan dengan backend
    name_proyek: null, // Sesuaikan dengan backend
    start: null,
    end: null,
});

defineProps({
    errors: Object,
    teams: Object
})

const createTeam = () => {
    router.post('/teams/create', formTeam);
    formTeam.name = null;
}

const createProject = () => {
    router.post('/projects/create', forProject);
    // Reset semua nilai form setelah pengiriman
    forProject.team_id = null;
    forProject.name_proyek = null;
    forProject.start = null;
    forProject.end = null;
};

</script>
