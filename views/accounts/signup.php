<?php
?>
<style>
    /* Style for the login form */
    .signup-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-group button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .form-group button[type="submit"]:hover {
        background-color: #0056b3;
    }

    p {
        text-align: center;
    }

    p a {
        text-decoration: none;
        color: #007bff;
    }

    p a:hover {
        text-decoration: underline;
    }
</style>
<div class="signup-form">
    <h2>Đăng ký</h2>
    <form action="index.php?controller=accounts&action=signup" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên người dùng" required>
            <span id="usernameError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            <span id="passwordError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="name">Họ và tên đầy đủ:</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" >
            <span id="nameError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" >
            <span id="phoneError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" required>
            <span id="emailError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>
    <p>Bạn đã có tài khoản?</p>
    <p><a href="index.php?controller=accounts&action=login">Đăng nhập</a> | <a href="index.php?controller=accounts&action=forgotpassword">Quên mật khẩu</a></p>
</div>
<script>

    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;

        var usernameError = document.getElementById('usernameError');
        var passwordError = document.getElementById('passwordError');
        var nameError = document.getElementById('nameError');
        var phoneError = document.getElementById('phoneError');
        var emailError = document.getElementById('emailError');
        var isValid = true;

        // Reset error messages
        usernameError.innerHTML = "";
        passwordError.innerHTML = "";
        nameError.innerHTML = "";
        phoneError.innerHTML = "";
        emailError.innerHTML = "";
        // Validate username
        var usernamePattern = /^[a-zA-Z0-9]+$/; // Allow only letters and numbers
        if (username.trim() === "") {
            usernameError.innerHTML = "Vui lòng nhập tên đăng nhập";
            isValid = false;
        } else if (username.length >= 20 || !usernamePattern.test(username)) {
            usernameError.innerHTML = '<span style="color: red;">Tên đăng nhập không được chứa các ký hiệu đặc biệt như !, @, #,...</span>';
            isValid = false;
        }

        // Validate password
        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).*$/; // Requires at least 1 lowercase, 1 uppercase, 1 special character

        if (password.trim() === "") {
            passwordError.innerHTML = "Vui lòng nhập mật khẩu";
            isValid = false;
        } else if (!passwordPattern.test(password)) {
            passwordError.innerHTML = '<span style="color: red;">Mật khẩu phải có ít nhất 1 chữ cái in hoa và 1 ký hiệu đặc biệt như !, @, #,...</span>';
            isValid = false;
        }
        // Validate name
        var namePattern = /^[A-Za-z\s'-]+$/;
        if (!namePattern.test(name)) {
            nameError.innerHTML = '<span style="color: red;">Tên không hợp lệ</span>';
            isValid = false;
        }
        // Validate phone
        var phonePattern = /^\d{10,11}$/;
        if (!phonePattern.test(phone)) {
            phoneError.innerHTML = '<span style="color: red;">Số điện thoại không hợp lệ</span>';
            isValid = false;
        }
        // Validate email
        var emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        if (email.trim() === "") {
            emailError.innerHTML = "Vui lòng nhập email";
            isValid = false;
        } else if (!emailPattern.test(email)) {
            emailError.innerHTML = '<span style="color: red;">Email không hợp lệ</span>';
            isValid = false;
        }
        return isValid;
    }
</script>