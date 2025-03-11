<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function getNumerologyNumber($name) {
        $alphabet = [
            'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7, 'H' => 8, 'I' => 9,
            'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 6, 'P' => 7, 'Q' => 8, 'R' => 9,
            'S' => 1, 'T' => 2, 'U' => 3, 'V' => 4, 'W' => 5, 'X' => 6, 'Y' => 7, 'Z' => 8
        ];
        
        $name = strtoupper(str_replace(' ', '', $name));
        $sum = 0;
        
        for ($i = 0; $i < strlen($name); $i++) {
            if (isset($alphabet[$name[$i]])) {
                $sum += $alphabet[$name[$i]];
            }
        }
        
        while ($sum > 9) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    function getCompatibility($num1, $num2) {
        $compatibilityMatrix = [
            [100, 70, 80, 90, 60, 50, 85, 75, 65],
            [70, 100, 75, 80, 85, 55, 90, 65, 50],
            [80, 75, 100, 70, 60, 90, 50, 85, 55],
            [90, 80, 70, 100, 65, 75, 85, 50, 60],
            [60, 85, 60, 65, 100, 55, 75, 90, 80],
            [50, 55, 90, 75, 55, 100, 70, 80, 85],
            [85, 90, 50, 85, 75, 70, 100, 55, 60],
            [75, 65, 85, 50, 90, 80, 55, 100, 70],
            [65, 50, 55, 60, 80, 85, 60, 70, 100]
        ];
    
        return $compatibilityMatrix[$num1 - 1][$num2 - 1];
    }

    // Alasan sesuai dengan kecocokan numerologi
    function getReason($compatibility) {
        if ($compatibility >= 80) {
            return "🔥 Kecocokan sangat tinggi, pasangan ini bisa menjadi yang terbaik!";
        } elseif ($compatibility >= 60) {
            return "😊 Kecocokan cukup baik, hubungan ini akan berjalan dengan baik.";
        } elseif ($compatibility >= 40) {
            return "🤔 Kecocokan sedang, mungkin ada beberapa tantangan dalam hubungan.";
        } else {
            return "⚡ Kecocokan rendah, hubungan ini mungkin memerlukan banyak usaha.";
        }
    }

    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];

    $num1 = getNumerologyNumber($nama1);
    $num2 = getNumerologyNumber($nama2);
    $compatibility = getCompatibility($num1, $num2);
    $reason = getReason($compatibility);

    echo "🔮 <b>$nama1</b> (Numerologi: $num1) & <b>$nama2</b> (Numerologi: $num2)<br>";
    echo "❤️ Kecocokan: <b>$compatibility%</b>|$reason";
}
?>
