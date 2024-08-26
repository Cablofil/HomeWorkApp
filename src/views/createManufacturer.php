<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create manufacturer</title>
</head>
<body>
<h3>Manufacturer creating form</h3>
<form action="<?= url('create') ?>" method="POST">
    <div>
        <input type="text" name="full_name" placeholder="Full name"> required
    </div>
    <div>
        <input type="text" name="short_name" placeholder="Short name" required>
    </div>

    <div>
        <input type="submit" value="create">
    </div>
</form>
</body>
</html>