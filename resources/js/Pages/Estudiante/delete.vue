<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    estudiante: {
        type: Object,
        required: true
    }
})

const confirmarEliminacion = (id) => {
    router.delete(route('estudiantes.destroy', id), {
        onSuccess: () => {
            router.visit(route('estudiantes.index'))
        },
        onError: (errors) => {
            console.error(errors)
            alert('Error al eliminar el estudiante')
        },
    })
}
</script>

<template>
    <Head title="Confirmar Eliminación" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-3xl font-bold text-gray-900">
                Confirmar Eliminación
            </h2>
        </template>

        <div class="py-8">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-center mb-6">
                        <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            ¿Estás seguro de eliminar este estudiante?
                        </h3>
                        <p class="text-gray-600">
                            Esta acción no se puede deshacer
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">Información del estudiante:</h4>
                        <p><strong>Nombre:</strong> {{ estudiante.nombres }} {{ estudiante.pri_ape }} {{ estudiante.seg_ape }}</p>
                        <p><strong>Código:</strong> {{ estudiante.codigo }}</p>
                        <p><strong>DNI:</strong> {{ estudiante.dni }}</p>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <Link
                            :href="route('estudiantes.index')"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium"
                        >
                            <i class="fas fa-times mr-2"></i> Cancelar
                        </Link>

                        <button
                            @click="confirmarEliminacion(estudiante.id)"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium"
                        >
                            <i class="fas fa-trash mr-2"></i> Confirmar Eliminación
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
