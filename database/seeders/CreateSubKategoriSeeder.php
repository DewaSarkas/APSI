<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sub_kategori;

class CreateSubKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_kategori = [
            [
                'nama' => 'A.',
                'keterangan' => 'Dokumen formal sistem tata pamong sesuai konteks institusi untuk menjamin akuntabilitas, keberlanjutan dan transparansi, serta mitigasi potensi risiko.',
                'kategori_id' => '1',
            ],
            [
                'nama' => 'B.',
                'keterangan' => 'Bukti yang sahih terkait upaya institusi melindungi integritas akademik dan kualitas pendidikan tinggi.',
                'kategori_id' => '1',
            ],
            [
                'nama' => 'C.',
                'keterangan' => 'Dokumen formal struktur organisasi dan tata kerja institusi beserta tugas dan fungsinya.',
                'kategori_id' => '1',
            ],
            [
                'nama' => 'D.',
                'keterangan' => 'Bukti yang sahih terkait praktik baik perwujudan Good University Governance (paling tidak mencakup aspek kredibilitas, transparansi, akuntabilitas, tanggung jawab, dan keadilan), dan manajemen risiko.',
                'kategori_id' => '1',
            ],
            [
                'nama' => 'E.',
                'keterangan' => 'Keberadaan dan keberfungsian lembaga/fungsi penegakan kode etik untuk menjamin tata nilai dan integritas.',
                'kategori_id' => '1',
            ],
            [
                'nama' => 'A.',
                'keterangan' => 'Dokumen formal penetapan personil pada berbagai tingkat manajemen dengan tugas dan tanggung jawab yang jelas untuk mencapai visi, misi dan budaya serta tujuan strategis insitusi.',
                'kategori_id' => '2',
            ],
            [
                'nama' => 'B.',
                'keterangan' => 'Bukti yang sahih terkait terjalinnya komunikasi yang baik antara pimpinan dan stakeholders internal untuk mendorong tercapainya visi, misi, budaya, dan tujuan strategis institusi.',
                'kategori_id' => '2',
            ],
            [
                'nama' => 'C.',
                'keterangan' => 'Bukti kaji ulang dan perbaikan kepemimpinan dan struktur manajemen institusi untuk mencapai kinerja organisasi yang direncanakan.',
                'kategori_id' => '2',
            ],
            [
                'nama' => 'A.',
                'keterangan' => 'Bukti formal keberfungsian sistem pengelolaan fungsional dan operasional perguruan tinggi yang mencakup 5 aspek.',
                'kategori_id' => '3',
            ],
            [
                'nama' => 'B.',
                'keterangan' => 'Dokumen formal dan pedoman pengelolaan mencakup 11 aspek.',
                'kategori_id' => '3',
            ],
            [
                'nama' => 'C.',
                'keterangan' => 'Bukti yang sahih tentang implementasi kebijakan dan pedoman pengelolaan yang mencakup 11 aspek.',
                'kategori_id' => '3',
            ],
            [
                'nama' => 'D.',
                'keterangan' => 'Bukti yang sahih terkait praktek baik pengembangan budaya mutu di perguruan tinggi.',
                'kategori_id' => '3',
            ],
            [
                'nama' => 'A.',
                'keterangan' => 'Bukti yang sahih terkait praktek baik pengembangan budaya mutu di perguruan tinggi.',
                'kategori_id' => '4',
            ],
            [
                'nama' => 'B.',
                'keterangan' => 'Bukti yang sahih terkait praktek baik pengembangan budaya mutu di perguruan tinggi.',
                'kategori_id' => '4',
            ],
            [
                'nama' => 'A.',
                'keterangan' => 'Dokumen formal kebijakan dan prosedur pengembangan jejaring dan kemitraan (dalam dan luar negeri), dan monitoring dan evaluasi kepuasan mitra kerjasama.',
                'kategori_id' => '5',
            ],
            [
                'nama' => 'B.',
                'keterangan' => 'Dokumen perencanaan pengembangan jejaring dan kemitraan yang ditetapkan untuk mencapai visi, misi dan tujuan strategis institusi.',
                'kategori_id' => '5',
            ],
            [
                'nama' => 'C.',
                'keterangan' => 'Data jumlah, lingkup, relevansi, dan kebermanfaatan kerjasama.',
                'kategori_id' => '5',
            ],
            [
                'nama' => 'D.',
                'keterangan' => 'Bukti monitoring dan evaluasi pelaksanaan program kemitraan, tingkat kepuasan mitra kerjasama yang diukur dengan instrumen yang sahih, serta upaya perbaikan mutu jejaring dan kemitraan untuk menjamin ketercapaian visi, misi dan tujuan strategis.',
                'kategori_id' => '5',
            ],
            [
                'nama' => 'Pelampauan SN-DIKTI (indikator kinerja tambahan) yang ditetapkan oleh perguruan tinggi pada tiap kriteria',
                'keterangan' => 'Pelampauan SN-DIKTI (indikator kinerja tambahan) yang ditetapkan oleh perguruan tinggi pada tiap kriteria',
                'kategori_id' => '6',
            ],
            [
                'nama' => 'Analisis keberhasilan dan/atau ketidakberhasilan pencapaian kinerja yang telah ditetapkan institusi yang memenuhi 2 aspek',
                'keterangan' => 'Analisis keberhasilan dan/atau ketidakberhasilan pencapaian kinerja yang telah ditetapkan institusi yang memenuhi 2 aspek',
                'kategori_id' => '7',
            ],
            [
                'nama' => '1)',
                'keterangan' => 'keberadaan dokumen formal penetapan standar mutu,',
                'kategori_id' => '8',
            ],
            [
                'nama' => '2)',
                'keterangan' => 'standar mutu dilaksanakan secara konsisten,',
                'kategori_id' => '8',
            ],
            [
                'nama' => '3)',
                'keterangan' => 'monitoring, evaluasi dan pengendalian terhadap standar mutu yang telah ditetapkan, dan',
                'kategori_id' => '8',
            ],
            [
                'nama' => '4)',
                'keterangan' => 'hasilnya ditindak lanjuti untuk perbaikan dan peningkatan mutu.',
                'kategori_id' => '8',
            ],
            [
                'nama' => 'Tingkat kepuasan pemangku kepentingan internal dan eksternal pada masing-masing kriteria.',
                'keterangan' => 'Tingkat kepuasan pemangku kepentingan internal dan eksternal pada masing-masing kriteria.',
                'kategori_id' => '9',
            ],
        ];

        foreach ($sub_kategori as $key => $value) {
            sub_kategori::create($value);
        }

    }
}
