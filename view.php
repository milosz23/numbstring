<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numbstring</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Welcome to Numbstring!</h1>
    <p>You can get text form of your number here</p>
        <form action="" method='get'>
            <ul>
                <li>
                    <input type="number" name='number' min='0' max="999999999" placeholder='number goes here'>
                </li>
                <li>
                    <input type="submit" value='Give me the letters!'>
                </li>
            </ul>
        </form>
        <?php
        if (isset($result))
        {
            echo "<p>You number is $number, in text form it will be.. </p>";
            echo "<p>English    : $result</p>";
            echo "<p>Русский    : $result_ru</p>";
            echo "<p>Українська : $result_ua</p>";
        }
        if (isset($status))
        {
            echo $status;
        }
        ?>
    </div>
</body>
</html>