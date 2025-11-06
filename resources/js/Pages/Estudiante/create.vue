<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

const form = useForm({
    codigo: '',
    nombres: '',
    pri_ape: '',
    seg_ape: '',
    dni: '',
    email: '',
    telefono: '',
    carrera: ''
});

const createEstudiante = () => {
    form.post(route('estudiantes.store'), {
        onSuccess: () => {
            form.reset();
            alert('Estudiante creado exitosamente');
            router.visit(route('estudiantes.index'));
        },
        onError: (errors) => {
            console.log('Errores:', errors);
        },
        preserveScroll: true
    });
};
</script>

<template>
    <Head title="Crear Estudiante" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">
                        Nuevo Estudiante
                    </h2>
                    <p class="text-gray-600">
                        Complete los datos del nuevo estudiante
                    </p>
                </div>
                <Link :href="route('estudiantes.index')" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Volver al listado
                </Link>
            </div>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="createEstudiante" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Código -->
                                <div>
                                    <label for="codigo" class="block text-sm font-medium text-gray-700 mb-2">
                                        Código *
                                    </label>
                                    <input
                                        type="text"
                                        id="codigo"
                                        v-model="form.codigo"
                                        required
                                        maxlength="20"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese el código del estudiante"
                                    >
                                    <p v-if="form.errors.codigo" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.codigo }}
                                    </p>
                                </div>

                                <!-- DNI -->
                                <div>
                                    <label for="dni" class="block text-sm font-medium text-gray-700 mb-2">
                                        DNI *
                                    </label>
                                    <input
                                        type="text"
                                        id="dni"
                                        v-model="form.dni"
                                        required
                                        maxlength="15"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese el DNI"
                                    >
                                    <p v-if="form.errors.dni" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.dni }}
                                    </p>
                                </div>

                                <!-- Nombres -->
                                <div>
                                    <label for="nombres" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nombres *
                                    </label>
                                    <input
                                        type="text"
                                        id="nombres"
                                        v-model="form.nombres"
                                        required
                                        maxlength="100"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese los nombres"
                                    >
                                    <p v-if="form.errors.nombres" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.nombres }}
                                    </p>
                                </div>

                                <!-- Primer Apellido -->
                                <div>
                                    <label for="pri_ape" class="block text-sm font-medium text-gray-700 mb-2">
                                        Primer Apellido *
                                    </label>
                                    <input
                                        type="text"
                                        id="pri_ape"
                                        v-model="form.pri_ape"
                                        required
                                        maxlength="50"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese el primer apellido"
                                    >
                                    <p v-if="form.errors.pri_ape" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.pri_ape }}
                                    </p>
                                </div>

                                <!-- Segundo Apellido -->
                                <div>
                                    <label for="seg_ape" class="block text-sm font-medium text-gray-700 mb-2">
                                        Segundo Apellido
                                    </label>
                                    <input
                                        type="text"
                                        id="seg_ape"
                                        v-model="form.seg_ape"
                                        maxlength="50"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese el segundo apellido (opcional)"
                                    >
                                    <p v-if="form.errors.seg_ape" class="mt-1 text-sm text-red-极">
                                        {{ form.errors.seg_ape }}
                                    </p>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        v-model="form.email"
                                        maxlength="150"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="ejemplo@correo.com"
                                    >
                                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.email }}
                                    </p>
                                </div>

                                <!-- Teléfono -->
                                <div>
                                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                                        Teléfono
                                    </label>
                                    <input
                                        type="tel"
                                        id="telefono"
                                        v-model="form.telefono"
                                        maxlength="20"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese el teléfono"
                                    >
                                    <p v-if="form.errors.telefono" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.telefono }}
                                    </p>
                                </div>

                                <!-- Carrera -->
                                <div>
                                    <label for="carrera" class="block text-sm font-medium text-gray-700 mb-2">
                                        Carrera
                                    </label>
                                    <input
                                        type="text"
                                        id="carrera"
                                        v-model="form.carrera"
                                        maxlength="100"
                                        class="w-full px-4 py-2 border border极-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Ingrese la carrera"
                                    >
                                    <p v-if="form.errors.carrera" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.carrera }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-4 pt-6">
                                <Link :href="route('estudiantes.index')" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </Link>
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    <span v-if="form.processing">
                                        <i class="fas fa-spinner fa-spin mr-2"></i> Guardando...
                                    </span>
                                    <span v-else>
                                        <i class="fas fa-save mr-2"></i> Guardar Estudiante
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
