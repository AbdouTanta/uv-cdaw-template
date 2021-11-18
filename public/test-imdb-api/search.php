<?php
require("./models/Film.php");
require("/workspace/public/test-imdb-api/api/Api.php");


echo '<h2>Résultats de ' . $_POST["name"] . '</h2>';

$search = new Api($_POST["name"]);
$film_data = $search->searchResults();

// class-side method to render an array of users as an HTML table
function showAllFilmsAsTable($films)
{
    echo '<table><thead>
					<tr><th>Nom</th><th>Description</th></tr></thead><tbody>';
    foreach ($films as $f) {
        $f->toHtml();
        // print_r($u);
    }
    echo '</tbody></table>';
}

showAllFilmsAsTable($film_data);
