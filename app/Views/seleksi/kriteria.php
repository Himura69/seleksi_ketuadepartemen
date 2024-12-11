<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kriteria</title>
</head>
<body>
    <h1>Data Kriteria</h1>
    <a href="/seleksi/createKriteria">Tambah Kriteria</a>
    <table border="1">
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
                <td>
                    <a href="/seleksi/editKriteria/<?= esc($k['id_kriteria']) ?>">Edit</a> |
                    <a href="/seleksi/deleteKriteria/<?= esc($k['id_kriteria']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
