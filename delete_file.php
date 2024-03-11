<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];

    // Replace index.txt with the corrisponding text file you want to use to store info
    $fileData = file_get_contents('fileData/index.txt');
    $fileItems = explode("\n", $fileData);

    if (isset($fileItems[$index])) {
        unset($fileItems[$index]);

        // Replace index.txt with the corrisponding text file you want to use to store info
        file_put_contents('fileData/index.txt', implode("\n", $fileItems));
    }
}
?>
