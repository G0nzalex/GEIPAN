<?php

trait Form
{
    public function form(string $page, ?string $option = null) : string
    {
        return $this->form = "<form action=\"index.php?page=$page\" method=\"post\" $option>";
    } 
    public function endofForm(string $page) : string
    {
        return $this->endofForm = "<input type=\"submit\" name=\"$page\" id=\"$page\">" . "</form>";
    }
}