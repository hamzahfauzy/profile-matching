<?php

$table = 'penilaian';
$conn = conn();
$db   = new Database($conn);

$siswa = $db->single('calon_siswa',[
    'user_id' => auth()->user->id
]);

if(request() == 'POST')
{
    $id_calon_siswa = $siswa->id;

    foreach($_POST['kriteria'] as $id_kriteria => $id_subkriteria)
    {
        $db->insert('penilaian',[
            'id_kriteria' => $id_kriteria,
            'id_subkriteria' => $id_subkriteria,
            'id_calon_siswa' => $id_calon_siswa,
        ]);
    }

    set_flash_msg(['success'=>$table.' berhasil dibuat']);
    header('location:index.php?r=siswa/index');
}

$kriteria = $db->all('kriteria');

foreach($kriteria as $k)
{
    $k->subkriteria = $db->all('subkriteria',[
        'id_kriteria' => $k->id
    ]);
}

return compact('table','kriteria');