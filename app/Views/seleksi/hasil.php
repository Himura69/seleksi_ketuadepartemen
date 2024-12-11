<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan dan Perangkingan SAW</title>
    <style>
        /* Styling dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Styling kontainer */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #3a3f44;
            font-weight: 700;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        /* Styling tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #5d7785;
            color: #ffffff;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #eef1f4;
        }

        /* Tombol kembali */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #4a646e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hasil Perhitungan dan Perangkingan SAW</h1>
        <table>
            <tr>
                <th>Ranking</th>
                <th>Nama Alternatif</th>
                <th>Nilai Preferensi</th>
            </tr>
            <?php $rank = 1; ?>
            <?php foreach ($result as $r): ?>
                <tr>
                    <td><?= $rank++; ?></td>
                    <td><?= esc($r['nama_alternatif']) ?></td>
                    <td><?= esc(number_format($r['nilai_preferensi'], 4)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="/seleksi" class="btn-back">Kembali</a>
    </div>
</body>
</html>
