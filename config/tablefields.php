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
        'id_kriteria' => [
            'label' => 'Kriteria',
            'type'  => 'options-obj:kriteria,id,nama'
        ],
        'nama','bobot'
    ],
    'jurusan'   => [
        'nama'
    ],
    'faktor_jurusan'   => [
        'id_kriteria'=> [
            'label' => 'Kriteria',
            'type'  => 'options-obj:kriteria,id,nama'
        ],
        'id_jurusan'=> [
            'label' => 'Jurusan',
            'type'  => 'options-obj:jurusan,id,nama'
        ],
        'sebagai' => [
            'label' => 'Sebagai',
            'type'  => 'options:cf|sf'
        ]
    ],
    'calon_siswa'  => [
        'nama','alamat'
    ],
    'penilaian'  => [
        'id_calon_siswa'=> [
            'label' => 'Calon Siswa',
            'type'  => 'options-obj:calon_siswa,id,nama'
        ],
        'id_kriteria'=> [
            'label' => 'Kriteria',
            'type'  => 'options-obj:kriteria,id,nama'
        ],
        'id_subkriteria'=> [
            'label' => 'Sub Kriteria',
            'type'  => 'options-obj:subkriteria,id,nama'
        ]
    ],
];