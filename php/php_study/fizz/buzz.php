<?php

for ($i = 1; $i <=100; $i++) {
    echo $i, "\n";
}
?>

<hr>
<?php
for ($i = 1; $i <=100; $i++) {
    if ($i % 3 == 0) {
        echo 'Fizz';
    }
    if ($i % 5 == 0) {
        echo 'Buzz';
    }
    if (!($i % 3 == 0) && !($i % 5 == 0)) {
        echo $i;
    }

    echo "\n";
}
?>
<hr>
<?PHP
for ($i = 1; $i <= 100; $i++) {
    echo toFizzBuzz($i), "\n";
}
function toFizzBuzz($n)
{
    $s = '';
    if ($n % 3 == 0) {
        $s .= 'Fizz';
    }
    if ($n % 5 == 0) {
        $s = 'Buzz';
    }
    if ($s === '') {
        $s = "{$n}";
    }
    return $s;
}
?>
<hr>
<?php
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
assert(toFizzBuzz_1(1) === '1');
assert(toFizzBuzz_1(3) === 'Fizz');
assert(toFizzBuzz_1(5) === 'Buzz');
assert(toFizzBuzz_1(15) === 'FizzBuzz');
assert(toFizzBuzz_1(45) === 'FizzBuzz');
assert(toFizzBuzz_1(99) === 'Fizz');
assert(toFizzBuzz_1(100) === 'Buzz');
assert(toFizzBuzz_1(101) === '101');

for ($i = 1; $i <= 100; $i++) {
    echo toFizzBuzz_1($i), "\n";
}

function toFizzBuzz_1($n)
{
    $s = '';
    if ($n % 3 == 0) {
        $s .= 'Fizz';
    }
    if ($n % 5 == 0) {
        $s = 'Buzz';
    }
    if ($s === '') {
        $s = "{$n}";
    }

    return $s;
}