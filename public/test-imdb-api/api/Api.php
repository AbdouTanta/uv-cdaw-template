<?php

require("../models/Film.php");

class Api
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function searchResults()
    {
        // request url
        $api_url = 'https://imdb-api.com/en/API/SearchMovie/k_6z646yzp/' . $this->param;

        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        $response_data = json_decode($json_data);

        // All user data exists in 'data' object
        $film_data = $response_data->results;

        // Cut long data into small & select only first 10 records
        $film_data = array_slice($film_data, 0, 9);

        // return array of film objects
        $film_array = [];
        for ($i = 0; $i < count($film_data); $i++) {
            array_push($film_array, new Film($film_data[$i]->title, $film_data[$i]->description));
        }

        return $film_array;
    }
}
