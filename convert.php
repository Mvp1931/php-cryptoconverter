<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/convert.css">
    <title>Crypto Convert</title>
</head>
<body>
    <h1>Conversion Result</h1>
    <?php
        // Classes
        require_once "classes.php";
        // SuperGlobal variables

        if (!empty($_POST["amount"]) && !empty($_POST["crypto"]) && !empty($_POST["currency"])) {
            $amount = $_POST["amount"];
            $cryptoType = $_POST["crypto"];
            $currencyType = $_POST["currency"];

            $newConverter = new CryptoConverter($cryptoType, $currencyType);
            $convertedAmount = $newConverter->convertToCurrency($amount);

            echo("<p>You want to convert <span>$amount $cryptoType</span> to <span>$currencyType</span>.</p>");
            echo <<< HTML
                <h5>You Have $convertedAmount $currencyType.</h5>
            HTML;
        }
        else {
            echo <<< HTML
                <p>Please enter the amount and cryptocurrency you want to convert.</p>
            HTML;
        }
    ?>
</body>
</html>