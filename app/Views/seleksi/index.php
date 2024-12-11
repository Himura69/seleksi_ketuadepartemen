<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi Ketua Departemen</title>
    <style>
        /* Styling dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Styling header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            background-color: #5d7785;
            color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in;
        }

        .header .logo {
            height: 75px;
            width: auto;
        }

        .header h1 {
            margin: 0;
            font-size: 1.8em;
            font-weight: bold;
        }

        /* Animasi untuk header */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Kontainer utama */
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-dashboard-fixed {
            position: fixed;
            /* Menempatkan tombol pada posisi tetap di layar */
            bottom: 20px;
            /* Jarak dari bawah */
            left: 20px;
            /* Jarak dari kiri */
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-dashboard-fixed:hover {
            background-color: #4a646e;
            transform: translateY(-2px);
        }

        .btn-dashboard-fixed:active {
            background-color: #3a505a;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }


        h2 {
            color: #3a3f44;
            font-weight: 700;
            margin-bottom: 15px;
            animation: slideUp 1.5s ease;
        }

        /* Animasi untuk judul */
        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: scaleUp 1s ease-in-out;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
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

        /* Animasi untuk tabel */
        @keyframes scaleUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Styling tombol */
        .btn,
        .btn-action,
        .btn-dashboard {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5d7785;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover,
        .btn-action:hover,
        .btn-dashboard:hover {
            background-color: #4a646e;
            transform: translateY(-5px);
        }

        .btn-dashboard:active {
            background-color: #3a505a;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
    </style>
</head>

<body>

    <!-- Header dengan logo dan judul -->
    <header class="header">
        <img src="/images/Frame 75.jpg" alt="Logo UAS" class="logo">
        <h1>Aplikasi Keputusan Seleksi Ketua Departemen</h1>
    </header>

    <div class="container">
        <a href="/dashboard" class="btn-dashboard-fixed">Kembali ke Dashboard</a>


        <!-- Tabel Data Kriteria -->
        <h2>Data Kriteria</h2>
        <a href="/seleksi/createKriteria" class="btn">Tambah Kriteria</a>
        <table>
            <tr>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($kriteria as $k): ?>
                <tr>
                    <td><?= esc($k['nama_kriteria']) ?></td>
                    <td><?= esc($k['bobot']) ?></td>
                    <td><?= esc($k['tipe']) ?></td>
                    <td class="action-buttons">
                        <a href="/seleksi/editKriteria/<?= esc($k['id_kriteria']) ?>" class="btn-action">Edit</a>
                        <a href="/seleksi/deleteKriteria/<?= esc($k['id_kriteria']) ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Hapus</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Tabel Data Alternatif -->
        <h2>Data Alternatif</h2>
        <a href="/seleksi/createAlternatif" class="btn">Tambah Alternatif</a>
        <table>
            <tr>
                <th>Nama Alternatif</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($alternatif as $a): ?>
                <tr>
                    <td><?= esc($a['nama_alternatif']) ?></td>
                    <td class="action-buttons">
                        <a href="/seleksi/editAlternatif/<?= esc($a['id_alternatif']) ?>" class="btn-action">Edit</a>
                        <a href="/seleksi/deleteAlternatif/<?= esc($a['id_alternatif']) ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Tabel Data Nilai -->
        <h2>Data Nilai</h2>
        <table>
            <tr>
                <th>Alternatif</th>
                <?php foreach ($kriteria as $k): ?>
                    <th>Kriteria <?= esc($k['id_kriteria']) ?></th>
                <?php endforeach; ?>
                <th>Aksi</th>
            </tr>
            <?php
            $nilaiPerAlternatif = [];
            foreach ($nilai as $n) {
                $nilaiPerAlternatif[$n['id_alternatif']][$n['id_kriteria']] = $n['nilai'];
            }

            foreach ($alternatif as $a):
            ?>
                <tr>
                    <td><?= esc($a['nama_alternatif']) ?></td>
                    <?php foreach ($kriteria as $k): ?>
                        <td>
                            <?= isset($nilaiPerAlternatif[$a['id_alternatif']][$k['id_kriteria']])
                                ? esc($nilaiPerAlternatif[$a['id_alternatif']][$k['id_kriteria']])
                                : '-' ?>
                        </td>
                    <?php endforeach; ?>
                    <td class="action-buttons">
                        <a href="/seleksi/editNilai/<?= esc($a['id_alternatif']) ?>" class="btn-action">Edit</a>
                        <a href="/seleksi/deleteNilai/<?= esc($a['id_alternatif']) ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data nilai untuk alternatif ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Tombol Aksi -->
        <a href="/seleksi/hitungSAW" class="btn">Lihat Perhitungan SAW</a>
        <a href="/seleksi/normalisasi" class="btn">Lihat Hasil Normalisasi</a>

    </div>
</body>

</html>