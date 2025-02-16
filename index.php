<!DOCTYPE html>
<html>
<head>
    <title>Happy Valentine's Day</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&family=Pacifico&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .container {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            max-width: 600px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        h1 {
            color: #e44d4d;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Pacifico', cursive;
        }

        .name-container {
            position: relative;
            margin: 2rem 0;
            padding: 1rem;
        }

        .name {
            color: #e44d4d;
            font-size: 2.2rem;
            font-family: 'Great Vibes', cursive;
            position: relative;
            display: inline-block;
            margin: 0;
            padding: 0.5rem 2rem;
            text-shadow: 2px 2px 4px rgba(228, 77, 77, 0.2);
        }

        .name::before,
        .name::after {
            content: '❦';
            font-size: 1.5rem;
            color: #e44d4d;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
        }

        .name::before {
            left: -10px;
        }

        .name::after {
            right: -10px;
        }

        .name-border {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid transparent;
            border-image: linear-gradient(45deg, transparent 10%, #ff6b6b 10%, #ff6b6b 90%, transparent 90%);
            border-image-slice: 1;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .name-container:hover .name-border {
            transform: scale(1.05);
            opacity: 1;
        }

        .name-container:hover .name {
            text-shadow: 3px 3px 6px rgba(228, 77, 77, 0.3);
        }

        .button {
            display: inline-block;
            padding: 1rem 2rem;
            background: #e44d4d;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: 1rem;
        }

        .button:hover {
            background: #ff6b6b;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .rose {
            position: absolute;
            pointer-events: none;
            z-index: 1000;
        }

        .rose-petal {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #ff3366;
            border-radius: 50% 0 50% 0;
            transform-origin: 0% 0%;
            animation: rotatePetal 3s infinite linear;
            opacity: 0.9;
        }

        .rose-center {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #cc0033;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes rotatePetal {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes roseFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .hearts {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .heart {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #ff6b6b;
            transform: rotate(45deg);
            animation: heartFloat 4s ease-in infinite;
            opacity: 0;
        }

        .heart::before,
        .heart::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ff6b6b;
        }

        .heart::before {
            left: -10px;
        }

        .heart::after {
            top: -10px;
        }

        @keyframes heartFloat {
            0% { transform: translateY(0) rotate(45deg); opacity: 0; }
            50% { opacity: 0.8; }
            100% { transform: translateY(-100vh) rotate(45deg); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="hearts" id="heartsContainer"></div>
    <div class="container">
        <h1>Happy Valentine's Day!</h1>
        <div class="name-container">
            <div class="name-border"></div>
            <div class="name">Sellma Aulya Azizah</div>
        </div>
        <button class="button" onclick="showMessage()">Click Here</button>
    </div>

    <script>
        function createHeart() {
            const heart = document.createElement('div');
            heart.className = 'heart';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.animationDuration = (Math.random() * 3 + 2) + 's';
            document.getElementById('heartsContainer').appendChild(heart);
            
            setTimeout(() => {
                heart.remove();
            }, 5000);
        }

        function createRose() {
            const rose = document.createElement('div');
            rose.className = 'rose';
            rose.style.left = Math.random() * window.innerWidth + 'px';
            
            const center = document.createElement('div');
            center.className = 'rose-center';
            rose.appendChild(center);
            
            const numPetals = 12;
            const colors = ['#ff3366', '#ff4d4d', '#ff6666', '#ff8080'];
            
            for(let i = 0; i < numPetals; i++) {
                const petal = document.createElement('div');
                petal.className = 'rose-petal';
                petal.style.transform = `rotate(${(360 / numPetals) * i}deg)`;
                petal.style.background = colors[Math.floor(Math.random() * colors.length)];
                petal.style.transformOrigin = '50% 50%';
                petal.style.left = '0px';
                petal.style.top = '0px';
                rose.appendChild(petal);
            }

            document.body.appendChild(rose);

            rose.animate([
                { transform: 'translateY(100vh) rotate(0deg)', opacity: 1 },
                { transform: 'translateY(-100vh) rotate(360deg)', opacity: 0 }
            ], {
                duration: 6000,
                easing: 'linear'
            }).onfinish = () => rose.remove();
        }

        setInterval(createHeart, 300);

        function showMessage() {
            alert('Sending you lots of love and warm wishes on this special day! ❤️');
            for(let i = 0; i < 15; i++) {
                setTimeout(createRose, i * 300);
            }
        }
    </script>
</body>
</html>