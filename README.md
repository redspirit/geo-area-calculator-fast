# geo-area-calculator-fast
Все аналогично geo-area-calculator

Вычисление площади полигона в координатах WGS'84. Порт ??-алгоритма на PHP и JS.
Статья источник: 

# Установка
В корне модуля:
```sh
.../geo-area-calculator-fast$ composer install
```
Если необходимы js-тесты:
```sh
.../geo-area-calculator-fast$ npm install
```
# Тесты
PHP
-----
```sh
.../geo-area-calculator-fast$ phpunit
```

JavaScript
-----
```sh
.../geo-area-calculator-fast$ npm test
```

# Примеры

JavaScript
-----
```js
alert( ffGeo.getGeoPolygonAreaFast(
			[
				[ -10.812317, 18 ],
				[ 10.812317, -18 ],
				[ 26.565051,  18 ],
				[ 52.622632, -18 ],
				[ 52.622632,  54 ],
				[ 10.812317,  54 ],
				[ -10.812317, 18 ],
			]
) );
```

PHP
-----
```php
use siddthartha\geo\area\fast\helpers\GeoAreaFastCalculator;

echo GeoAreaFastCalculator::getArea(
        [
                [ -10.812317, 18 ],
                [ 10.812317, -18 ],
                [ 26.565051,  18 ],
                [ 52.622632, -18 ],
                [ 52.622632,  54 ],
                [ 10.812317,  54 ],
                [ -10.812317, 18 ],
        ]
);
// 33953235824742.51 (sq.meters)
```