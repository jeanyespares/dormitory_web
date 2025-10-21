<!DOCTYPE html>
<html>
<head>
    <title>Register - LogNStay</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
<div class="form-container">
    <h2>Register Account</h2>
    <form method="POST" action="<?= site_url('auth/register') ?>">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="tenant">Tenant</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="<?= site_url('auth/login') ?>">Login</a></p>
</div>
</body>
</html>
