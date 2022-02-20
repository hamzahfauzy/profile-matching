<?php

$table = 'penilaian';
$conn = conn();
$db   = new Database($conn);

$siswa = $db->single('calon_siswa',[
    'user_id' => auth()->user->id
]);

$db->delete($table,[
    'id_calon_siswa' => $siswa->id
]);

set_flash_msg(['success'=>$table.' berhasil dihapus']);
header('location:index.php?r=siswa/index');
die();