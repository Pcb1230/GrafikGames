<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
    echo "<script>window.location.href='../workshop.php?error=1'</script>";
}else{
    if(isset($_GET['path'])){
    $filename = $_GET['path'];
        if(file_exists($filename)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Content-Length: ' . filesize($filename));
            header('Pragma: public');
            flush();
            readfile($filename);
            die();
        }else{
            echo "Archivo no Existe.";
        }
    }
}
?>