<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
    --primary-color: #007bff; /* Bright blue */
    --secondary-color: #28a745; /* Green */
    --background-color: #f8f9fa; /* Light gray */
    --text-color: #212529; /* Dark gray */
    --border-color: #dee2e6; /* Soft gray */
    --shadow-color: rgba(0, 0, 0, 0.15); /* Subtle shadow */
    --hover-color: #e9ecef; /* Very light gray */
    --delete-color: #dc3545; /* Red */
    --table-header-color: #343a40; /* Dark gray for table headers */
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--background-color);
    padding: 20px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px;
    background-color: #ffffff;
    box-shadow: 0 8px 20px var(--shadow-color);
    border-radius: 16px;
}

h1 {
    text-align: center;
    color: var(--primary-color);
    margin-bottom: 30px;
    font-size: 2.5em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.mainBody,
.list {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-color);
    margin-bottom: 40px;
}

form {
    display: flex;
    flex-direction: column;
    max-width: 600px;
    margin: 0 auto;
}

input,
textarea,
button {
    font-family: 'Poppins', sans-serif;
    margin-bottom: 15px;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    font-size: 16px;
    transition: all 0.3s ease;
    outline: none;
}

input:focus,
textarea:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 5px var(--primary-color);
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    cursor: pointer;
    background-color: var(--primary-color);
    color: #ffffff;
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

button:active {
    transform: scale(0.98);
}

.list table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
    margin-top: 20px;
    background-color: #ffffff;
    box-shadow: 0 3px 10px var(--shadow-color);
    border-radius: 8px;
    overflow: hidden;
}

table th,
table td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
}

table th {
    background-color: var(--table-header-color);
    color: #ffffff;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: var(--hover-color);
}

table tr:hover {
    background-color: var(--primary-color);
    color: #ffffff;
    transform: translateY(-3px);
    transition: all 0.3s ease;
}

table td {
    border-top: 1px solid var(--border-color);
}

.actions {
    display: flex;
    gap: 10px;
}

.actions button {
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 4px;
}

.actions button[name="update"] {
    background-color: var(--secondary-color);
    color: #ffffff;
}

.actions button[name="update"]:hover {
    background-color: #218838;
}

.actions button[name="delete"] {
    background-color: var(--delete-color);
    color: #ffffff;
}

.actions button[name="delete"]:hover {
    background-color: #c82333;
}

.total-products {
    margin-top: 20px;
    font-weight: bold;
    font-size: 1.2em;
    text-align: right;
    color: var(--primary-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 2em;
    }

    form input,
    form textarea,
    form button {
        font-size: 14px;
        padding: 10px;
    }

    table th,
    table td {
        padding: 10px;
        font-size: 14px;
    }

    .actions button {
        font-size: 12px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Product Management System</h1>
        <div class="mainBody">
            <form id="productForm" action="add.php" method="POST">
                <input type="text" id="productName" placeholder="Product Name" name="pname" required>
                <textarea id="productDescription" placeholder="Product Description" name="pdes" required></textarea>
                <input type="text" id="productBrand" placeholder="Product Brand" name="bname" required>
                <input type="number" id="productPrice" placeholder="Product Price" name="pprice" required>
                <button type="submit" name="Addsubmit">Add Product</button>
            </form>
        </div>
        <div class="list">
            <div id="productList">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM awdtb";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="product-container">';
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Product Name</th>';
                    echo '<th>Description</th>';
                    echo '<th>Brand</th>';
                    echo '<th>Price</th>';
                    echo '<th>Actions</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr class="product">';
                        echo '<td>' . $row['pname'] . '</td>';
                        echo '<td>' . $row['pdes'] . '</td>';
                        echo '<td>' . $row['pbrand'] . '</td>';
                        echo '<td>$' . $row['pprice'] . '</td>';
                        echo '<td class="actions">';
                        echo '<form action="update.php" method="GET">';
                        echo '<input type="hidden" name="id" value="' . $row['p_id'] . '">';
                        echo '<input type="hidden" name="pn" value="' . $row['pname'] . '">';
                        echo '<input type="hidden" name="bn" value="' . $row['pbrand'] . '">';
                        echo '<input type="hidden" name="pp" value="' . $row['pprice'] . '">';
                        echo '<button type="submit" name="update">Update</button>';
                        echo '</form>';
                        echo '<form action="delete.php" method="GET">';
                        echo '<input type="hidden" name="id" value="' . $row['p_id'] . '">';
                        echo '<button type="submit" name="delete">Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '<div class="total-products">Total Products: ' . $result->num_rows . '</div>';
                } else {
                    echo '<p>No products found.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>