<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form {
            background-color: white;
            width: 300px;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 5px 5px 15px -1px rgba(0, 0, 0, 0.75);
            margin-top: 200px;
            margin-left: 740px;
        }

        .signup {
            color: rgb(77, 75, 75);
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            font-weight: bold;
            font-size: x-large;
            margin-bottom: 0.5em;
        }

        .form--input {
            width: 100%;
            margin-bottom: 1.25em;
            height: 40px;
            border-radius: 5px;
            border: 1px solid gray;
            padding: 5px;
            font-family: 'Inter', sans-serif;
            outline: none;
        }

        .form--input:focus {
            border: 1px solid #639;
            outline: none;
        }

        .form--marketing {
            display: flex;
            margin-bottom: 1.25em;
            align-items: center;
        }

        .form--marketing>input {
            margin-right: 0.625em;
        }

        .form--marketing>label {
            color: grey;
        }

        .checkbox,
        input[type="checkbox"] {
            accent-color: #639;
        }

        .form--submit {
            width: 50%;
            padding: 0.625em;
            border-radius: 5px;
            color: white;
            background-color: #639;
            border: 1px dashed #639;
            cursor: pointer;
        }

        .form--submit:hover {
            color: #639;
            background-color: white;
            border: 1px dashed #639;
            cursor: pointer;
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <form class="form" action="../includes/loginstaff.php" method="post">
        <span class="signup">Staff Login</span>
        <input type="email" name="email" placeholder="Email address" class="form--input">
        <input type="password" name="password" placeholder="Password" class="form--input">
        <button class="form--submit" name="log">Sign up</button>
    </form>
</body>

</html>