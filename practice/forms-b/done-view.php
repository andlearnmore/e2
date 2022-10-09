<!doctype html>
<html lang='en'>
<head>
    <title>Mystery Word Scramble</title>
    <meta charset='utf-8'>
    <style>
        .correct {
            color: green;
        }

        .incorrect {
            color: red;
        }
    </style>
</head>
<body>

    <h1>Results</h1>

    <?php if ($haveAnswer == false) { ?>
        <div>Please enter an answer. </div>
    <?php } elseif ($correct) { ?>
        <div class='correct'>You got it!</div>
    <?php } else { ?>
        <div class='incorrect'>Wrong answer.</div>
        <?php } ?> 
<a href='index.php'>Play again</a>

</body>
</html>