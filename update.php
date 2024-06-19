<?php
include 'config.php';

$id=$_GET['id'];
$pn=$_GET['pn'];
$bn=$_GET['bn'];
$pp=$_GET['pp'];

?>

<html>
<html lang="en">
<head>
    <title>update</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #F6F5F2;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="number"],
        button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <form id="productForm" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" id="productName" placeholder="Product Name" name="pn" value="<?php  echo "$pn"?>" required>
        <input type="text" id="productBrand" placeholder="Product Brand" name="bn" value="<?php  echo "$bn"?>" required>
        <input type="number" id="productPrice" placeholder="Product Price" name="pp" value="<?php  echo "$pp"?>" required>
        <button type="submit" name="update" >UPDATE</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['update'])){
    $nid=$_POST['id'];
    $npn= $_POST['pn'];
    $nbn= $_POST['bn'];
    $npp= $_POST['pp'];

    $query = "UPDATE awdtb SET pname='$npn',pbrand='$nbn',pprice='$npp' WHERE p_id = '$nid' ";

    $data = mysqli_query($conn,$query);

    if($data) {
        echo "<script>alert('Record updated')</script>";
        echo "<script>window.location.href = 'practical_09.php';</script>";
        exit(); 
    } else {
        echo "Failed to update";
    }
    
    

}


?>