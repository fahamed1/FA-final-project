<?php

namespace app\models;

class User extends Model {

    protected $table = 'user_air_quality';

    public function getAllUsersData($city) {
        $apiKey = 'my-api-key';
        $apiUrl = "https://api.airvisual.com/v2/city?city={$city}&key={$apiKey}";

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if ($data['status'] == 'success') {
            $cityName = $data['data']['city'];
            $countryName = $data['data']['country'];
            $airQualityIndex = $data['data']['current']['pollution']['aqius'];

            // Insert data into the database
            $query = "INSERT INTO $this->table (city, country, aqi) VALUES (:city, :country, :aqi)";
            $data = [
                'city' => $cityName,
                'country' => $countryName,
                'aqi' => $airQualityIndex
            ];

            $this->query($query, $data);

            // Return the saved data
            return [
                'city' => $cityName,
                'country' => $countryName,
                'aqi' => $airQualityIndex
            ];
        }

        return false;
    }

    // Fetch saved air quality data from the database
    public function getSavedUserAQData() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC LIMIT 1";
        $result = $this->query($query);

        //var_dump($result);
        
        return $result ? $result[0] : null;  // Return the latest record


        //return $this->findAll();
    }
}