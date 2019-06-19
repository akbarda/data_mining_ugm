<?php
include("require.php");
$type = "1";
$msg = "";
$judul_msg = '404';
$tombol = 'Ok!';
$judul = "Data Scholar UGM";
$content = Layout::warpCard(array(Layout::KlasterSearch()));
echo Layout::Page($judul, $msg, $judul_msg, $type, $tombol, $content);
