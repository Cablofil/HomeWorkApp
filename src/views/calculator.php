<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate</title>
</head>
<body>
<h3>Calculator form</h3>
<form action="<?= url('calculate') ?>" method="POST">
    <div>
        <input type="number" name="number1" placeholder="First number">
    </div>
    <div>
        <select name="action" >
            <option value="+">+</option>
<!--            <option value="-">-</option>-->
<!--            <option value="*">*</option>-->
<!--            <option value="/">/</option>-->
        </select>
    </div>
    <div>
        <input type="number" name="number2" placeholder="Second number" required>
    </div>

    <div>
        <input type="submit" value="calculate">
    </div>
</form>
</body>
</html>