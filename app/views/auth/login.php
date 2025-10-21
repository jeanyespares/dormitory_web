<!DOCTYPE html>
<html>
<head>
    <title>Login - LogNStay</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
<div class="form-container">
    <h2>Login</h2>
    <form method="POST" action="<?= site_url('auth/login') ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="<?= site_url('auth/register') ?>">Register</a></p>
</div>
</body>
</html>
