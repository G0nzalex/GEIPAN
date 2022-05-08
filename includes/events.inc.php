<?php

$event = new Events;
$query = new Query;
$enctype = "enctype=\"multipart/form-data\"";
$errors = [];
$inputs = [
    $event->form("events"),
    $event->datetime(),
    $event->duration(),
    $event->state(),
    $event->place(),
    $event->direction(),
    $event->weather(),
    $event->description(),
    $event->endofForm("events")
];

$event->display($inputs, "<br />");

if (isset($_POST['events']))
{
    $event->setDatetime($_POST['datetime']);
    $datetime = $event->getDatetime();

    $event->setDuration($_POST['duration']);
    $duration = $event->getDuration();

    $event->setState($_POST['state']);
    $state = $event->getState();

    $event->setPlace($_POST['place']);
    $place = $event->getPlace();

    $event->setDirection($_POST['direction']);
    $direction = $event->getDirection();

    $event->setWeather($_POST['weather']);
    $weather = $event->getWeather();

    $event->setDescription($_POST['description']);
    $description = $event->getDescription();
}