<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Admin - Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-black: #000;
            --matrix-glow: 0 0 15px var(--matrix-green);
        }

        body {
            background: var(--matrix-black);
            color: var(--matrix-green);
            font-family: 'Courier New', monospace;
        }

        .container {
            padding: 2rem;
            animation: terminalTyping 1s steps(40) forwards;
        }

        @keyframes terminalTyping {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .matrix-table {
            --bs-table-bg: var(--matrix-black);
            --bs-table-color: var(--matrix-green);
            --bs-table-border-color: var(--matrix-green);
            border: 2px solid var(--matrix-green);
            box-shadow: var(--matrix-glow);
        }

        .matrix-table th {
            background: var(--matrix-dark) !important;
            border-bottom: 2px solid var(--matrix-green);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .matrix-table td {
            vertical-align: middle;
            background: rgba(0, 59, 0, 0.3) !important;
        }

        .matrix-table tr:hover td {
            background: rgba(0, 255, 65, 0.1) !important;
        }

        .btn-matrix {
            background: var(--matrix-dark);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green);
            transition: all 0.3s ease;
            margin: 2px;
        }

        .btn-matrix:hover {
            background: var(--matrix-green) !important;
            color: var(--matrix-black) !important;
            box-shadow: var(--matrix-glow);
        }

        .badge-matrix {
            background: var(--matrix-dark);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green) !important;
            font-weight: normal;
        }

        .search-box {
            background: rgba(0, 59, 0, 0.5) !important;
            border: 1px solid var(--matrix-green) !important;
            color: var(--matrix-green) !important;
        }

        .search-box:focus {
            box-shadow: var(--matrix-glow) !important;
            border-color: var(--matrix-green) !important;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4" style="text-shadow: 0 0 10px var(--matrix-green);">TERMINAL DE USUARIOS</h2>

    {{-- Buscador --}}
    <form action="{{ route('admin.index') }}" method="GET" class="mb-4 d-flex justify-content-center">
        <input type="text" name="search" 
               class="form-control w-50 me-2 search-box" 
               placeholder="BUSCAR USUARIO..." 
               value="{{ request('search') }}"
               style="font-family: 'Courier New', monospace;">
        <button type="submit" class="btn btn-matrix">
            <i class="fas fa-search"></i> EJECUTAR
        </button>
    </form>

    {{-- Tabla de usuarios --}}
    <div class="card border-success shadow" style="background: var(--matrix-black);">
        <div class="card-body p-0">
            @if($usuarios->count() > 0)
                <div class="table-responsive">
                    <table class="table matrix-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                <th>GÉNERO</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>#{{ $usuario->id }}</td>
                                    <td>{{ strtoupper($usuario->nombre) }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ ucfirst($usuario->genero) }}</td>
                                    <td>
                                        @if($usuario->estado === 'activo')
                                            <span class="badge badge-matrix bg-success">ONLINE</span>
                                        @else
                                            <span class="badge badge-matrix bg-secondary">OFFLINE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.edit', $usuario->id) }}" 
                                               class="btn btn-matrix btn-sm">
                                               <i class="fas fa-code"></i>
                                            </a>
                                            <a href="{{ route('admin.desactivar', $usuario->id) }}" 
                                               class="btn btn-matrix btn-sm">
                                               <i class="fas fa-power-off"></i>
                                            </a>
                                            <a href="{{ route('admin.eliminar', $usuario->id) }}" 
                                               class="btn btn-matrix btn-sm">
                                               <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center py-4" style="color: var(--matrix-green);">
                    > NO SE ENCONTRARON USUARIOS EN EL SISTEMA...
                </p>
            @endif
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
</body>
</html>
