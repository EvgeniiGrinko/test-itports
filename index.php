<?php
// 1) PHP: Вывести цифры по порядку
$arrayNumber = [
    [0,1,2,3,4,5,6,7,8,9,10]
];
// Функция для проверки является ли числом элемент массива и если является выводим его
function checkIfInt($element, $key){
    if(is_integer($element)){
        echo "$element <br>";
    }
}
// Используем рекурсивную функцию для прохода многомерного массива и применяем функцию checkIfInt для каждого элемента массива и подмассивов 
array_walk_recursive($arrayNumber, 'checkIfInt');

//2) MySQL: Написать запрос для выборки данных из таблицы, где id = 10
$sql = "SELECT * FROM `call_book` WHERE `id`= 10";

// 3) PHP: Вывести ключи и значение массива
$arrayInfo = [
    'name' => 'Ivan',
    'surname' => 'Ivanov',
    'address' => 'Petrovsk',
    'telephone' => '8 (985) 222-33-44'
];
//Проходим по массиву, достаем и выводим пары ключ - значение
foreach($arrayInfo as $key => $value){
    echo "$key - $value"."<br>";
}

// 4) PHP: Вывести месяца года

$arrayMonth = [
    [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март'
    ],
    [
        1 => 'Апрель',
        2 => 'Май',
        3 => 'Июнь'
    ]
]; 
//Проверяем с помощью функции является ли элемент строкой (так как месяца года строки), если "да" - выводим
function checkIfStr($element, $key){
    if(is_string($element)){
        echo "$element <br>";
    }
}
// Используем рекурсивную функцию для прохода многомерного массива и применяем функцию checkIfStr для каждого элемента массива и подмассивов 
array_walk_recursive($arrayMonth, 'checkIfStr');

// 5) PHP: Дана информация в json формате, надо вывести её.
// {
//     "years":[1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008
//     ,2009,2010]
// }
$years = json_decode('{"years":[1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010]}', true);
foreach($years as $key => $value){
    echo "$key - ";
    if(is_array($value)){
        echo implode(', ',$value);
    };
};

// 6) PHP и MySQL: Дан код, нужно ответить на вопросы аргументировав свой ответ
// $hostname = 'localhost::3306';
// $username = '';
// $password = '';
// $database = 'My Data Base';
// $conn = mysqli_connect($hostname, $database, $username, $password);
// $sql = "SELECT * FROM `call_book`";
// $resultSet = mysqli_query($conn, $sql);
// var_dump($resultSet);
// 6.1) Запрос mysqli_query будет выполнен к базе данных если она ранее была создана и в ней создана также таблица users
// 6.2) вернёт объект mysqli_result, который необходимо пройти в цикле while с функцией mysqli_fetch_assoc
// 6.3) 
// $sql2 = "DELETE from users WHERE `id` IN (1,2,3,4,5)";
// mysqli_query($conn, $sql2);

// 7) PHP и HTML: Написать форму с одним полей для вода текста и
// кнопкой, по нажатию которой идёт сохранения данных из поля в файл.
// Создаем простую форму, которая будет методом POST отправлять в index.php текст из формы
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Page</title>
</head>
<body>
    <h3>Save text to file</h3>
    <form action="index.php" method="post">
        <textarea name="text"></textarea>
         <br> <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
<?php 
// Открываем/создаем (если не был создан ранее) файл request.txt 
fopen(dirname(__FILE__) ."/request.txt", "w+");
//Получаем из глобальной переменной $_POST текст
$text = $_POST['text'];
// При условии наличия text в глобальной переменной записываем в ранее созданный/открытый файл request.txt (для этого необходимо дать соответствующие разрешения)
if($text ){
    file_put_contents(dirname(__FILE__) ."/request.txt", $text ) or die("Unable to open file!");

}




