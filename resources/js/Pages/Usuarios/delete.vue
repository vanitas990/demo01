<script setup>
import { ref } from 'vue'
import { useForm, router } from '@inertiajs/vue3'

// Recibe el usuario desde Laravel
const props = defineProps({
  usuario: Object,
})

// Clonamos por si acaso
const usuario = ref(props.usuario)

const form = useForm({
  _method: 'DELETE',
})

// ✅ Función para formatear fecha
const formatDate = (dateString) => {
  if (!dateString) return 'Sin fecha'
  return new Date(dateString).toLocaleDateString('es-PE', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  })
}

// ✅ Eliminar usuario
const eliminarUsuario = () => {
  form.delete(route('usuarios.destroy', usuario.value.id), {
    preserveScroll: true,
    onSuccess: () => router.visit('/usuarios'),
    onError: () => alert('Error al eliminar usuario'),
  })
}


// ✅ Cancelar
const cancelar = () => router.visit('/usuarios')
</script>

<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">
      <div class="mb-6 border-b pb-3">
        <h1 class="text-2xl font-bold text-gray-800">
          🗑️ Eliminar Usuario #{{ usuario.id }}
        </h1>
      </div>

      <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
        <div class="flex items-start">
          <i class="fas fa-exclamation-triangle text-red-500 text-xl mt-1 mr-3"></i>
          <div>
            <h3 class="font-semibold text-red-800">¡Atención!</h3>
            <p class="text-red-600 text-sm mt-1">
              Esta acción eliminará permanentemente el usuario y sus datos asociados.
            </p>
          </div>
        </div>
      </div>

      <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <h4 class="font-medium text-gray-700 mb-3 text-lg">Información:</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
          <div>
            <p><strong>ID:</strong> {{ usuario.id }}</p>
            <p><strong>Nombre:</strong> {{ usuario.nombre }}</p>
            <p><strong>Apellido:</strong> {{ usuario.apellido }}</p>
            <p><strong>Email:</strong> {{ usuario.email }}</p>
          </div>
          <div>
            <p><strong>Teléfono:</strong> {{ usuario.telefono || 'N/A' }}</p>
            <p><strong>Género:</strong> {{ usuario.genero || 'No especificado' }}</p>
            <p><strong>Estado:</strong> {{ usuario.estado }}</p>
            <p><strong>Registro:</strong> {{ formatDate(usuario.created_at) }}</p>
          </div>
        </div>
      </div>

      <div class="flex flex-wrap gap-3">
        <button
          @click="eliminarUsuario"
          :disabled="form.processing"
          class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
        >
          <i class="fas fa-trash mr-2"></i>
          {{ form.processing ? 'Eliminando...' : 'Confirmar Eliminación' }}
        </button>

        <button
          @click="cancelar"
          :disabled="form.processing"
          class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition"
        >
          <i class="fas fa-times mr-2"></i>Cancelar
        </button>
      </div>
    </div>
  </div>
</template>

<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
</style>
