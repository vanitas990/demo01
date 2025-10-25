<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Matrix System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-black: #000;
            --matrix-glow: 0 0 10px var(--matrix-green);
        }

        body {
            background: var(--matrix-black);
            color: var(--matrix-green);
            font-family: 'Courier New', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .matrix-form {
            background: rgba(0, 20, 0, 0.9);
            border: 1px solid var(--matrix-green);
            border-radius: 5px;
            padding: 2rem;
            width: 400px;
            box-shadow: var(--matrix-glow);
            animation: formFade 1s ease-out;
        }

        @keyframes formFade {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: var(--matrix-glow);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            text-shadow: var(--matrix-glow);
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            background: rgba(0, 59, 0, 0.5);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            outline: none;
            box-shadow: var(--matrix-glow);
        }

        button {
            width: 100%;
            padding: 1rem;
            background: var(--matrix-dark);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green);
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        button:hover {
            background: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: var(--matrix-glow);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--matrix-green);
            text-decoration: none;
            border-bottom: 1px dashed var(--matrix-green);
        }

        .login-link a:hover {
            color: #00ff41;
            text-shadow: var(--matrix-glow);
        }
    </style>
</head>
<body>
    <form class="matrix-form" method="POST" action="{{ route('registrar.submit') }}">
        <h1>CREAR CUENTA</h1>
        
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Tu nombre" required>
        </div>

        <div class="form-group">
            <label>Correo:</label>
            <input type="email" name="email" placeholder="Tu correo" required>
        </div>

        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="Tu contraseña" required>
        </div>

        <div class="form-group">
            <label>Género:</label>
            <select name="genero" required>
                <option value="">Selecciona tu género</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <button type="submit">REGISTRARSE</button>
        
        <div class="login-link">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
        </div>
    </form>
</body>
</html>
