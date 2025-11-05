<script setup>
defineProps({
  usuarios: Array
})
</script>

<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-6">
      <div class="flex justify-between items-center mb-6 border-b pb-3">
        <h1 class="text-3xl font-bold text-gray-800">
          👥 Lista de Usuarios
        </h1>
        
        <!-- Botón Crear Usuario (no funcional) -->
        <button 
          class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors cursor-not-allowed opacity-80 relative group"
          disabled
          title="Botón no funcional"
        >
          <i class="fas fa-plus mr-2"></i>Crear Usuario
          <span class="absolute -bottom-6 left-0 right-0 text-xs text-gray-500 opacity-0 group-hover:opacity-100 transition-opacity">
            mañana lo haré que funcione como link
          </span>
        </button>
      </div>

      <!-- Si no hay usuarios -->
      <div v-if="!usuarios || usuarios.length === 0" class="text-center py-10 text-gray-500">
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

      <!-- Tabla de usuarios -->
      <div v-else class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
          <thead class="bg-blue-50">
            <tr>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">ID</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Nombre</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Email</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="user in usuarios"
              :key="user.id"
              class="hover:bg-blue-50 transition-colors border-b"
            >
              <td class="px-4 py-3 text-sm font-mono text-gray-800">{{ user.id }}</td>
              <td class="px-4 py-3 text-sm text-gray-800">{{ user.name }}</td>
              <td class="px-4 py-3 text-sm text-gray-600">{{ user.email }}</td>
              <td class="px-4 py-3 text-sm text-gray-500">
                {{ new Date(user.created_at).toLocaleDateString('es-PE') }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
</style>
