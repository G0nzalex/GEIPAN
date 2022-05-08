<?php

$event = new Events;

$inputs = [
    $event->datetime(),
    $event->duration(),
    $event->place(),
];

$event->display($inputs, "<br />");