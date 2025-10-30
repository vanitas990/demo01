<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    estudiante: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <Head title="Estudiantes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Estudiantes
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1>Hola soy estudiante</h1>
                <br>
                <!-- Verificar que estudiante existe -->
                <div v-if="estudiante">
                    {{ estudiante.nombre }}
                </div>
                <div v-else>
                    No se encontró el estudiante
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
