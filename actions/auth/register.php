<?php

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    // create user login
    $_POST['users']['name'] = $_POST['siswa']['nama'];
    $_POST['users']['password'] = md5($_POST['users']['password']);
    $user = $db->insert('users',$_POST['users']);

    $_POST['siswa']['user_id'] = $user->id;
    $db->insert('calon_siswa',$_POST['siswa']);

    // get roles
    $role = $db->single('roles',[
        'name' => 'siswa'
    ]);

    // assign role to user
    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => $role->id
    ]);

    set_flash_msg(['success'=>'Pendaftaran Berhasil']);
    header('location:index.php?r=auth/login');
    die();

}