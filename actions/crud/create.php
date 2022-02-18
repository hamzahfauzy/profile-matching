<?php

$table = $_GET['table'];

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $db->insert($table,$_POST[$table]);

    set_flash_msg(['success'=>$table.' berhasil ditambahkan']);
    header('location:index.php?r='.$table.'/index');
}

return compact('table');