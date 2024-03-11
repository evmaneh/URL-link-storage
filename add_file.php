<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['itemName'];
    $itemURL = $_POST['itemURL'];
    $dropdownContent = isset($_POST['dropdownContent']) ? $_POST['dropdownContent'] : '';
    $dropdownLink = isset($_POST['dropdownLink']) ? $_POST['dropdownLink'] : '';

    if (!empty($itemURL) && !preg_match('/^https?:\/\//', $itemURL)) {
        $itemURL = 'https://' . $itemURL;
    }

    if (!empty($dropdownContent) && empty($dropdownLink)) {
        $dropdownLink = $dropdownContent;
        $dropdownContent = '';
    }

    if (!empty($dropdownLink) && !preg_match('/^https?:\/\//', $dropdownLink)) {
        $dropdownLink = 'https://' . $dropdownLink;
    }

    $newItem = $itemName . '|' . $itemURL;
    if (!empty($dropdownContent)) {
        $newItem .= '|' . $dropdownContent;
    }
    if (!empty($dropdownLink)) {
        $newItem .= '|' . $dropdownLink;
    }

    // Replace index.txt with the corrisponding text file you want to use to store info
    file_put_contents('fileData/index.txt', $newItem . "\n", FILE_APPEND | LOCK_EX);

    header("Location: index.php");
    exit;
}
?>
