 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Quest: Misterios de Huánuco</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-black: #000;
            --matrix-glow: 0 0 10px var(--matrix-green), 0 0 20px var(--matrix-green);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', monospace;
        }
        
        body {
            background-color: var(--matrix-black);
            color: var(--matrix-green);
            min-height: 100vh;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Efecto de lluvia de código Matrix */
        .matrix-rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }
        
        .matrix-code {
            position: absolute;
            font-size: 18px;
            color: var(--matrix-green);
            animation: fall linear infinite;
            text-shadow: var(--matrix-glow);
        }
        
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
        
        .container {
            width: 90%;
            max-width: 500px;
            margin: 2rem auto;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px var(--matrix-green);
            border: 1px solid var(--matrix-green);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: containerFade 2s ease-out;
            padding: 40px 30px;
            text-align: center;
        }
        
        @keyframes containerFade {
            from { 
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        header {
            margin-bottom: 40px;
            color: var(--matrix-green);
            position: relative;
            overflow: hidden;
            text-shadow: var(--matrix-glow);
        }
        
        h1 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            letter-spacing: 2px;
            animation: flicker 5s infinite alternate;
        }
        
        @keyframes flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: var(--matrix-glow);
                opacity: 1;
            }
            20%, 24%, 55% {
                text-shadow: none;
                opacity: 0.7;
            }
        }
        
        .subtitle {
            font-size: 1rem;
            opacity: 0.9;
            letter-spacing: 1px;
            color: rgba(0, 255, 65, 0.8);
        }
        
        .auth-options {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .auth-btn {
            background: rgba(0, 20, 0, 0.5);
            border-radius: 5px;
            padding: 18px 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--matrix-green);
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 255, 65, 0.3);
            color: var(--matrix-green);
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .auth-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 0%, rgba(0, 255, 65, 0.1) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }
        
        .auth-btn:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0 20px var(--matrix-green);
        }
        
        .auth-btn:hover::before {
            transform: translateX(100%);
        }
        
        .auth-btn i {
            transition: transform 0.3s ease;
        }
        
        .auth-btn:hover i {
            transform: translateX(5px);
        }
        
        footer {
            text-align: center;
            margin-top: 40px;
            color: var(--matrix-green);
            font-size: 0.8rem;
            text-shadow: 0 0 5px var(--matrix-green);
            letter-spacing: 1px;
            opacity: 0.7;
        }
        
        /* Efecto de partículas */
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
            background: var(--matrix-green);
            border-radius: 50%;
            opacity: 0;
            animation: particleFloat 10s linear infinite;
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100vw);
                opacity: 0;
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="matrix-rain" id="matrixRain"></div>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <header>
            <h1>BIENVENIDO A TURISMO QUEST</h1>
            <p class="subtitle">MISTERIOS DE HUÁNUCO</p>
        </header>
        
        <div class="auth-options">
            <a href="{{ route('usuarios.login') }}" class="auth-btn">
    <i class="fas fa-sign-in-alt"></i>
    INICIAR SESIÓN
</a>

<a href="{{ route('usuarios.create') }}" class="auth-btn">
    <i class="fas fa-user-plus"></i>
    CREAR CUENTA
</a>

        </div>
        
        <footer>
            <p>SISTEMA DESARROLLADO CON EL KOKORO❤️ - {{ date('Y') }}</p>
        </footer>
    </div>

    <script>
        // Crear efecto de lluvia Matrix
        function createMatrixRain() {
            const matrixRain = document.getElementById('matrixRain');
            const characters = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン';
            
            for (let i = 0; i < 50; i++) {
                const code = document.createElement('div');
                code.classList.add('matrix-code');
                code.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                code.style.left = Math.random() * 100 + 'vw';
                code.style.animationDuration = (Math.random() * 5 + 3) + 's';
                code.style.opacity = Math.random() * 0.5 + 0.5;
                code.style.fontSize = (Math.random() * 10 + 14) + 'px';
                matrixRain.appendChild(code);
                
                // Reiniciar la animación cuando termine
                code.addEventListener('animationend', function() {
                    this.style.top = '-50px';
                    this.style.left = Math.random() * 100 + 'vw';
                    this.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                });
            }
        }
        
        // Crear efecto de partículas
        function createParticles() {
            const particles = document.getElementById('particles');
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.width = (Math.random() * 5 + 2) + 'px';
                particle.style.height = particle.style.width;
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particle.style.animationDelay = (Math.random() * 5) + 's';
                particles.appendChild(particle);
            }
        }
        
        // Animación de entrada
        document.addEventListener('DOMContentLoaded', function() {
            createMatrixRain();
            createParticles();
            
            // Efecto de escritura para el título
            const title = document.querySelector('h1');
            const subtitle = document.querySelector('.subtitle');
            
            const originalTitle = title.textContent;
            const originalSubtitle = subtitle.textContent;
            
            title.textContent = "";
            subtitle.textContent = "";
            
            let i = 0;
            let j = 0;
            
            const typeWriterTitle = () => {
                if (i < originalTitle.length) {
                    title.textContent += originalTitle.charAt(i);
                    i++;
                    setTimeout(typeWriterTitle, 100);
                } else {
                    typeWriterSubtitle();
                }
            };
            
            const typeWriterSubtitle = () => {
                if (j < originalSubtitle.length) {
                    subtitle.textContent += originalSubtitle.charAt(j);
                    j++;
                    setTimeout(typeWriterSubtitle, 70);
                }
            };
            
            setTimeout(typeWriterTitle, 500);
        });
    </script>
</body>
</html>