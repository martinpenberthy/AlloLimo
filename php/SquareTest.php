<?php

require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;


$client = new SquareClient([
    'accessToken' => 'EAAAELSxrS3YA0sjchaectW0jpFmKgZzdTndviTP4cad7BCRJ8WPDwzOScqgXPGX',
    'environment' => Environment::PRODUCTION,
]);

try {

    $apiResponse = $client->getLocationsApi()->listLocations();

    if ($apiResponse->isSuccess()) {
        $result = $apiResponse->getResult();
        foreach ($result->getLocations() as $location) {
            printf(
                "%s: %s, %s, %s<p/>", 
                $location->getId(),
                $location->getName(),
                $location->getAddress()->getAddressLine1(),
                $location->getAddress()->getLocality()
            );
        }

    } else {
        $errors = $apiResponse->getErrors();
        foreach ($errors as $error) {
            printf(
                "%s<br/> %s<br/> %s<p/>", 
                $error->getCategory(),
                $error->getCode(),
                $error->getDetail()
            );
        }
    }

} catch (ApiException $e) {
    echo "ApiException occurred: <b/>";
    echo $e->getMessage() . "<p/>";
}
?>