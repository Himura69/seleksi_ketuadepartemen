<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px;
            background-color: #5d7785;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4a646e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Kriteria</h2>
        <form action="/seleksi/updateKriteria/<?= esc($kriteria['id_kriteria']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="nama_kriteria" value="<?= esc($kriteria['nama_kriteria']) ?>" required>
            <input type="number" name="bobot" value="<?= esc($kriteria['bobot']) ?>" required>
            <select name="tipe" required>
                <option value="benefit" <?= $kriteria['tipe'] === 'benefit' ? 'selected' : '' ?>>Benefit</option>
                <option value="cost" <?= $kriteria['tipe'] === 'cost' ? 'selected' : '' ?>>Cost</option>
            </select>
            <button type="submit">Update</button>
        </form>
        <a href="/seleksi">Kembali</a>
    </div>
</body>
</html>
