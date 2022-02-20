<?php

$table = 'penilaian';
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

if(get_role(auth()->user->id)->name == 'siswa')
{
    $siswa = $db->single('calon_siswa',[
        'user_id' => auth()->user->id
    ]);
    $data = $db->all($table,[
        'id_calon_siswa' => $siswa->id
    ]);
}
else
{
    $data = $db->all($table);
}

$kriterias = $db->all('kriteria');

// normalisasi data
$normalisasi_data = [];
foreach($data as $d)
{
    $kriteria = $db->single('kriteria',[
        'id' => $d->id_kriteria
    ]);
    $subkriteria = $db->single('subkriteria',[
        'id' => $d->id_subkriteria
    ]);
    $normalisasi_data[$d->id_calon_siswa][$kriteria->id] = $subkriteria->bobot;
}

// gap
$siswa = [];
$gaps = [];
$gap_results = [];
foreach($normalisasi_data as $id_calon_siswa => $kriteria)
{
    $siswa[] = $db->single('calon_siswa',[
        'id' => $id_calon_siswa
    ]);
    foreach($kriteria as $id_kriteria => $nilai)
    {
        $k = $db->single('kriteria',[
            'id' => $id_kriteria
        ]);
        $selisih = $nilai - $k->bobot;
        $gaps[$id_calon_siswa][$id_kriteria] = $selisih;
        $db_gap = $db->single('gap',[
            'selisih' => $selisih
        ]);
        $gap_results[$id_calon_siswa][$id_kriteria] = $db_gap->nilai;
    }
}

$jurusan = $db->all('jurusan');
foreach($jurusan as $j)
{
    $j->factor = $db->all('faktor_jurusan',[
        'id_jurusan' => $j->id
    ]);
}

return [
    'datas' => $data,
    'table' => $table,
    'kriterias' => $kriterias,
    'siswa' => $siswa,
    'normalisasi_data' => $normalisasi_data,
    'gaps' => $gaps,
    'gap_results' => $gap_results,
    'jurusan' => $jurusan,
    'success_msg' => $success_msg
];