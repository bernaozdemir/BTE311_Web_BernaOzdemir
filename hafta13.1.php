<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veritabanı Bağlantısı</title>
</head>
<body>
    <h2>Kişi Ekle</h2>
    <form action="hafta13.1.php" method="POST">
        <label for="ad">Ad:</label><br>
        <input type="text" id="ad" name="ad" required><br><br>

        <label for="soyad">Soyad:</label><br>
        <input type="text" id="soyad" name="soyad" required><br><br>

        <label for="email">E-posta:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Ekle</button>
    </form>

    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı başarısız: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ad = $_POST["ad"];
            $soyad = $_POST["soyad"];
            $email = $_POST["email"];

            $sql = "INSERT INTO kisiler (ad, soyad, email) VALUES ('$ad', '$soyad', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Kayıt başarıyla eklendi.</p>";
            } else {
                echo "<p style='color: red;'>Hata: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
    ?>
</body>
</html>
