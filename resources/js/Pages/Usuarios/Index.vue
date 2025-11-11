<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { defineProps } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  usuarios: Array
})

const navegarACrear = () => {
  router.visit(route('usuarios.create'))
}

const navegarAEditar = (id) => {
  router.visit(route('usuarios.edit', id))
}

const navegarAEliminar = (id) => {
  router.visit(route('usuarios.delete', id))
}

const nombreCompleto = (usuario) => `${usuario.nombre} ${usuario.apellido}`

const estadoColor = (estado) =>
  estado === 'activo' ? 'text-green-600' : 'text-red-600'
</script>

<template>
  <Head title="Usuarios" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-3xl font-bold text-gray-900 mb-2">
        Gestión de Usuarios
      </h2>
      <p class="text-gray-600">Listado de usuarios registrados en el sistema</p>
    </template>

    <div class="min-h-screen bg-gray-50 p-8">
      <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-6">
        <div class="flex justify-between items-center mb-6 border-b pb-3">
          <h1 class="text-2xl font-bold text-gray-800">
            👥 Lista de Usuarios
          </h1>

          <div class="flex items-center gap-3">
            <a
              :href="route('usuarios.reporte.pdf')"
              class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center"
              target="_blank"
            >
              <i class="fas fa-file-pdf mr-2"></i> Generar PDF
            </a>

            <button
              @click="navegarACrear"
              class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center"
            >
              <i class="fas fa-plus mr-2"></i>Crear Usuario
            </button>
          </div>
        </div>

        <div
          v-if="!usuarios || usuarios.length === 0"
          class="text-center py-10 text-gray-500"
        >
          <svg
            class="w-12 h-12 mx-auto mb-3 text-gray-400"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v2m0 4h.01M4.938 20h14.124c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 17c-.77 1.333.192 3 1.732 3z"
            />
          </svg>
          No hay usuarios registrados aún.
        </div>

        <div v-else class="overflow-x-auto">
          <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-blue-50">
              <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">ID</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Nombre Completo</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Email</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Teléfono</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Género</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Estado</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Fecha Creación</th>
                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="usuario in usuarios"
                :key="usuario.id"
                class="hover:bg-blue-50 transition-colors border-b"
              >
                <td class="px-4 py-3 text-sm font-mono text-gray-800">{{ usuario.id }}</td>
                <td class="px-4 py-3 text-sm text-gray-800">{{ nombreCompleto(usuario) }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ usuario.email }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ usuario.telefono || 'N/A' }}</td>
                <td class="px-4 py-3 text-sm text-gray-600 capitalize">{{ usuario.genero || 'N/A' }}</td>
                <td class="px-4 py-3 text-sm">
                  <span :class="['font-semibold capitalize', estadoColor(usuario.estado)]">
                    {{ usuario.estado }}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm text-gray-500">
                  {{ new Date(usuario.created_at).toLocaleDateString('es-PE') }}
                </td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex space-x-2">
                    <button
                      @click="navegarAEditar(usuario.id)"
                      class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors flex items-center"
                      title="Editar usuario"
                    >
                      <i class="fas fa-edit mr-2"></i> Editar
                    </button>
                    <button
                      @click="navegarAEliminar(usuario.id)"
                      class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors flex items-center"
                      title="Eliminar usuario"
                    >
                      <i class="fas fa-trash mr-2"></i> Eliminar
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
</style>
