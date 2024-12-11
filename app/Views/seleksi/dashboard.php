<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Seleksi Ketua Departemen</title>
    <style>
        /* Styling untuk background */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://img.freepik.com/free-photo/close-up-office-supplies-yellow-background_23-2148052639.jpg?t=st=1732175983~exp=1732179583~hmac=b4ce74133e5ac91b3105f15e8e357f57bca9eb7053ef3dcb1c5ecf7ae5adaec8&w=1380') no-repeat center center fixed;
            /* Ganti path ini */
            background-size: cover;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            /* Tambahkan transparansi */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #3a3f44;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }

        .button-group {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .button {
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #4a646e;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sistem Pendukung Keputusan</h1>
        <p>
            Aplikasi ini dirancang untuk membantu proses seleksi Ketua Departemen Mahasiswa dengan menggunakan metode
            <strong>Simple Additive Weighting (SAW)</strong>. Sistem ini memungkinkan perhitungan dan perbandingan kriteria
            untuk memilih kandidat terbaik berdasarkan bobot dan nilai yang telah ditentukan.
        </p>
        <p>
            Anda dapat melihat data kriteria, data alternatif, dan data nilai, atau melakukan perhitungan SAW untuk menampilkan hasil ranking kandidat.
        </p>
        <div class="button-group">
            <a href="/seleksi" class="button">Masuk</a>
        </div>
    </div>
</body>

</html>