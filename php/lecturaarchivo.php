<?php

//$fp = fopen("Hola.docx", "r");
if (!$fp = fopen("../uploads/chau.txt", "r")){
    echo "No se ha podido abrir el archivo";
}else{
    while(!feof($fp)){
        echo fread($fp, 4092);
    }
}


?>