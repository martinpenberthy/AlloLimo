<?php

require '../vendor/autoload.php';

use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;


$client = new SquareClient([
    'accessToken' => 'EAAAELSxrS3YA0sjchaectW0jpFmKgZzdTndviTP4cad7BCRJ8WPDwzOScqgXPGX',
    'environment' => Environment::PRODUCTION,
]);

try {

    $apiResponse = $client->getCustomersApi()->listCustomers();

    if ($apiResponse->isSuccess()) {
        echo "success\n";
        $result = $apiResponse->getResult();
        $resultString = json_encode($result, true);

        $decoded_json = json_decode($resultString, true);
        $customers = $decoded_json['customers'];
        echo $customers[0]['id'];
        //echo $resultString;
        //echo "<br><br><br>";
        /*$userIds = explode("\"id\":", $resultString);

        echo $userIds[0];
        echo "<br>";
        echo $userIds[1];*/
        /*foreach($userIds as $id)
        {
            echo $id;
            echo "<br>";
        }*/
        //echo $userIds;


        //echo $resultString[1];
        //echo $result["customers"][0]["id"];
        //echo $apiResponse->result->customers[0]->getId();
        //echo $result["id"];
        //echo "<br><br><br>";

        //echo $decoded_json["customers"];
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


//header('Location:'.$_SERVER['HTTP_REFERER']);

?>
<script type="text/javascript">
    window.location.replace("https://allolimo.000webhostapp.com/");
</script>