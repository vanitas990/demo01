<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    estudiantes: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Estudiantes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                Gestión de Estudiantes
            </h2>
            <p class="text-gray-600">
                Listado de estudiantes registrados en el sistema
            </p>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Botón para agregar nuevo estudiante -->
                <div class="mb-6 flex justify-end">
                    <Link href="/estudiantes/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center">
                        <i class="fas fa-plus mr-2"></i> Nuevo Estudiante
                    </Link>
                </div>

                <!-- Mensaje si no hay estudiantes -->
                <div v-if="estudiantes.length === 0" class="bg-white rounded-lg shadow p-6 text-center">
                    <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No hay estudiantes registrados</p>
                </div>

                <!-- Lista de estudiantes -->
                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="estudiante in estudiantes" :key="estudiante.id" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="profile-header p-6 text-white" style="background: linear-gradient(120deg, #4361ee 0%, #3a0ca3 100%);">
                            <div class="flex items-center space-x-4">
                                <div class="h-16 w-16 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-2xl"></i>
                                </div>
                                <div>
                                    
                                    <p class="text-blue-100 text-sm">{{ estudiante.nombres || 'Estudiante' }} {{ estudiante.pri_ape || 'N/A' }} {{ estudiante.seg_ape || 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-3">
                              
                                <div class="flex items-center">
                                    <i class="fas fa-id-card text-gray-500 w-5 mr-3"></i>
                                    <span class="text-gray-600">DNI: {{ estudiante.dni || 'N/A' }}</span>
                                </div>
                            
                                <!-- Email -->
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-gray-500 w-5 mr-3"></i>
                                    <span class="text-gray-600 truncate">Correo: {{ estudiante.email || 'N/A' }}</span>
                                </div>
                                
                                <!-- Teléfono -->
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-gray-500 w-5 mr-3"></i>
                                    <span class="text-gray-600">Telefono: {{ estudiante.telefono || 'N/A' }}</span>
                                </div>
                                
                                <!-- Carrera -->
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap text-gray-500 w-5 mr-3"></i>
                                    <span class="text-gray-600">Carrera: {{ estudiante.carrera || 'N/A' }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-between">
                                <Link :href="`/estudiantes/${estudiante.id}`" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    <i class="fas fa-eye mr-2"></i> Ver detalles
                                </Link>
                                <Link
                                     :href="`/estudiantes/${estudiante.id}/edit`"
                                       class="text-green-600 hover:text-green-800 font-medium flex items-center"
                                     >
                                         <i class="fas fa-edit mr-2"></i> Editar
                                </Link>

                                
                                <Link :href="`/estudiantes/${estudiante.id}`" method="delete" as="button" class="text-red-600 hover:text-red-800 font-medium flex items-center">
                                    <i class="fas fa-trash mr-2"></i> Eliminar
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.profile-header {
    border-radius: 1rem 1rem 0 0;
}
</style>
