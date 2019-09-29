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

### Donut
```php
<?php
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [100, 10, 7];
$characters = ["A", "B", "C"];
$labels = ["January", "February", "March"];
$radius = 6;
$size = 2;
$pie = new Charts\Donut($title, $values, $labels, $characters, $radius, $size);
$pie->draw();
```
#### Output
```
         Orders         
        AAAAAAAAAA        
    AAAAAA      AAAABB    
  AAAA              BBBB  
  AA                  BB  
AAAA                  BBCC
AA                      CC
AA                      CC
AA                      AA
AAAA                  AAAA
  AA                  AA  
  AAAA              AAAA  
    AAAAAA      AAAAAA    
        AAAAAAAAAA        
January 85%
February 9%
March 6%
```