<?php

$key = "KeyOfArbitraryLength";

function saveFile($dir, $content){
    $file = fopen($dir,"w");
    fwrite($file, $content);
    fclose($file);
}

function encryptFile($dir){
    global $key;

    $pltxt = "";
    $encryptedText = "";

    if (file_exists($dir)) {
        $file = fopen($dir,"r");

        if (filesize($dir) == 0){
            echo "Erro: File is Empty</br>";
        }

        if (filesize($dir) > 0){
            $pltxt = fread($file, filesize($dir));
            $encryptedText = encrypt($pltxt, $key);
            saveFile($dir,$encryptedText);
            echo "File encrypted successfully";
        }
        
        fclose($file);
    }
}

// header("location:reels.php");

?>