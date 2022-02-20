<?php

return [
    'dashboard' => 'default/index',
    'faktor'    => 'crud/index&table=faktor',
    'gap'       => 'crud/index&table=gap',
    'kriteria'  => 'crud/index&table=kriteria',
    'subkriteria'   => 'crud/index&table=subkriteria',
    'jurusan'   => 'crud/index&table=jurusan',
    'faktor jurusan'   => 'crud/index&table=faktor_jurusan',
    // 'calon siswa'  => 'crud/index&table=calon_siswa',
    'penilaian'  => 'siswa/index',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];