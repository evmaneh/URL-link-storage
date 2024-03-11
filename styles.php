body {
    background-color: #222;
    color: #eee;
    font-family: Arial, sans-serif;
    padding: 20px;
}

.file-list {
    background-color: #333;
    padding: 10px;
    border-radius: 5px;
}

.file-list-item {
    margin-bottom: 5px;
    position: relative;
}

.file-list-item a {
    color: #eee;
    text-decoration: none;
    display: block;
    padding: 5px;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.file-list-item a:hover {
    background-color: #444;
}

.dropdown-content {
    display: none;
    background-color: #444;
    padding: 5px;
    border-radius: 3px;
}

.file-list-item:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    color: #eee;
    text-decoration: none;
    display: block;
    padding: 5px;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
    background-color: #555;
}

.delete-button {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: transparent;
    border: none;
    color: #fff;
    cursor: pointer;
}

.delete-button:hover {
    color: #ff0000;
}
