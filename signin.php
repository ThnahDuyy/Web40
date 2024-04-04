<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
     <!-- WebIcon -->
     <link rel="icon" href="/assets/img/Logo_T&M.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style1.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
</head>
<body>
<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['pass1'];
    $re_password = $_POST['pass2'];
    $department_id = $_POST['department'];

    if ($password !== $re_password) {
        echo "Passwords do not match!";
        exit();
    }
    $hashed_password = md5($password);

    // Thực hiện truy vấn INSERT
    $sql = "INSERT INTO tbl_account (fullname, email, gender, date_of_birth, address, phone, password, department_Id,role) VALUES ('$fullname', '$email', '$gender', '$date_of_birth', '$address', '$phone', '$hashed_password', '$department_id',0)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Sign up successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'login.php';
                });
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>

	<div class="limiter" id="background">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
					<span class="remind">Do you already have an account?<a href="login.php">Login</a></span>
				</div>
				<form name="signin" class="login100-form validate-form" method="POST" action="signin.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="fullname" placeholder="Enter username" id="fullname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass1" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="pass2" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" placeholder="Fullname">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Gender is required">
                    <span class="label-input100">Gender</span>
                    <select class="form-select" name="gender">
                        <option  value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Date of Birth is required">
                        <span class="label-input100">Date of Birth</span>
                        <input class="input100" type="date" name="date_of_birth">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Phone Number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="tel" name="phone" placeholder="Phone Number">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate=" is required">
                        <span class="label-input100">Work</span>
                        <?php
                        include_once('config.php');

                        $sql = "SELECT * FROM tbl_department";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<select name="department" class="form-select">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['department_Id'] . '">' . $row['departmentName'] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No departments found";
                        }

                        mysqli_free_result($result);

                        ?>
                        <span class="focus-input100"></span>
                    </div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>
						<div align="right">
							<a href="index.php" class="txt1">
								<i class="fas fa-home"></i>
								Home
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn btn-signup" type="submit">
							Sign Up
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
<link rel="stylesheet" href=" https://code.jquery.com/jquery-3.6.0.min.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/login.js"></script>
</body>
</html>
