<?php
function validateCalcOperation($PostOperationName, &$errs)
{
    if (!isset($_POST[$PostOperationName]))
    {
        $errs[$PostOperationName] = '<div style = \'color: red;\'>Not enter value in ' .
            "$PostOperationName" . " of calculator</div>";
    }
    else
    {
        $PostOperationName = trim($_POST[$PostOperationName]);
        if (!preg_match('/^[+\-\*\/]{1}$/', $PostOperationName))
        {
            $errs[$PostOperationName] = '<div style = \'color: red;\'> Invalid type of operation ' .
                "$PostOperationName";
        }
        return $PostOperationName;
    }
}