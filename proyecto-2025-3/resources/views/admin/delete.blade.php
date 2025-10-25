<div class="container mt-5">
    <style>
        .apocalipsis-card {
            background: linear-gradient(45deg, #1a0000, #330000);
            border: 2px solid rgba(255, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(255, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .apocalipsis-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, 
                transparent, 
                rgba(255, 0, 0, 0.1), 
                transparent);
            transform: rotate(45deg);
            animation: bloodFlow 2s infinite linear;
        }
        
        @keyframes bloodFlow {
            0% { left: -50%; }
            100% { left: 150%; }
        }
        
        .glitch-text {
            animation: glitch 1s infinite linear;
            text-shadow: 3px 3px 0 #ff0000, -3px -3px 0 #00ffff;
        }
        
        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }
        
        .btn-nuclear {
            background: rgba(255, 0, 0, 0.15);
            border: 2px solid #ff0000;
            color: #ff0000;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-nuclear:hover {
            background: rgba(255, 0, 0, 0.25);
            transform: scale(1.1);
            box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
        }
        
        .btn-nuclear::after {
            content: '⚠️';
            position: absolute;
            opacity: 0.3;
            font-size: 1.2em;
            animation: warningSpin 3s infinite linear;
        }
        
        @keyframes warningSpin {
            from { transform: rotate(0deg) translateX(20px) rotate(0deg); }
            to { transform: rotate(360deg) translateX(20px) rotate(-360deg); }
        }
    </style>

    <h2 class="text-danger text-center mb-4 display-4 glitch-text">
        <i class="fas fa-skull-crossbones me-2"></i>DESTRUCCIÓN DE CUENTA
    </h2>

    <div class="apocalipsis-card mt-4 shadow-lg">
        <div class="card-body text-center py-5">
            <div class="alert alert-dark mb-5">
                <h3 class="text-warning mb-4">
                    <i class="fas fa-radiation me-2"></i>
                    ADVERTENCIA FINAL
                </h3>
                <p class="lead text-light">
                    Estás a punto de eliminar permanentemente a:<br>
                    <span class="text-danger fw-bold display-6">{{ $usuario->nombre }}</span>
                </p>
                <hr class="border-danger">
                <div class="mt-4 text-start text-light">
                    <p class="h5"><i class="fas fa-ban me-2"></i>Consecuencias irreversibles:</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-database me-2"></i>Todos los datos asociados serán destruidos</li>
                        <li><i class="fas fa-history me-2"></i>Registros históricos eliminados permanentemente</li>
                        <li><i class="fas fa-exclamation-triangle me-2"></i>Esta acción no puede revertirse</li>
                    </ul>
                </div>
            </div>

            <form action="{{ route('admin.eliminar.confirm', $usuario->id) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="d-flex justify-content-center gap-5 mt-5">
                    <a href="{{ route('admin.index') }}" 
                       class="btn btn-outline-danger btn-lg"
                       style="border-width: 3px; backdrop-filter: blur(5px)">
                       <i class="fas fa-escape me-2"></i>Abortar Misión
                    </a>
                    <button type="submit" 
                            class="btn btn-nuclear btn-lg px-5">
                            <i class="fas fa-trash-fire me-2"></i>Ejecutar Eliminación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
