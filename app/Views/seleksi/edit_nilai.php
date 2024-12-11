<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
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
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #3a3f44;
            font-weight: 700;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        /* Styling form */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            text-align: left;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            font-size: 1em;
            font-weight: bold;
            color: #5d7785;
            background-color: #eef1f4;
        }

        td input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Tombol Update */
        .btn-update {
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .btn-update:hover {
            background-color: #4a646e;
        }

        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            margin-top: 15px;
            color: #5d7785;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9em;
        }

        .btn-back:hover {
            color: #4a646e;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Nilai untuk Alternatif: <?= esc($alternatif['nama_alternatif']) ?></h2>

        <form action="/seleksi/updateNilai/<?= esc($alternatif['id_alternatif']) ?>" method="post">
            <?= csrf_field() ?>
            <table>
                <tr>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                </tr>
                <?php foreach ($kriteria as $k): ?>
                    <tr>
                        <td><?= esc($k['nama_kriteria']) ?></td>
                        <td>
                            <!-- Format input nilai menjadi desimal -->
                            <input type="number"
                                name="nilai_<?= esc($k['id_kriteria']) ?>"
                                value="<?= esc($nilai[$k['id_kriteria'] - 1]['nilai']) ?>"
                                required
                                step="0.01"
                                min="0"
                                placeholder="Masukkan nilai desimal">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit" class="btn-update">Update Nilai</button>
        </form>
        <a href="/seleksi" class="btn-back">Kembali</a>
    </div>

</body>

</html>