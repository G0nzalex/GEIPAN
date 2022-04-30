<?php

function dumps(mixed ...$variable) : void
{
    if (isset($variable)){
        echo "<h2>Dump des variables</h2>" . "<br />";
        echo "<pre style='font-weight: 900; font-size: 18px;'>";
        var_dump($variable);
        echo "</pre>" . "<br />";
        echo "<h2>Fin du dump</h2>";
    }
}