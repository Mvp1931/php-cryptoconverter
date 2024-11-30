<?php
    interface CanConvert {
        public function convertToCurrency(float $value);
    }

    class CryptoConverter implements CanConvert {

        private string $cryptoCurrencyCode;
        private string $currencyCode;

        function __construct(string $cryptoCurrencyCode, string $currencyCode) {
            $this->cryptoCurrencyCode = $cryptoCurrencyCode;
            $this->currencyCode = $currencyCode;
        }

        public function convertToCurrency(float $value=1): float | bool {

            $cryptoCurrencyCode = $this->cryptoCurrencyCode;
            $currencyCode = $this->currencyCode;

            $url = "https://cex.io/api/ticker/$cryptoCurrencyCode/$currencyCode";

            $json =  file_get_contents($url);

            // echo $json;

            if (!($json)) {
                return false;
            }
            $data = json_decode($json);
            return $data->last;
        }
    }
?>