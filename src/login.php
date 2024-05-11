<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .error-message {
            color: red;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #4caf50;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="bg-light">

    <div class="login-container">
        <h2>Aged care login system</h2>
        <form method="post" action="#">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" ><br>
            <label for="password">Password:</label><br>
            <input required type="password" id="password" name="password" ><br><br>
            <input required type="submit" value="Login">
        </form>
    </div>

    <?php if (!empty($error_msg)) : ?>
        <div class="alert alert-danger error-message" role="alert">
            <?php echo $error_msg; ?>
    <?php endif; ?>

</body>

</html>