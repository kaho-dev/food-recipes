<?php 
error_reporting(E_ALL);



function makeRequestApi() {

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'www.themealdb.com/api/json/v1/1/categories.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

$jsonData = makeRequestApi();
$jsonData = json_decode($jsonData, true);

//var_dump($jsonData);

echo $jsonData['categories'][1]['strCategory'];



// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=recipes", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "INSERT INTO wp_api_data (json_data)
//   VALUES ('$jsonData')";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "New record created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

// $conn = null;
?>


