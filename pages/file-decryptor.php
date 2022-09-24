<?php

require_once "crypto.php";

$file_path = "example/text.txt";

$key = "KeyOfArbitraryLength";

// function saveFile($dir, $content){
//     $file = fopen($dir,"w");
//     fwrite($file, $content);
//     fclose($file);
// }

function decryptFile($dir){
    global $key;

    $pltxt = "";
    $encryptedText = "";

    if (file_exists($dir)) {
        $file = fopen($dir,"r");

        if (filesize($dir) == 0){
            echo "Erro: File is Empty</br>";
        }

        if (filesize($dir) > 0){
            $encryptedText = fread($file, filesize($dir));
            $pltxt = decrypt($encryptedText, $key);
            saveFile($dir,$pltxt);
            echo "File decrypted successfully";
        }
        
        fclose($file);
    }

    return $pltxt;
}

decryptFile($file_path);

?>