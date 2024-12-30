<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Features Demo</title>
    <style>
        /* Duyuru penceresi stili */
        #announcement {
            display: none;
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #333;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Test kutusu stili */
        #quiz {
            margin: 20px;
        }

        /* Canvas alanı */
        canvas {
            display: block;
            margin: 20px auto;
            border: 1px solid #000;
        }
    </style>
</head>
<body>

    <!-- Duyuru Penceresi -->
    <div id="announcement">
        Bu bir duyurudur! 5 saniye sonra kapanacak.
    </div>

    <!-- Test Kutusu -->
    <div id="quiz">
        <h2>10 Soruluk Test</h2>
        <ol>
            <li>Soru 1: HTML nedir?</li>
            <li>Soru 2: CSS nedir?</li>
            <li>Soru 3: JavaScript nedir?</li>
            <li>Soru 4: DOM nedir?</li>
            <li>Soru 5: Bir döngü ne zaman kullanılır?</li>
            <li>Soru 6: Bir canvas nedir?</li>
            <li>Soru 7: Web API nedir?</li>
            <li>Soru 8: Event Listener ne yapar?</li>
            <li>Soru 9: Responsive tasarım nedir?</li>
            <li>Soru 10: Media query ne işe yarar?</li>
        </ol>
    </div>

    <!-- Canvas Alanı -->
    <canvas id="colorGrid" width="500" height="500"></canvas>

    <script>
        // Duyuru Penceresi Gösterme ve Kapatma
        const announcement = document.getElementById('announcement');
        announcement.style.display = 'block';
        setTimeout(() => {
            announcement.style.display = 'none';
        }, 5000);

        // Canvas Üzerine 10x10 Renkli Kareler Çizme
        const canvas = document.getElementById('colorGrid');
        const ctx = canvas.getContext('2d');
        const rows = 10;
        const cols = 10;
        const squareSize = canvas.width / cols;

        for (let row = 0; row < rows; row++) {
            for (let col = 0; col < cols; col++) {
                ctx.fillStyle = `rgb(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255})`;
                ctx.fillRect(col * squareSize, row * squareSize, squareSize, squareSize);
            }
        }
    </script>

</body>
</html>

