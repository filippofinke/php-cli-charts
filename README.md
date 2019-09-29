# php-cli-charts

Simple library that allows you to create charts for the command line. 

## Charts examples
### Bar
```php
<?php
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [14, 10, 7];
$labels = ["January", "February", "March"];
$size = 2;

$bar = new Charts\Bar($title, $values, $labels, $size);
$bar->draw();
```
#### Output
```
           Orders        
14|   **                  
13|   **                  
12|   **                  
11|   **                  
10|   **      **          
9 |   **      **          
8 |   **      **          
7 |   **      **      **  
6 |   **      **      **  
5 |   **      **      **  
4 |   **      **      **  
3 |   **      **      **  
2 |   **      **      **  
1 |   **      **      **  
   January February March
```