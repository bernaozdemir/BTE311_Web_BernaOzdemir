<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişi Arama</title>
</head>
<body>
    <h2>Kişi Ara</h2>
    <form action="hafta11.2.php" method="POST">
        <label for="ad">Ad:</label><br>
        <input type="text" id="ad" name="ad" required><br><br>
        <button type="submit">Bul</button>
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı başarısız: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ad = $conn->real_escape_string($_POST["ad"]);

            $sql = "SELECT soyad, email FROM kisiler WHERE ad='$ad'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Sonuçlar:</h3>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p><strong>Soyad:</strong> " . $row["soyad"] . "<br>";
                    echo "<strong>E-posta:</strong> " . $row["email"] . "</p>";
                }
            } else {
                echo "<p style='color: red;'>Bu isimde bir kişi bulunamadı.</p>";
            }
        }

        $conn->close();
    ?>
</body>
</html>
