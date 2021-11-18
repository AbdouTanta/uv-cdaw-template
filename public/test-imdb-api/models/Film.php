<?php

class Film
{
    public $title;
    public $description;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function toHtml()
    {
        echo "<tr>"
            . "<td>" . $this->title . "</td>"
            . "<td>" . $this->description . "</td></tr>";
    }
}
