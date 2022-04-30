<?php

trait Errors
{
    public function errMsg(string $input, string $errMsg) : string
    {
        return strlen($input) === 0 ? $errMsg : "";
    }
    public function errCount(array &$errors, string $errMsg) : void
    {
        if (isset($errors) && strlen($errMsg) !== 0)
            array_push($errors, "");
    }
}