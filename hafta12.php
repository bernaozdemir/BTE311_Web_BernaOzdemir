<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hafta 12 Görevleri</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Hafta 12 Görevleri</h1>
    
    <!-- Görev 1: Tek Sayılar -->
    <section>
        <h2>1-100 Arası Tek Sayılar</h2>
        <ul>
            <?php
            for ($i = 1; $i <= 100; $i++) {
                if ($i % 2 != 0) {
                    echo "<li>$i</li>";
                }
            }
            ?>
        </ul>
    </section>
    
    <hr>
    
    <!-- Görev 2: Dinamik Tablo -->
    <section>
        <h2>Dinamik Tablo Oluşturma</h2>
        <form method="POST" action="">
            <label for="rows">Satır Sayısı:</label>
            <input type="number" id="rows" name="rows" min="1" required>
            <label for="columns">Sütun Sayısı:</label>
            <input type="number" id="columns" name="columns" min="1" required>
            <button type="submit">Tablo Oluştur</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rows = intval($_POST["rows"]);
            $columns = intval($_POST["columns"]);

            echo "<h3>Oluşturulan Tablo</h3>";
            echo "<table>";
            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columns; $j++) {
                    $randomNumber = rand(1, 100);
                    echo "<td>$randomNumber</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </section>
</body>
</html>

