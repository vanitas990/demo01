<div class="container mt-5">
    <style>
        .matrix-edit-form {
            background: linear-gradient(45deg, #1a1a1a, #2d2d2d);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 193, 7, 0.2);
        }
        
        .matrix-card {
            border: 1px solid rgba(255, 193, 7, 0.3);
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }
        
        .matrix-card:hover {
            transform: translateY(-5px);
        }
        
        .form-label {
            color: #ffc107;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid #ffc107;
            color: #fff !important;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(255, 193, 7, 0.05);
            border-color: #ffc107;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.3);
        }
        
        .btn-matrix {
            border: 2px solid #ffc107;
            color: #ffc107;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-matrix:hover {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            transform: scale(1.05);
        }
        
        .btn-matrix::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, 
                transparent, 
                rgba(255, 193, 7, 0.2), 
                transparent);
            transform: rotate(45deg);
            transition: all 0.5s;
        }
        
        .btn-matrix:hover::before {
            animation: matrixFlow 1.5s infinite;
        }
        
        @keyframes matrixFlow {
            0% { left: -50%; }
            100% { left: 150%; }
        }
    </style>

    <h2 class="text-warning text-center mb-4 fw-bold" style="text-shadow: 0 0 10px rgba(255,193,7,0.5)">
        <i class="fas fa-user-edit me-2"></i>EDITAR USUARIO
    </h2>

    <div class="matrix-card mt-4 shadow-lg">
        <div class="card-body matrix-edit-form">
            <form action="{{ route('admin.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" 
                           class="form-control form-control-lg" 
                           value="{{ $usuario->nombre }}"
                           required>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" name="email" id="email" 
                           class="form-control form-control-lg" 
                           value="{{ $usuario->email }}"
                           required>
                </div>

                <div class="mb-4">
                    <label for="genero" class="form-label">Género:</label>
                    <select name="genero" id="genero" class="form-select form-select-lg">
                        <option value="Masculino" {{ $usuario->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ $usuario->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Otro" {{ $usuario->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-5">
                    <a href="{{ route('admin.index') }}" 
                       class="btn btn-outline-warning btn-lg btn-matrix">
                       <i class="fas fa-times-circle me-2"></i>Cancelar
                    </a>
                    <button type="submit" 
                            class="btn btn-warning btn-lg btn-matrix">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
