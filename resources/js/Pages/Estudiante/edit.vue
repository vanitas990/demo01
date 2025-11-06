<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  estudiante: Object
});

const form = useForm({
  nombres: props.estudiante.nombres || '',
  pri_ape: props.estudiante.pri_ape || '',
  seg_ape: props.estudiante.seg_ape || '',
  dni: props.estudiante.dni || '',
  codigo: props.estudiante.codigo || '',
  email: props.estudiante.email || '',
  telefono: props.estudiante.telefono || '',
  carrera: props.estudiante.carrera || '',
});

const submit = () => {
  form.put(route('estudiantes.update', props.estudiante.id));
};
</script>

<template>
  <Head title="Editar Estudiante" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-3xl font-bold text-gray-900 mb-2">
            Editar Estudiante
          </h2>
          <p class="text-gray-600">Actualiza la información del estudiante</p>
        </div>
        <Link href="/estudiantes" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
          <i class="fas fa-arrow-left mr-2"></i> Volver al listado
        </Link>
      </div>
    </template>

    <div class="py-8">
      <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
        <form @submit.prevent="submit" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nombres -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nombres *</label>
              <input 
                v-model="form.nombres" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                required 
              />
              <p v-if="form.errors.nombres" class="mt-1 text-sm text-red-600">{{ form.errors.nombres }}</p>
            </div>

            <!-- Primer Apellido -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Primer Apellido *</label>
              <input 
                v-model="form.pri_ape" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                required 
              />
              <p v-if="form.errors.pri_ape" class="mt-极 text-sm text-red-600">{{ form.errors.pri_ape }}</p>
            </div>

            <!-- Segundo Apellido -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Segundo Apellido</label>
              <input 
                v-model="form.seg_ape" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
              />
              <p v-if="form.errors.seg_ape" class="mt-1 text-sm text-red-600">{{ form.errors.seg_ape }}</p>
            </div>

            <!-- DNI -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">DNI *</label>
              <input 
                v-model="form.dni" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                required 
              />
              <p v-if="form.errors.dni" class="mt-1 text-sm text-red-600">{{ form.errors.dni }}</p>
            </div>

            <!-- Código -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Código *</label>
              <input 
                v-model="form.codigo" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                required 
              />
              <p v-if="form.errors.codigo" class="mt-1 text-sm text-red-600">{{ form.errors.codigo }}</p>
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input 
                v-model="form.email" 
                type="email" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
              />
              <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
            </div>

            <!-- Teléfono -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
              <input 
                v-model="form.telefono" 
                type="tel" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
              />
              <p v-if="form.errors.telefono" class="mt-1 text极 text-red-600">{{ form.errors.telefono }}</p>
            </div>

            <!-- Carrera -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Carrera</label>
              <input 
                v-model="form.carrera" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
              />
              <p v-if="form.errors.carrera" class="mt-1 text-sm text-red-600">{{ form.errors.carrera }}</p>
            </div>
          </div>

          <div class="flex justify-end space-x-4 pt-6">
            <Link 
              href="/estudiantes" 
              class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
            >
              Cancelar
            </Link>
            <button
              type="submit"
              :disabled="form.processing"
              class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
            >
              <span v-if="form.processing">
                <i class="fas fa-spinner fa-spin mr-2"></i> Guardando...
              </span>
              <span v-else>
                <i class="fas fa-save mr-2"></i> Guardar Cambios
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
