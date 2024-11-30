<?php
    require("classes.php");

    // header("content-type: application/json");

    $code = $_GET["code"] ?? "BTC";
    $newConverter = new CryptoConverter($code);
    $rateInUSD = $newConverter->convertToCurrency();

    header("content-type: application/json");
    echo <<< JSON
        {
            "rateInUSD": $rateInUSD
        }
    JSON;
?>
<!-- This is Just a Test API for checking responses -->