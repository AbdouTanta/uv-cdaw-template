
<?php

echo '<h2>Résultats de '.$_POST["name"].'</h2>';

// request url
$api_url = 'https://imdb-api.com/en/API/SearchMovie/k_6z646yzp/'.$_POST["name"];

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$film_data = $response_data->results;

// Cut long data into small & select only first 10 records
$film_data = array_slice($film_data, 0, 9);


function toHtml($film)
{
    echo "<tr>"
        . "<td>" . $film->title . "</td>"
        . "<td>" . $film->description . "</td></tr>";
}

// class-side method to render an array of users as an HTML table
function showAllFilmsAsTable($films)
{
    echo '<table><thead>
					<tr><th>Nom</th><th>Description</th></tr></thead><tbody>';
    foreach ($films as $f) {
        toHtml($f);
        // print_r($u);
    }
    echo '</tbody></table>';
}

showAllFilmsAsTable($film_data);

?>