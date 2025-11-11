<script setup>
import { defineProps } from 'vue'
import { useForm, router } from '@inertiajs/vue3'

// Recibimos el usuario como prop desde el controlador
const props = defineProps({
  usuario: Object
})

// Usando useForm de Inertia con los datos del usuario
const form = useForm({
  id: props.usuario?.id || null,
  nombre: props.usuario?.nombre || '',
  apellido: props.usuario?.apellido || '',
  email: props.usuario?.email || '',
  telefono: props.usuario?.telefono || '',
  direccion: props.usuario?.direccion || '',
  genero: props.usuario?.genero || '',
  estado: props.usuario?.estado || '',
  password: '',
  password_confirmation: ''
})

const actualizarUsuario = () => {
  form.put(route('usuarios.update', form.id), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset('password', 'password_confirmation')
    }
  })
}

const cancelar = () => {
  router.visit(route('usuarios.index'))
}
</script>

<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">
      <div class="mb-6 border-b pb-3">
        <h1 class="text-2极l font-bold text-gray-800">
          ✏️ Editar Usuario #{{ form.id }}
        </h1>
      </div>

      <form @submit.prevent="actualizarUsuario" class="space-y-4">
        <!-- Nombre -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Nombre *
          </label>
          <input
            v-model="form.nombre"
            type="text"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{ 'border-red-500': form.errors.nombre }"
          >
          <p v-if="form.errors.nombre" class="text-red-500 text-sm mt-1">
            {{ form.errors.nombre }}
          </p>
        </div>

        <!-- Apellido -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Apellido *
          </label>
          <input
            v-model="form.apellido"
            type="text"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{ 'border-red-500': form.errors.apellido }"
          >
          <p v-if="form.errors.apellido" class="text-red-500 text-sm mt-1">
            {{ form.errors.apellido }}
          </p>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Email *
          </label>
          <input
            v-model="form.email"
            type="email"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{ 'border-red-500': form.errors.email }"
          >
        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
            {{ form.errors.email }}
          </p>
        </div>

        <!-- Teléfono -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Teléfono
          </label>
          <input
            v-model="form.telefono"
            type="tel"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingresa el teléfono"
            :class="{ 'border-red-500': form.errors.telefono }"
          >
          <p v-if="form.errors.telefono" class="text-red-500 text-sm mt-1">
            {{ form.errors.telefono }}
          </p>
        </div>

        <!-- Dirección -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Dirección
          </label>
          <textarea
            v-model="form.direccion"
            rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingresa la dirección"
            :class="{ 'border-red-500': form.errors.direccion }"
          ></textarea>
          <p v-if="form.errors.direccion" class="text-red-500 text-sm mt-1">
            {{ form.errors.direccion }}
          </p>
        </div>

        <!-- Género -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Género
          </label>
          <select
            v-model="form.genero"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{ 'border-red-500': form.errors.genero }"
          >
            <option value="">Selecciona un género</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
          </select>
          <p v-if="form.errors.genero" class="text-red-500 text-sm mt-1">
            {{ form.errors.genero }}
          </p>
        </div>

        <!-- Estado -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Estado *
          </label>
          <select
            v-model="form.estado"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{ 'border-red-500': form.errors.estado }"
          >
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
          </select>
          <p v-if="form.errors.estado" class="text-red-500 text-sm mt-1">
            {{ form.errors.estado }}
          </p>
        </div>

        <!-- Contraseña (opcional) -->
        <div class="border-t border-gray-200 pt-4">
          <h3 class="text-lg font-semibold text-gray-800 mb-3">
            Cambiar Contraseña (opcional)
          </h3>
          
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">
                Nueva Contraseña
              </label>
              <input
                v-model="form.password"
                type="password"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Dejar vacío para mantener la actual"
                :class="{ 'border-red-500': form.errors.password }"
              >
              <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                {{ form.errors.password }}
              </p>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">
                Confirmar Nueva Contraseña
              </label>
              <input
                v-model="form.password_confirmation"
                type="password"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Confirma la nueva contraseña"
              >
            </div>
          </div>
        </div>

        <!-- Botones -->
        <div class="flex space-x-3 pt-6 border-t border-gray-200">
          <button
            type="submit"
            :disabled="form.processing"
            class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <i class="fas fa-save mr-2"></i>
            {{ form.processing ? 'Actualizando...' : 'Actualizar Usuario' }}
          </button>
          
          <button
            type="button"
            @click="cancelar"
            class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors"
          >
            <i class="fas fa-times mr-2"></i>Cancelar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
</style>
