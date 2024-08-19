<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<h3>Register form</h3>
<form action="<?= url('register') ?>" method="POST">
    <div>
        <input type="text" name="name" placeholder="Name">
        <?php showValidationError('name')  ?>
    </div>
    <div>
        <input type="email" name="email" placeholder="Email" required>
        <?php showValidationError('email')  ?>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password">
        <?php showValidationError('password')  ?>
    </div>
    <div>
        <input type="password" name="password_confirmation" placeholder="Password Confirmation" required>
    </div>
    <div>
        <input type="submit" value="register">
    </div>
</form>
</body>
</html>