# Библиотека, созданная по тестовому заданию

Ссылка на тестовое задание: https://docs.google.com/document/d/115MIjgY5AvGc1bmOYcTBOVYK8SZBS1LrSfvo1agsdWI/edit

## Запуск программы
### Подключение библиотеки
1. Создаём пустой проект, добавляем файл composer.json. 

2. Запускаем следующую команду:
```composer run install```

3. Создаём в проекте файл, к примеру с таким названием: ```StartPoint.php``` 

4. Перед подключением библиотеки необходимо её достать с портала Packagist:
```composer require belyashdima-test-tasks/sitemap-lib-test```

5. Обновляем composer: ```composer update```

6. В файле ```composer.json``` должно быть так:
![composer.json](https://i.imgur.com/xg6k6Q7.png)

7. В скрипте после тега ```<?php``` добавляем следующие строки:
```php 
require_once __DIR__ . '/vendor/autoload.php';
use classes\BaseFormatter;
```

### Пример входных данных

```php
$urls = [
    [
        "loc" => "https://site.ru/",
        "lastmod" =>"2020-12-14",
        "priority" =>1,
        "changefreq"=>"hourly"
    ],
    [
        "loc" => "https://site.ru/news",
        "lastmod"=>"2020-12-10",
        "priority"=>0.5,
        "changefreq"=>"daily"
    ],
    [
        "loc" => "https://site.ru/about",
        "lastmod"=>"2020-12-07",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products",
        "lastmod"=>"2020-12-12",
        "priority"=>0.5,
        "changefreq"=>"daily"
    ],
    [
        "loc" => "https://site.ru/products/ps5",
        "lastmod"=>"2020-12-11",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products/xbox",
        "lastmod"=>"2020-12-12",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products/wii",
        "lastmod"=>"2020-12-11",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ]
];
```

### Примеры инициализаций объектов по различным форматам файла:
```php
// Путь для примера, можно указать любой другой
$path = getenv('HOME').'/uploads/sitemap2.json'; 
$jsonFile = new BaseFormatter($urls,'json',$path);

$path2 = getenv('HOME').'/uploads/sitemap2.сsv';
$csvFile = new BaseFormatter($urls,'csv',$path2);

$path3 = getenv('HOME').'/uploads/sitemap2.xml';
$xmlFile = new BaseFormatter($urls,'xml',$path3);
```

### Итоговый код скрипта StartPoint.php
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use classes\BaseFormatter;

$urls = [
    [
        "loc" => "https://site.ru/",
        "lastmod" =>"2020-12-14",
        "priority" =>1,
        "changefreq"=>"hourly"
    ],
    [
        "loc" => "https://site.ru/news",
        "lastmod"=>"2020-12-10",
        "priority"=>0.5,
        "changefreq"=>"daily"
    ],
    [
        "loc" => "https://site.ru/about",
        "lastmod"=>"2020-12-07",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products",
        "lastmod"=>"2020-12-12",
        "priority"=>0.5,
        "changefreq"=>"daily"
    ],
    [
        "loc" => "https://site.ru/products/ps5",
        "lastmod"=>"2020-12-11",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products/xbox",
        "lastmod"=>"2020-12-12",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ],
    [
        "loc" => "https://site.ru/products/wii",
        "lastmod"=>"2020-12-11",
        "priority"=>0.1,
        "changefreq"=>"weekly"
    ]
];

// Путь для примера, можно указать любой другой
$path = getenv('HOME').'/uploads/sitemap3.json';
$jsonFile = new BaseFormatter($urls,'json',$path);

$path2 = getenv('HOME').'/uploads/sitemap3.сsv';
$csvFile = new BaseFormatter($urls,'csv',$path2);

$path3 = getenv('HOME').'/uploads/sitemap3.xml';
$xmlFile = new BaseFormatter($urls,'xml',$path3);

?>
```

### Примеры сгенерированных файлов
#### CSV
![CSV-файл](https://i.imgur.com/9EJ4CsH.png)
#### JSON 
![JSON-файл](https://i.imgur.com/9mk3kC2.png)
#### XML
![XML-файл](https://i.imgur.com/AE2tFJ5.png)

### Пример исключения
```php
$path4 = getenv('HOME').'/uploads/sitemap3.txt';
$txtFile = new BaseFormatter($urls,'txt',$path3);
```
```
/bin/php /home/belyashdima/PhpstormProjects/untitled2/StartPoint.php
PHP Fatal error:  Uncaught Exception: Неподдерживаемый формат файла in /home/belyashdima/PhpstormProjects/untitled2/vendor/belyashdima-test-tasks/sitemap-lib-test/classes/BaseFormatter.php:44
Stack trace:
#0 /home/belyashdima/PhpstormProjects/untitled2/vendor/belyashdima-test-tasks/sitemap-lib-test/classes/BaseFormatter.php(28): classes\BaseFormatter->setFormatter()
#1 /home/belyashdima/PhpstormProjects/untitled2/StartPoint.php(61): classes\BaseFormatter->__construct()
#2 {main}
  thrown in /home/belyashdima/PhpstormProjects/untitled2/vendor/belyashdima-test-tasks/sitemap-lib-test/classes/BaseFormatter.php on line 44

Process finished with exit code 255
```
