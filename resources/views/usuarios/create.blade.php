<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-255">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Matrix System</title>
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
            animation: terminalTyping 1s steps(40) forwards;
        }
        @keyframes terminalTyping {
            from { width: 0; opacity: 0; }
            to { width: 400px; opacity: 1; }
        }
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: var(--matrix-glow);
        }
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            text-shadow: var(--matrix-glow);
        }
        input {
            width: 100%;
            padding: 0.8rem;
            background: rgba(0, 59, 0, 0.5);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green);
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        input:focus {
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
        .links-container {
            margin-top: 1.5rem;
            text-align: center;
        }
        .links-container a {
            color: var(--matrix-green);
            text-decoration: none;
            border-bottom: 1px dashed var(--matrix-green);
            margin: 0 0.5rem;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 35px;
            cursor: pointer;
            color: var(--matrix-green);
        }
        .alert {
            background: rgba(0, 59, 0, 0.7);
            color: var(--matrix-green);
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid var(--matrix-green);
        }
    </style>
</head>
<body>
    <form class="matrix-form" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>ACCESO AL SISTEMA</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group">
            <label>Correo:</label>
            <input type="email" name="email" placeholder="Ingresa tu correo" required>
            <i class="fas fa-envelope password-toggle"></i>
        </div>
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
            <i class="fas fa-eye password-toggle" onclick="togglePassword()"></i>
        </div>
        <button type="submit">ENTRAR</button>

        <div class="links-container">
            <a href="{{ route('registro') }}">Crear cuenta</a>
        </div>
    </form>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.querySelector('.fa-eye');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
