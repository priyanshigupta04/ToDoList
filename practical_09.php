<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <link rel="stylesheet" type="text/css" href="style9.css">

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #F6F5F2;
        }

        h1 {
            background-color: #F3D0D7;
            text-align: center;
            padding: 20px;
        }

        .mainBody{
            background-color: #F0EBE3;
            padding: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            
        }

        input,
        textarea,
        button {
            font-family: Arial, sans-serif;
            margin-bottom: 10px;
            padding: 5px;
            border:2px solid gray;
        }



        button {
            border-radius: 10px;
            cursor: pointer;
            background-color: #B5C18E;
        }

        .product-container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #F0EBE3;
            padding: 10px;
        }


        .list{
            background-color: #F0EBE3;
            margin-top: 20px;
            padding: 20px;
            position: relative;
        }



        .product-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif; /* Nice font style */
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-weight: bold; /* Bold text */
        }

        th {
            background-color: #B5C18E;
            color: #333;
        }

        tr{
            background-color:#f1f1f1;
        }

        tr:hover {
            background-color: #ccc;
        }

    </style>
</head>
</head>
<body> 
    <h1>Product Management System</h1>
    <div class="mainBody">
    <form id="productForm" action="add.php" method="POST">
        <input type="text" id="productName" placeholder="Product Name" name="pname" required>
        <textarea id="productDescription" placeholder="Product Description"  name="pdes" required></textarea>
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
                    echo '<td>';
                    echo '<form action="update.php" method="GET" style="display: inline;">';
                    echo '<input type="hidden" name="id" value="' . $row['p_id'] . '">';
                    echo '<input type="hidden" name="pn" value="' . $row['pname'] . '">';
                    echo '<input type="hidden" name="bn" value="' . $row['pbrand'] . '">';
                    echo '<input type="hidden" name="pp" value="' . $row['pprice'] . '">';
                    echo '<button type="submit" name="update" >Update</button>';
                    echo '</form>';


                    echo '<form action="delete.php" method="GET" style="display: inline;">';
                    echo '<input type="hidden" name="id" value="' . $row['p_id'] . '">';
                    echo '<button type="submit" name="delete" >Delete</button>';
                    echo '</form>';


                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '<b><p>Total Products:</b> '. $result->num_rows . '</p>'; // Display total products count
            } else {
                echo '<p>No products found.</p>';
            }

            $conn->close();
            ?>
    </div>
    </div>
    
             
</body>
</html>