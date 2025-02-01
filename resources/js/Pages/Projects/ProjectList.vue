<template>
    <AdminLayout>
        <div class="w-2/3 mx-auto mt-10">
            <div class="text-bold font-weight-bold text-3xl mb-5">
                Create Project
            </div>
            <div class="flex w-full">
                <div class="w-2/3 border p-8">
                    <section class="bg-white dark:bg-gray-900">


                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name Project
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Start
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            End
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Team
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(project, index) in projects" :key="index"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ project.name_proyek }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ project.start }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ project.end }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ project.team_id }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
            </div>
        </div>

    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
defineProps({
    projects: Object,
});
</script>
