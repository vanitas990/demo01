<script setup>
import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  nombre: '',
  apellido: '',
  email: '',
  password: '',
  password_confirmation: '',
  codigoPais: '+51', // Código de país predeterminado
  telefono: '',
  direccion: '',
  genero: '',
  estado: 'activo'
})

const crearUsuario = () => {
  form.post(route('usuarios.store'), {
    onSuccess: () => {
      form.reset()
      router.get(route('usuarios.index'))
    },
    onError: (errors) => {
      console.log('Errores:', errors)
    }
  })
}

const cancelar = () => {
  router.get(route('usuarios.index'))
}

// Lista de códigos de países
const codigosPaises = [
  { codigo: '+51', pais: 'Perú' },
  { codigo: '+1', pais: 'Estados Unidos' },
  { codigo: '+52', pais: 'México' },
  { codigo: '+54', pais: 'Argentina' },
  { codigo: '+56', pais: 'Chile' }
]

// Función para formatear el teléfono
const formatearTelefono = (event) => {
  let numero = event.target.value.replace(/\s/g, ''); // Elimina espacios existentes
  numero = numero.replace(/\D/g, ''); // Elimina caracteres no numéricos
  numero = numero.slice(0, 9); // Limita a 9 dígitos
  numero = numero.match(/.{1,3}/g)?.join(' ') || ''; // Agrega un espacio cada 3 dígitos
  form.telefono = numero;
}
</script>

<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">
      <div class="mb-6 border-b pb-3">
        <h1 class="text-2xl font-bold text-gray-800">
          ➕ Crear Nuevo Usuario
        </h1>
      </div>

      <form @submit.prevent="crearUsuario" class="space-y-4">
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
            placeholder="Ingresa el nombre"
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
            placeholder="Ingresa el apellido"
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
            placeholder="Ingresa el email"
            :class="{ 'border-red-500': form.errors.email }"
          >
          <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
            {{ form.errors.email }}
          </p>
        </div>

        <!-- Contraseña -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Contraseña *
          </label>
          <input
            v-model="form.password"
            type="password"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingresa la contraseña"
            :class="{ 'border-red-500': form.errors.password }"
          >
          <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
            {{ form.errors.password }}
          </p>
        </div>

        <!-- Confirmar Contraseña -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Confirmar Contraseña *
          </label>
          <input
            v-model="form.password_confirmation"
            type="password"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Confirma la contraseña"
          >
        </div>

        <!-- Teléfono -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Teléfono
          </label>
          <div class="flex gap-2">
            <select
              v-model="form.codigoPais"
              class="w-1/4 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              <option v-for="pais in codigosPaises" :key="pais.codigo" :value="pais.codigo">
                {{ pais.codigo }} ({{ pais.pais }})
              </option>
            </select>
            <input
              v-model="form.telefono"
              type="tel"
              @input="formatearTelefono"
              maxlength="11"
              class="w-3/4 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Ingresa el teléfono"
              :class="{ 'border-red-500': form.errors.telefono }"
            >
          </div>
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

        <!-- Botones -->
        <div class="flex space-x-3 pt-6 border-t border-gray-200">
          <button
            type="submit"
            :disabled="form.processing"
            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <i class="fas fa-save mr-2"></i>
            {{ form.processing ? 'Creando...' : 'Crear Usuario' }}
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
