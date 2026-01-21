<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Kalkulator</title>

    <style>
        /* Mengatur tampilan dasar halaman */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        /* Box utama kalkulator */
        .container {
            width: 350px;
            margin: 60px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Judul */
        h2 {
            text-align: center;
        }

        /* Mengatur input, select, dan button agar sama ukuran */
        input, select, button {
            width: 100%;
            height: 40px;           /* Tinggi disamakan */
            padding: 8px;
            margin-top: 10px;
            box-sizing: border-box; /* Supaya padding tidak bikin beda ukuran */
        }

        /* Tampilan hasil */
        .hasil {
            margin-top: 15px;
            background: #eaeaea;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator Sederhana</h2>

    <!-- Form input kalkulator -->
    <form method="post">
        <label>Bilangan 1</label>
        <input type="number" name="angka1" required>

        <label>Bilangan 2</label>
        <input type="number" name="angka2" required>

        <label>Operator</label>
        <select name="operator" required>
            <option value="+">Penjumlahan (+)</option>
            <option value="-">Pengurangan (-)</option>
            <option value="*">Perkalian (*)</option>
            <option value="/">Pembagian (/)</option>
            <option value="%">Modulus (%)</option>
        </select>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    /*
        Mengecek apakah tombol "Hitung" ditekan
    */
    if (isset($_POST['hitung'])) {

        // Mengambil nilai dari form
        $angka1   = $_POST['angka1'];
        $angka2   = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil    = 0;

        /*
            Proses perhitungan menggunakan switch
            sesuai operator yang dipilih
        */
        switch ($operator) {
            case "+":
                $hasil = $angka1 + $angka2;
                break;

            case "-":
                $hasil = $angka1 - $angka2;
                break;

            case "*":
                $hasil = $angka1 * $angka2;
                break;

            case "/":
                // Validasi agar tidak dibagi dengan nol
                if ($angka2 == 0) {
                    echo "<div class='hasil'>Error: Tidak bisa dibagi 0</div>";
                    exit;
                }
                $hasil = $angka1 / $angka2;
                break;

            case "%":
                // Modulus (sisa hasil bagi)
                $hasil = $angka1 % $angka2;
                break;
        }

        // Menampilkan hasil perhitungan
        echo "<div class='hasil'>";
        echo "<strong>Hasil:</strong> $hasil";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
