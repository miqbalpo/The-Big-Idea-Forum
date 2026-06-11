<?php
$target = '../storage/app/public'; // Path ke folder original relatif dari public/
$link = 'storage'; // Nama shortcut di folder public/

if (symlink($target, $link)) {
    echo "Symbolic link berhasil dibuat: $link -> $target";
} else {
    echo "Gagal membuat symbolic link. Pastikan path benar dan izin akses sudah sesuai.";
}
?>