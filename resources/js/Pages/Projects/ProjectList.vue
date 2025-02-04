<template>
    <AdminLayout>
        <div class="w-[80%] mx-auto mt-10">
            <div class="text-bold font-weight-bold text-3xl mb-5">
                List Project
            </div>
            <div class="flex w-full">
                <div class="w-2/3 border p-8">
                    <section class="bg-white dark:bg-gray-900">
                        <ItemList :dataProjects="projects" />
                    </section>
                </div>
                <div class="w-1/3 bg-gray-100 p-8 flex flex-col ">
                    <div class="border p-4 bg-white rounded mt-4">
                        <h3 class="text-lg font-bold">List Project</h3>
                        <hr class="mb-2">
                        <table class="table w-full">
                            <tbody>
                                <tr class="border-b" v-for="(project, index) in projects" :key="index">
                                    <td class="p-2 hover:bg-gray-300">{{ project.name_proyek }}</td>
                                    <td class="flex gap-1">
                                        <svg @click="confirmEditProject(project)"
                                            class="w-6 h-6 cursor-pointer text-green-400 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <Link :href="'/projects/delete' + project.id" method="delete">
                                        <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <Modal :show="showEditModal" @close="closeModal">
                            <div class=" p-4">
                                <form @submit.prevent="updateProject">
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
                                    <div class="flex gap-4 mt-3">
                                        <PrimaryButton>Update</PrimaryButton>
                                        <SecondaryButton @click="closeModal">Close</SecondaryButton>
                                    </div>

                            </form>
                            </div>
                        </Modal>
                    </div>
                </div>
            </div>
        </div>

    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ItemList from '@/Pages/Projects/components/itemList.vue';
import { Link, router } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { reactive, ref } from 'vue';

defineProps({
    projects: Object,
    teams: Object,
});

const showEditModal = ref(false);
const idProject = ref('');


const forProject = reactive({
    team_id: null, // Sesuaikan dengan backend
    name_proyek: null, // Sesuaikan dengan backend
    start: null,
    end: null,
});

const confirmEditProject = (project) => {
    showEditModal.value = true;
    forProject.team_id = project.team_id;
    forProject.name_proyek = project.name_proyek;
    forProject.start = project.start;
    forProject.end = project.end;
    // ambil id project
    idProject.value = project.id;
}

const updateProject = () => {
    router.put('/projects/update/' + idProject.value, forProject);
    closeModal();
};

const closeModal = () => {
    showEditModal.value = false;
}


</script>
