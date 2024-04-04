<!DOCTYPE html>
<html>

<head>
	<title>Add work</title>
	<style>
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
	<?php include_once "header.php";?>
<body>
	<h1>Edit work</h1>
	<form method="post" action="">
		<?php
		include_once("config.php");
		if (isset($_GET["id"])) {
			$id = $_GET['id'];
			$sql = "SELECT * FROM tbl_department where department_Id = '$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
		?>

			<label for="departmentName">Work Name:</label>
			<input type="text" name="departmentName" value="<?php echo $row["departmentName"] ?>" required><br>
			<input type="submit"class="btn btn-primary" class="site-btn" name="btnUpdate" id="btnUpdate" value="Update" />
		 <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='department.php'" />
	<?php }?>
	</form>
<?php
			include_once("config.php");
		if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			if (isset($_POST['btnUpdate'])) {
				$name = $_POST['departmentName'];
				$sql = "UPDATE tbl_department SET departmentName='$name' WHERE department_Id = '$id'";
				if (mysqli_query($conn, $sql)) {
					echo "<script>
            $(document).ready(function() {
                swal.fire({
                    title: 'Success!',
                    text: 'Work updated successfully!',
                    icon: 'success',
                    button: 'OK',
                }).then(function() {
                    window.location.href = 'department.php';
                });
            });
            </script>";
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		mysqli_close($conn);
?>

</body>
<?php include_once "footer.php";?>
</html>
