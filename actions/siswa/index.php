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

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg
];