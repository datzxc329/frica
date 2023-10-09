<style>
    /* Style for the login form */
    .login-form {
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f7f7f7;
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    p {
        text-align: center;
        margin-top: 10px;
    }

    /* Optional: Style links within the form */
    .login-form a {
        text-decoration: none;
        color: #007bff;
    }

    .login-form a:hover {
        text-decoration: underline;
    }

</style>
<div class="login-form">
    <h2>Đăng nhập</h2>
    <form action="index.php?controller=accounts&action=login" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            <span id="usernameError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            <span id="passwordError" class="error"></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
    </form>
    <p><a href="index.php?controller=accounts&action=signup">Đăng ký</a> | <a href="index.php?controller=accounts&action=forgotpassword">Quên mật khẩu</a></p>
</div>
<script>

    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var usernameError = document.getElementById('usernameError');
        var passwordError = document.getElementById('passwordError');
        var isValid = true;

        // Reset error messages
        usernameError.innerHTML = "";
        passwordError.innerHTML = "";

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

        return isValid;
    }
</script>