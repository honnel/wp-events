<?php
    $filename = $_POST['filename'];
    $content = $_POST['content'];
    header("Content-type: text/plain");
    header("Content-Disposition: attachment; filename=" .$filename);
    header("Expires: 0");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    echo $content;
?>