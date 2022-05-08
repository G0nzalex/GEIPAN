<?php

class Events extends Query
{
    use Form;

    private string $datetime;
    private string $duration;
    private string $state;
    private string $place;
    private string $direction;
    private string $weather;
    private string $description;
    private string $image;

    public function datetime() : string
    {
        $this->datetime = "<label for=\"datetime\">When did the event occur ? </label>";
        $this->datetime .= "<input type=\"date\" name=\"datetime\" id=\"datetime\">";
        return $this->datetime;
    }
    public function duration() : string
    {
        $this->duration = "<label for=\"duration\">How long did the event last ? </label>";
        $this->duration .= "<input type=\"range\" id=\"duration\" name=\"duration\" min=\"0\" max=\"60\" step=\"5\">";
        $this->duration .= "<p id=\"value\"></p>";
        $this->duration .= "<script>const input = document.getElementById('duration');
        const log = document.getElementById('value');
        
        input.addEventListener('input', updateValue);
        
        function updateValue(e) {
            log.textContent = e.target.value + ' min';
        }";
        $this->duration .= "</script>";
        return $this->duration;
    }
    public function state() : string
    {
        $result = $this->select("SELECT * FROM departement");
        $this->state = "<label for=\"state\">From where did you see the event ?</label>";
        $this->state .= "<select name=\"state\" id=\"state\">";
        $this->state .= "<option value=\"/\" selected>Please choose...</option>";
        for ($i = 0; $i < count($result); $i++)
        {
            $this->state .= "<option value=\"";
            $this->state .= $result[$i]->departement_id;
            $this->state .= "\">";
            $this->state .= $result[$i]->departement_code . " " . $result[$i]->departement_nom;
            $this->state .= "</option>";
        }
        $this->state .= "</select>";
        return $this->state;
    }
    public function place() : string
    {
        $this->place = "<label for=\"place\">Name the city where the event happened... </label>";
        $this->place .= "<input type=\"text\" name=\"place\" id=\"place\">";
        return $this->place;
    }
    public function direction() : string
    {
        $dir = ["North", "North-East", "East", "South-East", "South", "South-West", "West", "North-West"];
        $this->direction = "<label for=\"direction\">At what direction did you see the event ?</label>";
        $this->direction .= "<select name=\"direction\" id=\"direction\">";
        $this->direction .= "<option value=\"/\" selected>Please choose...</option>";
        for ($i = 0; $i < count($dir); $i++)
        {
            $this->direction .= "<option value=\"";
            $this->direction .= $dir[$i];
            $this->direction .= "\">";
            $this->direction .= $dir[$i];
            $this->direction .= "</option>";
        }
        $this->direction .= "</select>";
        return $this->direction;
    }
    public function weather() : string
    {
        $wth = ["Sunny", "Cloudy", "Raining", "Storming", "Foggy", "Snowing"];
        $this->weather = "<label for=\"weather\">It was ...</label>";
        $this->weather .= "<select name=\"weather\" id=\"weather\">";
        $this->weather .= "<option value=\"/\" selected>Please choose...</option>";
        for ($i = 0; $i < count($wth); $i++)
        {
            $this->weather .= "<option value=\"";
            $this->weather .= $wth[$i];
            $this->weather .= "\">";
            $this->weather .= $wth[$i];
            $this->weather .= "</option>";
        }
        $this->weather .= "</select>";
        return $this->weather;
    }
    public function description() : string
    {
        $this->description = "<label for=\"description\">Give a description about the event : </label>";
        $this->description .= "<textarea name=\"description\" id=\"description\"></textarea>";
        return $this->description;
    }
    public function getDatetime() : string
    {
        return !isset($this->datetime) || strlen($this->datetime) === 0 ? $this->datetime = "" : $this->datetime;
    }
    public function setDatetime(string $datetime) : void
    {
        $this->datetime = $datetime;
    }
    public function getDuration() : string
    {
        return !isset($this->duration) || strlen($this->duration) === 0 ? $this->duration = "" : $this->duration;
    }
    public function setDuration(string $duration) : void
    {
        $this->duration = $duration;
    }
    public function getState() : string
    {
        return !isset($this->state) || strlen($this->state) === 0 ? $this->state = "" : $this->state;
    }
    public function setState(string $state) : void
    {
        $this->state = $state;
    }
    public function getPlace() : string
    {
        return !isset($this->place) || strlen($this->place) === 0 ? $this->place = "" : $this->place;
    }
    public function setPlace(string $place) : void
    {
        $this->place = $place;
    }
    public function getDirection() : string
    {
        return !isset($this->direction) || strlen($this->direction) === 0 ? $this->direction = "" : $this->direction;
    }
    public function setDirection(string $direction) : void
    {
        $this->direction = $direction;
    }
    public function getWeather() : string
    {
        return !isset($this->weather) || strlen($this->weather) === 0 ? $this->weather = "" : $this->weather;
    }
    public function setWeather(string $weather) : void
    {
        $this->weather = $weather;
    }
    public function getDescription() : string
    {
        return !isset($this->description) || strlen($this->description) === 0 ? $this->description = "" : $this->description;
    }
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
}