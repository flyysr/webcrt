<?php
/**
 * 大文件切割上传，把每次上传的数据合并成一个文件
 */

$filename = './uploadss/' . $_POST['filename']; //确定上传的文件名
echo $filename;
//第一次上传时没有文件，就创建文件，此后上传只需要把数据追加到此文件中
if (!file_exists($filename)) {
    move_uploaded_file($_FILES['video']['tmp_name'], $filename);
} else {
    file_put_contents($filename, file_get_contents($_FILES['video']['tmp_name']), FILE_APPEND);
}
