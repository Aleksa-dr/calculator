<!DOCTYPE html>
<html lang="en"
<head>
    <h1 style="color: darkblue">Калькулятор</h1>
    <link rel="stylesheet" href="CalcStyle.css" type="text/css"/>
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
include "Validator.php";
include "ValidatorForOparation.php";
$errs = [];

$firstArg = validateCalcValue('FirstCalcArg', $errs);
$secondArg = validateCalcValue('SecondCalcArg', $errs);
$operation = validateCalcOperation('CalcOperation', $errs);
$rezalt = 0;

if (!empty($errs)) {
    foreach ($errs as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
    }
}

if (isset($errs['FirstCalcArg'])){
    echo $errs['FirstCalcArg'];
}
if (isset($errs['SecondCalcArg'])){
    echo $errs['SecondCalcArg'];
}
if (isset($errs['CalcOperation'])){
    echo $errs['CalcOperation'];
}

//if (isset($_POST['button1'])) {
if (empty($errs)) {
    switch ($operation) {
        case '+':
                $rezalt = $firstArg + $secondArg;
                break;
        case '-':
                $rezalt = $firstArg - $secondArg;
                break;
        case '*':
                $rezalt = $firstArg * $secondArg;
                break;
        case '/':
            if ($secondArg != 0) {
                $rezalt = $firstArg + $secondArg;
                break;
            }
        default:
            break;
    }
}
?>

<form action="calculator.php" method="post">
    <p><input class="<?= isset($errs['FirstCalcArg']) ? 'error' : 'succes'; ?>"
              name="FirstCalcArg" size = "15" value="<?php echo $firstArg ?>" />
        <input class="<?= isset($errs['CalcOperation']) ? 'error' : 'succes'; ?>"
               name="SecondCalcArg" size = "5" value="<?php echo $operation ?>" />
        <input class="<?= isset($errs['SecondCalcArg']) ? 'error' : 'succes'; ?>"
               name="SecondCalcArg" size = "15" value="<?php echo $secondArg ?>" />
    </p>
    <p><input type="button" name="button1" value="Посчитать">
        <input type="reset" name="button2" value="Сбросить"> </p>
</form>
<?php echo "<h3 align = 'center'>Результат = $rezalt</h3>"; ?>


    <!--<button type="button" class="btn btn-default">Left</button>-->
<!--<div class="alert alert-danger" role="alert">-->
<!--    <a href="#" class="alert-link">Error</a>-->
<!--</div>-->

</body>
</html>