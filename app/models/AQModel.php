// <?php
// class AQModel {

//     // Function to fetch data from NYC Open Data API by borough
//     public function getDataByBorough($borough) {
//         // Encode the borough to ensure it's safe for the URL
//         $borough = urlencode($borough);

//         // Build the API URL with the borough filter
//         $apiUrl = "https://data.cityofnewyork.us/resource/c3uy-2p5r.json?borough=$borough";

//         // Fetch the data from the API
//         $response = file_get_contents($apiUrl);

//         // Check if the response is valid
//         if ($response === false) {
//             return [];
//         }

//         // Decode the JSON response and return it
//         return json_decode($response, true);
//     }
// }
// ?>
