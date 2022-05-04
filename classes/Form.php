<?php

trait Form
{
    private string $form;
    private string $endofForm;

    public function form(string $page, ?string $option = null) : string
    {
        return $this->form = "<form action=\"index.php?page=$page\" method=\"post\" $option>";
    } 
    public function endofForm(string $page) : string
    {
        return $this->endofForm = "<input type=\"submit\" name=\"$page\" id=\"$page\">" . "</form>";
    }
    public function display(array $inputs, ?string $br = null) : void
{
    for ($i = 0; $i < count($inputs); $i++)
    {
        echo $inputs[$i] . $br;
    }
}
    public function errMsg(string $input, string $errMsg) : string
    {
        return strlen($input) === 0 ? $errMsg : "";
    }
    public function errCount(array &$errors, string $errMsg) : void
    {
        if (isset($errors) && strlen($errMsg) !== 0)
            array_push($errors, "");
    }
    // public function
}