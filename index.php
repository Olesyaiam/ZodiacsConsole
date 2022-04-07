<?php
$zodiacsArray = array(
    'Овен' => array(
        'start' => '21.03.2000',
        'end' => '19.04.2000',
    ),
    'Телец' => array(
        'start' => '20.04.2000',
        'end' => '20.05.2000',
    ),
    'Близнецы' => array(
        'start' => '21.05.2000',
        'end' => '20.06.2000',
    ),
    'Рак' => array(
        'start' => '21.06.2000',
        'end' => '22.07.2000',
    ),
    'Лев' => array(
        'start' => '23.07.2000',
        'end' => '22.08.2000',
    ),
    'Дева' => array(
        'start' => '23.08.2000',
        'end' => '22.09.2000',
    ),
    'Весы' => array(
        'start' => '23.09.2000',
        'end' => '22.10.2000',
    ),
    'Скорпион' => array(
        'start' => '23.10.2000',
        'end' => '21.11.2000',
    ),
    'Стрелец' => array(
        'start' => '22.11.2000',
        'end' => '21.12.2000',
    ),
    'Козерог' => array(
        'start' => '22.12.2000',
        'end' => '19.01.2000',
    ),
    'Водолей' => array(
        'start' => '20.01.2000',
        'end' => '18.02.2000',
    ),
    'Рыбы' => array(
        'start' => '19.02.2000',
        'end' => '20.03.2000',
    )
);

do {
    $usersDay = readline('Введите число вашего дня рождения: ');
    // в этой переменной хранится строка с ошибкой или null если ошибки нет
    $errorDay = checkDay($usersDay);
    echo $errorDay;
} while ($errorDay);

do {
    $usersMonth = readline('Введите месяц вашего дня рождения: ');
// в этой переменной хранится строка с ошибкой или null если ошибки нет
    $errorMonth = checkMonth($usersMonth);
    echo $errorMonth;
} while ($errorMonth);

if (strlen($usersMonth) == 1) {
    $usersMonth = '0' . $usersMonth;
}
if (strlen($usersDay) == 1) {
    $usersDay = '0' . $usersDay;
}

$timestampOfBirth = strtotime($usersDay . '.' . $usersMonth . '.2000');

foreach ($zodiacsArray as $zodiacName => $dates) {
    $startTimestamp = strtotime($dates['start']);
    $endTimestamp = strtotime($dates['end']);

    if ($timestampOfBirth >= $startTimestamp && $timestampOfBirth <= $endTimestamp) {

        echo 'Ваш знак зодиака: ' . $zodiacName . PHP_EOL;
        break;
    }
}

echo 'До новых встреч!' . PHP_EOL;

function checkDay($usersDay)
{
    if (strlen($usersDay) == 0) {
        return 'Вы ничего не ввели' . PHP_EOL;
    } elseif (!is_numeric($usersDay)) {
        return 'Вы ввели не число' . PHP_EOL;
    } elseif ($usersDay < 1 || $usersDay > 31) {
        return 'Введите число от 1 до 31' . PHP_EOL;
    }

    return null;
}

function checkMonth($usersMonth)
{
    if (strlen($usersMonth) == 0) {
        return 'Вы ничего не ввели' . PHP_EOL;
    } elseif (!is_numeric($usersMonth)) {
        return 'Вы ввели не число' . PHP_EOL;
    } elseif ($usersMonth < 1 || $usersMonth > 12) {
        return 'Введите число от 1 до 12' . PHP_EOL;
    }

    return null;
}
