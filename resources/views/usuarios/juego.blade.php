<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Quest - ¡Bienvenido!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 600px;
            width: 90%;
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            background: linear-gradient(45deg, #FFD700, #FFA500);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.6);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 25px rgba(255, 215, 0, 0.6); }
            50% { transform: scale(1.05); box-shadow: 0 0 35px rgba(255, 215, 0, 0.8); }
            100% { transform: scale(1); box-shadow: 0 0 25px rgba(255, 215, 0, 0.6); }
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #FFD700, #FF8C00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .welcome-text {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .player-info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
        }
        
        .player-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #4e54c8;
            margin-right: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            border: 2px solid #FFD700;
        }
        
        .player-details {
            text-align: left;
        }
        
        .player-name {
            font-weight: 600;
            color: #FFD700;
        }
        
        .player-level {
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .features {
            display: flex;
            justify-content: space-around;
            margin: 2rem 0;
        }
        
        .feature {
            text-align: center;
            width: 30%;
        }
        
        .feature-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #FFD700;
        }
        
        .feature-text {
            font-size: 0.9rem;
        }
        
        .start-button {
            background: linear-gradient(to right, #FF8C00, #FFD700);
            color: #333;
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 140, 0, 0.4);
            margin-top: 1rem;
        }
        
        .start-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.6);
        }
        
        .start-button:active {
            transform: translateY(1px);
        }
        
        .quest-notification {
            margin-top: 1.5rem;
            padding: 10px;
            background: rgba(0, 200, 83, 0.2);
            border-left: 4px solid #00C853;
            border-radius: 4px;
            font-size: 0.9rem;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <div class="logo">🌍</div>
        <h1>Turismo Quest</h1>
        
        <p class="welcome-text">
            ¡Bienvenido a nuestro juego Turismo Quest! Esperamos que disfrutes de esta aventura 
            increíble donde descubrirás lugares fascinantes, resolverás acertijos y te convertirás 
            en un auténtico maestro del turismo virtual.
        </p>
        
        <div class="player-info">
            <div class="player-avatar">J</div>
            <div class="player-details">
                <div class="player-name">Jugador</div>
                <div class="player-level">Nivel 1 - Novato Viajero</div>
            </div>
        </div>
        
        <div class="features">
            <div class="feature">
                <div class="feature-icon">🗺️</div>
                <div class="feature-text">Descubre lugares increíbles</div>
            </div>
            <div class="feature">
                <div class="feature-icon">🧩</div>
                <div class="feature-text">Resuelve acertijos divertidos</div>
            </div>
            <div class="feature">
                <div class="feature-icon">🏆</div>
                <div class="feature-text">Gana premios y trofeos</div>
            </div>
        </div>
        
        <button class="start-button">¡Comenzar Aventura!</button>
        
        <div class="quest-notification">
            Tienes una nueva misión disponible: "Explorar la ciudad antigua"
        </div>
    </div>

    <script>
        // Crear partículas flotantes
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particlesCount = 30;
            
            for (let i = 0; i < particlesCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamaño aleatorio
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Posición inicial aleatoria
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Retraso de animación aleatorio
                particle.style.animationDuration = `${Math.random() * 10 + 10}s`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Inicializar partículas cuando la página cargue
        window.onload = function() {
            createParticles();
            
            // Efecto de escritura para el mensaje de bienvenida
            const welcomeText = "¡Bienvenido a nuestro juego Turismo Quest! Esperamos que disfrutes de esta aventura increíble donde descubrirás lugares fascinantes, resolverás acertijos y te convertirás en un auténtico maestro del turismo virtual.";
            const welcomeElement = document.querySelector('.welcome-text');
            let i = 0;
            welcomeElement.textContent = "";
            
            function typeWriter() {
                if (i < welcomeText.length) {
                    welcomeElement.textContent += welcomeText.charAt(i);
                    i++;
                    setTimeout(typeWriter, 30);
                }
            }
            
            setTimeout(typeWriter, 1000);
        };
    </script>
</body>
</html>
