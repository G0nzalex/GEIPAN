<?php

class Events extends Query
{
    use Form;

    private string $datetime;
    private string $duration;
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
        $this->duration .= "<input type=\"range\" id=\"duration\" name=\"duration\" min=\"0\" max=\"60\">";
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
    public function place() : string
    {
        $result = $this->select("SELECT * FROM departement");
        $this->place = "<select name=\"selection\" id=\"selection\">";
        $this->place .= "<option value=\"/\" selected>Please choose...</option>";
        for ($i = 0; $i < count($result); $i++)
        {
            $this->place .= "<option value=\"";
            $this->place .= $result[$i]->departement_id;
            $this->place .= "\">";
            $this->place .= $result[$i]->departement_code . " " . $result[$i]->departement_nom;
            $this->place .= "</option>";
        }
        $this->place .= "</select>";
        return $this->place;
    }
    
}