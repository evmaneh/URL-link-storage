<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <h1>Sick em!</h1>
    <div class="file-list">
        <?php
        include_once('config.php');

        $fileData = file_get_contents($filePath);
        $fileItems = explode("\n", $fileData);

        foreach ($fileItems as $index => $item) {
            if (empty(trim($item))) {
                continue;
            }

            $itemData = explode('|', $item);
            $itemName = $itemData[0] ?? '';
            $itemURL = $itemData[1] ?? '';
            $dropdownContent = $itemData[2] ?? '';
            $dropdownLink = $itemData[3] ?? '';

            echo '<div class="file-list-item">';
            echo '<a href="' . $itemURL . '" target="_blank">' . $itemName . '</a>';
            if (!empty($dropdownLink)) {
                echo '<div class="dropdown-content">';
                echo '<a href="' . $dropdownLink . '" target="_blank">' . $dropdownContent . '</a>';
                echo '</div>';
            }
            echo '<button class="delete-button" onclick="deleteItem(' . $index . ')">Delete</button>';
            echo '</div>';
        }
        ?>
    </div>
    <button onclick="showAddForm()">Add</button>
    <div id="addForm" style="display: none;">
        <form action="add_file.php" method="post">
            <label for="itemName">Name:</label>
            <input type="text" id="itemName" name="itemName" required><br>
            <label for="itemURL">URL:</label>
            <input type="text" id="itemURL" name="itemURL" required><br>
            <label for="dropdownContent">Dropdown Content (optional):</label>
            <input type="text" id="dropdownContent" name="dropdownContent"><br>
            <label for="dropdownLink">Dropdown Link (optional):</label>
            <input type="text" id="dropdownLink" name="dropdownLink"><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function showAddForm() {
            document.getElementById('addForm').style.display = 'block';
        }

        function deleteItem(index) {
            if (confirm("Are you sure you want to delete this file?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_file.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        window.location.reload();
                    }
                };
                xhr.send("index=" + index);
            }
        }
    </script>
</body>

</html>
