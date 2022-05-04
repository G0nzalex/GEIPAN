<?php

$event = new Events;

$inputs = [
    $event->datetime(),
    $event->duration(),

];

$event->display($inputs, "<br />");