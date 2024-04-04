<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"] {
            display: block;
            box-sizing: border-box;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
        }
    </style>
</head>
<body>
<?php include_once "header.php" ?>
    <h1>Create Add Student</h1>
    <form method="post" action="">
        <label for="categoryName">Student Name:</label>
        <input type="text" name="categoryName" required placeholder="Enter name of category..."><br><br>
        <input type="submit" class="btn btn-primary" id="category_Id" name="submit" value="Add Student">
        <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='categorylist.php'">
    </form>

    <?php
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Get the category name from the form
        $category_name = $_POST['categoryName'];

        // Include the database configuration file
        require_once "config.php";

        // Prepare the INSERT statement
        $sql = "INSERT INTO tbl_category (categoryName) VALUES ('$category_name')";

        if (mysqli_query($conn, $sql)) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Student added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'categorylist.php';
                    }
                });
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
<?php include_once "footer.php" ?>
</body>
</html>
