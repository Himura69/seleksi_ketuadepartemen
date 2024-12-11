<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\NilaiModel;

class Seleksi extends BaseController
{
    protected $kriteriaModel;
    protected $alternatifModel;
    protected $nilaiModel;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->alternatifModel = new AlternatifModel();
        $this->nilaiModel = new NilaiModel();
    }

    // Fungsi menampilkan daftar alternatif
    public function index()
    {
        $data['kriteria'] = $this->kriteriaModel->findAll();
        $data['alternatif'] = $this->alternatifModel->findAll();
        $data['nilai'] = $this->nilaiModel->findAll();
        return view('seleksi/index', $data);
    }
    public function normalisasi()
    {
        $kriteria = $this->kriteriaModel->findAll();
        $alternatif = $this->alternatifModel->findAll();
        $nilai = $this->nilaiModel->findAll();

        // Hitung max atau min untuk setiap kriteria
        $maxMinValues = [];
        foreach ($kriteria as $k) {
            $values = array_column(
                array_filter($nilai, function ($n) use ($k) {
                    return $n['id_kriteria'] == $k['id_kriteria'];
                }),
                'nilai'
            );
            $maxMinValues[$k['id_kriteria']] = [
                'max' => max($values),
                'min' => min($values),
            ];
        }

        // Hitung normalisasi
        $normalisasi = [];
        foreach ($nilai as $n) {
            $kriteriaId = $n['id_kriteria'];
            $value = $n['nilai'];
            $normalisasi[] = [
                'id_alternatif' => $n['id_alternatif'],
                'id_kriteria' => $kriteriaId,
                'nilai' => $kriteria[array_search($kriteriaId, array_column($kriteria, 'id_kriteria'))]['tipe'] === 'benefit'
                    ? $value / $maxMinValues[$kriteriaId]['max']
                    : $maxMinValues[$kriteriaId]['min'] / $value,
            ];
        }

        // Kelompokkan normalisasi berdasarkan alternatif
        $normalizedData = [];
        foreach ($alternatif as $a) {
            $normalizedData[$a['id_alternatif']] = [
                'nama_alternatif' => $a['nama_alternatif'],
                'kriteria' => array_filter($normalisasi, function ($n) use ($a) {
                    return $n['id_alternatif'] == $a['id_alternatif'];
                }),
            ];
        }

        // Kirim data ke view
        return view('seleksi/normalisasi', [
            'kriteria' => $kriteria,
            'normalizedData' => $normalizedData,
        ]);
    }

    public function editNilai($id_alternatif)
    {
        $data['alternatif'] = $this->alternatifModel->find($id_alternatif);
        $data['kriteria'] = $this->kriteriaModel->findAll();
        $data['nilai'] = $this->nilaiModel->where('id_alternatif', $id_alternatif)->findAll();
        return view('seleksi/edit_nilai', $data);
    }

    // Update Nilai
    public function updateNilai($id_alternatif)
    {
        $kriteria = $this->kriteriaModel->findAll();

        foreach ($kriteria as $k) {
            $nilai = $this->request->getPost('nilai_' . $k['id_kriteria']);
            $this->nilaiModel->where('id_alternatif', $id_alternatif)
                ->where('id_kriteria', $k['id_kriteria'])
                ->set(['nilai' => $nilai])
                ->update();
        }

        return redirect()->to('/seleksi')->with('success', 'Data nilai berhasil diperbarui.');
    }

    // Hapus Nilai Berdasarkan Alternatif
    public function deleteNilai($id_alternatif)
    {
        $this->nilaiModel->where('id_alternatif', $id_alternatif)->delete();
        return redirect()->to('/seleksi')->with('success', 'Data nilai berhasil dihapus.');
    }


    // Fungsi untuk menambah alternatif baru
    public function createAlternatif()
    {
        return view('seleksi/create_alternatif');
    }

    public function storeAlternatif()
    {
        // Validasi input
        $this->alternatifModel->save([
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
        ]);

        // Mendapatkan ID alternatif yang baru ditambahkan
        $id_alternatif = $this->alternatifModel->getInsertID();

        // Ambil semua kriteria dan tambahkan nilai default untuk alternatif baru
        $kriteria = $this->kriteriaModel->findAll();
        foreach ($kriteria as $k) {
            $this->nilaiModel->save([
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $k['id_kriteria'],
                'nilai' => 0, // Set nilai default awal, misalnya 0
            ]);
        }

        return redirect()->to('/seleksi')->with('success', 'Alternatif baru berhasil ditambahkan.');
    }

    // Fungsi untuk mengedit alternatif
    public function editAlternatif($id)
    {
        $data['alternatif'] = $this->alternatifModel->find($id);
        return view('seleksi/edit_alternatif', $data);
    }

    public function updateAlternatif($id)
    {
        $this->alternatifModel->update($id, [
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
        ]);

        return redirect()->to('/seleksi')->with('success', 'Alternatif berhasil diperbarui.');
    }

    // Fungsi untuk menghapus alternatif
    public function deleteAlternatif($id)
    {
        try {
            // Hapus data nilai yang terkait dengan alternatif tersebut terlebih dahulu
            $this->nilaiModel->where('id_alternatif', $id)->delete();

            // Hapus data alternatif
            $this->alternatifModel->delete($id);

            return redirect()->to('/seleksi')->with('success', 'Alternatif berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to('/seleksi')->with('error', 'Gagal menghapus alternatif: ' . $e->getMessage());
        }
    }
    public function createKriteria()
    {
        return view('seleksi/create_kriteria');
    }

    public function storeKriteria()
    {
        $this->kriteriaModel->save([
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'tipe' => $this->request->getPost('tipe'),
        ]);
        return redirect()->to('/seleksi')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    // Edit Kriteria
    public function editKriteria($id)
    {
        $data['kriteria'] = $this->kriteriaModel->find($id);
        return view('seleksi/edit_kriteria', $data);
    }

    public function updateKriteria($id)
    {
        $this->kriteriaModel->update($id, [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'tipe' => $this->request->getPost('tipe'),
        ]);
        return redirect()->to('/seleksi')->with('success', 'Kriteria berhasil diperbarui.');
    }

    // Hapus Kriteria
    public function deleteKriteria($id)
    {
        $this->kriteriaModel->delete($id);
        return redirect()->to('/seleksi')->with('success', 'Kriteria berhasil dihapus.');
    }

    public function hitungSAW()
    {
        // Ambil data kriteria, alternatif, dan nilai
        $kriteria = $this->kriteriaModel->findAll();
        $alternatif = $this->alternatifModel->findAll();
        $nilai = $this->nilaiModel->findAll();

        // Inisialisasi array untuk menampung hasil normalisasi dan preferensi akhir
        $normalisasi = [];
        $preferensi = [];

        // Langkah 1: Normalisasi nilai untuk setiap kriteria
        foreach ($kriteria as $k) {
            $id_kriteria = $k['id_kriteria'];
            $tipe = $k['tipe'];

            // Cari nilai maksimum atau minimum tergantung tipe kriteria
            $nilai_kriteria = array_filter($nilai, function ($n) use ($id_kriteria) {
                return $n['id_kriteria'] == $id_kriteria;
            });
            $nilai_kriteria = array_column($nilai_kriteria, 'nilai');

            $max = max($nilai_kriteria);
            $min = min($nilai_kriteria);

            // Normalisasi nilai
            foreach ($nilai as $n) {
                if ($n['id_kriteria'] == $id_kriteria) {
                    $nilai_ternormalisasi = ($tipe == 'benefit')
                        ? $n['nilai'] / $max
                        : $min / $n['nilai'];
                    $normalisasi[$n['id_alternatif']][$id_kriteria] = $nilai_ternormalisasi;
                }
            }
        }

        // Langkah 2: Hitung preferensi dengan mengalikan nilai normalisasi dengan bobot
        foreach ($alternatif as $a) {
            $id_alternatif = $a['id_alternatif'];
            $preferensi[$id_alternatif] = 0;

            foreach ($kriteria as $k) {
                $id_kriteria = $k['id_kriteria'];
                $bobot = $k['bobot'];

                if (isset($normalisasi[$id_alternatif][$id_kriteria])) {
                    $preferensi[$id_alternatif] += $normalisasi[$id_alternatif][$id_kriteria] * $bobot;
                }
            }
        }

        // Mengurutkan preferensi dari yang terbesar ke yang terkecil
        arsort($preferensi);

        // Mengambil nama alternatif berdasarkan ID dan menggabungkan dengan nilai preferensi
        $result = [];
        foreach ($preferensi as $id_alternatif => $nilai_preferensi) {
            $nama_alternatif = array_column($alternatif, 'nama_alternatif', 'id_alternatif')[$id_alternatif];
            $result[] = [
                'nama_alternatif' => $nama_alternatif,
                'nilai_preferensi' => $nilai_preferensi
            ];
        }

        // Kirimkan hasil ke view
        $data['result'] = $result;
        return view('seleksi/hasil', $data);
    }
}
