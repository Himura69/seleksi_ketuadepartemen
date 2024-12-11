<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #3a3f44;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button {
            padding: 10px;
            background-color: #5d7785;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4a646e;
        }

        a {
            color: #5d7785;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
        }

        a:hover {
            color: #4a646e;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tambah Kriteria</h2>
        <form action="/seleksi/storeKriteria" method="post">
            <?= csrf_field() ?>
            <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" required>
            <input type="number" name="bobot" step="0.01" placeholder="Bobot (contoh: 1.5)" required>
            <select name="tipe" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
            <button type="submit">Simpan</button>
        </form>
        <a href="/seleksi">Kembali</a>
    </div>

</body>
</html>
