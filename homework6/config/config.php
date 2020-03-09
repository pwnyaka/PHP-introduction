<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'shop');
define("INIT_CATALOG", [
    [
        'imgName' => '01.jpg',
        'cost' => 8180000,
        'prodName' => 'BMW 7 series',
        'description' => 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться
         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины
          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились
           передние и задние фары и фартуки.'
    ],
    [
        'imgName' => '02.jpg',
        'cost' => 8670300,
        'prodName' => 'Mercedes-Benz S class',
        'description' => 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании
         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку
          моделей в иерархии классов торговой марки.'
    ],
    [
        'imgName' => '03.jpg',
        'cost' => 8070100,
        'prodName' => 'Audi A8',
        'description' => 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался
         до России. Автомобиль построен на новой платформе и получил множество современных опций.'
    ],
    [
        'imgName' => '04.jpg',
        'cost' => 4650800,
        'prodName' => 'Hyundai Genesis G90',
        'description' => 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию
         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый
          функционал, ничем не уступающий именитым конкурентам.'
    ],
    [
        'imgName' => '05.jpg',
        'cost' => 4200700,
        'prodName' => 'KIA K900',
        'description' => 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то
         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные
          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.'
    ],
]);

include $_SERVER['DOCUMENT_ROOT'] . "/../engine/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/log.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/catalog.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/feedback.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/add.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/calculator.php";