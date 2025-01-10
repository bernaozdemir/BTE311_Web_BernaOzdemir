<?php
$mysqli = new mysqli("localhost", "root", "", "anket");

// Bağlantı hatası kontrolü
if ($mysqli->connect_error) {
    die("Bağlantı hatası: " . $mysqli->connect_error);
}

// Anket sorularını getir
$sorular_sorgu = $mysqli->query("SELECT * FROM anket2_tablo");
if ($sorular_sorgu->num_rows > 0) {
    while ($soru = $sorular_sorgu->fetch_assoc()) {
        $soru_id = $soru['id'];
        $soru_metni = $soru['soru'];
        $secenekler = json_decode($soru['secenekler'], true);
        echo "<label>" . htmlspecialchars($soru_metni) . "</label>";
        echo "<div class='radio-group'>";
        foreach ($secenekler as $secenek) {
            echo "<input type='radio' name='cevap_$soru_id' value='" . htmlspecialchars($secenek) . "' id='cevap_" . $soru_id . "_" . htmlspecialchars($secenek) . "' required>";
            echo "<label for='cevap_" . $soru_id . "_" . htmlspecialchars($secenek) . "'>" . htmlspecialchars($secenek) . "</label>";
        }
        echo "</div>";
    }
}

if (isset($_POST['oyla'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'cevap_') === 0) {
            $soru_id = str_replace('cevap_', '', $key);
            $oy_sorgu = $mysqli->prepare("UPDATE anket2_tablo SET oylar = JSON_SET(oylar, ?, COALESCE(JSON_EXTRACT(oylar, ?), 0) + 1) WHERE id = ?");
            $json_key = '$."' . $value . '"';
            $oy_sorgu->bind_param('ssi', $json_key, $json_key, $soru_id);
            $oy_sorgu->execute();
        }
    }
    echo "<div class='alert alert-success mt-3'>Oylarınız kaydedildi!</div>";
}
?>
