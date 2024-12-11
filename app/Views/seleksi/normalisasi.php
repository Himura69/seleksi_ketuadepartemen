<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Normalisasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #5d7785;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #5d7785;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling tombol back */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover {
            background-color: #4a646e;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hasil Normalisasi Nilai</h2>
        <table>
            <tr>
                <th>Alternatif</th>
                <?php foreach ($kriteria as $k): ?>
                    <th><?= esc($k['nama_kriteria']) ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($normalizedData as $data): ?>
                <tr>
                    <td><?= esc($data['nama_alternatif']) ?></td>
                    <?php foreach ($data['kriteria'] as $n): ?>
                        <td><?= number_format($n['nilai'], 4) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>    

        <!-- Tombol Back -->
        <a href="/seleksi" class="btn-back">Kembali ke Data perhitungan</a>
    </div>
</body>

</html>