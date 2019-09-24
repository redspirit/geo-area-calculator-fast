# geo-area-calculator-fast
Все аналогично geo-area-calculator

Вычисление площади полигона в координатах WGS'84. Порт ??-алгоритма на PHP и JS.
Статья источник: 

# Установка
В корне проекта:
```sh
$ npm install https://github.com/redspirit/geo-area-calculator-fast --save
```

# Примеры

```js
let ffGeo = require('geoareafast');

let area = ffGeo(
    [
        [ -10.812317, 18 ],
        [ 10.812317, -18 ],
        [ 26.565051,  18 ],
        [ 52.622632, -18 ],
        [ 52.622632,  54 ],
        [ 10.812317,  54 ],
        [ -10.812317, 18 ],
    ]
)

console.log('area', area);
```

Ответ:  
m - квадратные метры  
km - квадратные километры
```sh
area { m: 35888490777120.08, km: 35888490.777120076 }
```