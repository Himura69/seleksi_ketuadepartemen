<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alternatif</title>
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
            font-weight: 700;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        /* Styling form */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            font-size: 1em;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }

        /* Tombol Simpan */
        .btn-save {
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-save:hover {
            background-color: #4a646e;
        }

        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            margin-top: 10px;
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
        <h2>Tambah Alternatif</h2>
        <form action="/seleksi/storeAlternatif" method="post">
            <?= csrf_field() ?>
            <label for="nama_alternatif">Nama Alternatif:</label>
            <input type="text" id="nama_alternatif" name="nama_alternatif" required>
            <button type="submit" class="btn-save">Simpan</button>
        </form>
        <a href="/seleksi" class="btn-back">Kembali</a>
    </div>

</body>
</html>
