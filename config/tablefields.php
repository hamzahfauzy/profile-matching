<?php

return [
    'faktor'    => [
        'cf','sf'
    ],
    'gap'       => [
        'nama','selisih','nilai','keterangan'
    ],
    'kriteria'  => [
        'nama'
    ],
    'subkriteria'   => [
        'id_kriteria','nama','bobot'
    ],
    'jurusan'   => [
        'nama'
    ],
    'faktor_jurusan'   => [
        'id_kriteria','id_jurusan','sebagai'
    ],
    'calon_siswa'  => [
        'nama','alamat'
    ],
    'penilaian'  => [
        'id_calon_siswa','id_kriteria','id_subkriteria'
    ],
];