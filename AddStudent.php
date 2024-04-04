<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: block;
            margin: 0 auto 20px; /* Center the logo and add some bottom margin */
            width: 100px; /* Set the width of the logo */
            height: auto; /* Maintain aspect ratio */
            cursor: pointer; /* Change cursor to pointer when hovering over logo */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        .cancel-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        .cancel-button:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="home.php"><img src="HatchfulExport-All/logo-gw.png" alt="Logo" class="logo"></a> <!-- Add link to Home page -->
        <h2>Add Student</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Form content -->
            <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullname" name="fullname"><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>

            <label for="gender">Gender:</label><br>
            <input type="text" id="gender" name="gender"><br>

            <label for="date_of_birth">Date of Birth:</label><br>
            <input type="date" id="date_of_birth" name="date_of_birth"><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>

            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone"><br>

            <label for="department_Id">Department:</label><br>
            <select name="department_Id" id="department_Id">
                <option value="1">Designer</option>
                <option value="2">Computer</option>
                <option value="3">Business</option>
            </select><br>

            <label for="role">Role:</label><br>
            <select name="role" id="role">
                <option value="1">Admin</option>
                <option value="0">Student</option>
            </select><br><br>

            <input type="submit" value="Submit">
            <button type="button" class="cancel-button" onclick="goBack()">Cancel</button> <!-- Add type="button" to prevent form submission -->
        </form>
    </div>

    <script>
        function goBack() {
            window.history.back(); // Hàm này sẽ quay lại trang trước đó trong lịch sử trình duyệt
        }
    </script>
</body>
</html>
