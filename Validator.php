<?php
function validateCalcValue($PostValueName, &$errs)
{
    if (!isset($_POST[$PostValueName]))
    {
        $errs[$PostValueName] = '<div style = \'color: red;\'>Not enter value in ' .
            "$PostValueName" . " of calculator</div>";
    }
    else
    {
        $PostValueName = trim($_POST[$PostValueName]);
//        $PostValueName = ltrim($_POST[$PostValueName], '0');
        if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $PostValueName))
        {
            $errs[$PostValueName] = '<div style = \'color: red;\'> Invalid type of argument ' .
                "$PostValueName";
        }
        return floatval($PostValueName);
    }
}