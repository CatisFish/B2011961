<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa mật khẩu</title>
</head>
<body>
	<form action="sua_mk.php" method="post">
		<div>
			<label for="old_password">Mật khẩu cũ:</label>
			<input type="password" id="old_password" name="old_password">
		</div>
		<div>
			<label for="new_password">Mật khẩu mới:</label>
			<input type="password" id="new_password" name="new_password">
		</div>
		<div>
			<label for="confirm_password">Nhập lại mật khẩu mới:</label>
			<input type="password" id="confirm_password" name="confirm_password">
		</div>
		<button type="submit">Chỉnh sửa</button>
	</form>
</body>
</html>

<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

// Nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	
	// Kết nối đến CSDL
	$conn = mysqli_connect('localhost', 'root', '', 'dbname');
	
	// Lấy mật khẩu hiện tại của người dùng
	$username = $_SESSION['username'];
	$query = "SELECT password FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_f
    <?php 
    session_start();
    
    // check if the user is logged in
    if (!isset($_SESSION['loggedin'])) {
      header('Location: login.php');
      exit();
    }
    
    if (isset($_POST['submit'])) {
      // check if the old password is correct
      if (md5($_POST['old_password']) != $_SESSION['password']) {
        $error = 'Old password is incorrect';
      } else if ($_POST['new_password'] != $_POST['confirm_password']) {
        $error = 'New passwords do not match';
      } else if ($_POST['new_password'] == $_POST['old_password']) {
        $error = 'New password must be different from old password';
      } else {
        // update the password in the database
        // code to update password in database here
        $new_password = md5($_POST['new_password']);
    
        // update the password in the session
        $_SESSION['password'] = $new_password;
    
        $success = 'Password updated successfully';
      }
    }
    
    ?>
    <html>
      <head>
        <title>Change Password</title>
      </head>
      <body>
        <?php if (isset($error)): ?>
          <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($success)): ?>
          <p style="color: green;"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="post">
          <label for="old_password">Old Password:</label>
          <input type="password" name="old_password" id="old_password">
          <br>
          <label for="new_password">New Password:</label>
          <input type="password" name="new_password" id="new_password">
          <br>
          <label for="confirm_password">Confirm New Password:</label>
          <input type="password" name="confirm_password" id="confirm_password">
          <br>
          <input type="submit" name="submit" value="Submit">
        </form>
      </body>
    </html>
    