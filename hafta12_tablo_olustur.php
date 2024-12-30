<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamik Tablo</title>
</head>
<body>
    <h1>Dinamik Tablo Oluşturucu</h1>
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

        echo "<h2>Oluşturulan Tablo</h2>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
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
</body>
</html>
