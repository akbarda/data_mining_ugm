<?php
include("require.php");
$type = "1";
$msg = "";
$judul_msg = '404';
$tombol = 'Ok!';
$judul = "Data Scholar UI";
if (isset($_GET['id'])) {
    if(DB::query('SELECT id FROM user WHERE id = :id ',array(':id'=>$_GET['id']))){
        $content = Layout::user($_GET['id']);
        echo Layout::Page($judul, $msg, $judul_msg, $type, $tombol, $content);
    }else{
        $content = "Swal.fire({
            title: '404!',
            text: 'Page User Not Found With id ".$_GET['id']."',
            type: 'error',
            confirmButtonText: 'Ok!'
          })";
        setcookie('notif', $content, time() + 1, '/', null, null, null);
        redirect('./');
    }
}else{

    $content = "Swal.fire({
        title: '404!',
        text: 'Page Not Found',
        type: 'error',
        confirmButtonText: 'Ok!'
      })";
    setcookie('notif', $content, time() + 1, '/', null, null, null);
    redirect('./');
}