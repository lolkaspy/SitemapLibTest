# Библиотека, созданная по тестовому заданию

Ссылка на тестовое задание: https://docs.google.com/document/d/115MIjgY5AvGc1bmOYcTBOVYK8SZBS1LrSfvo1agsdWI/edit

## Запуск программы
### Подключение библиотеки

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

### Примеры сгенерированных файлов
#### CSV
![CSV-файл](https://i.imgur.com/9EJ4CsH.png)
#### JSON 
![JSON-файл](https://i.imgur.com/9mk3kC2.png)
#### XML
![XML-файл](https://i.imgur.com/AE2tFJ5.png)