/* 
 * Author: Anton Sadovnikoff
 * E-mail: sadovnikoff@gmail.com
 * 
 * Description: 
 * Вычисление площади полигона в координатах WGS'84
 * портирование ?? алгоритма на JavaScript 
 * источник: 
 */

const getGeoPolygonAreaFast = polygon => {
    if ( polygon.length < 3 ) {
        throw new Error('polygon should have at least three points');
    }
    // first -> new last
    polygon.push( polygon[0] );
    let total = 0;
    let previous = polygon[0];
    let cx = 0;
    let cy = 0;

    for (let i = 1; i < polygon.length; i++) {
        cx = cx + polygon[i][1];
        cy = cy + polygon[i][0];
    }
    cx = cx / polygon.length;
    cy = cy / polygon.length;

    let xRef = cx + 1;
    let yRef = cy + 1;

    for (let i = 1; i < polygon.length; i++) {
        let current = polygon[i];
        let earthRadians = (6378137 * Math.PI / 180);
        // convert to cartesian coordinates in meters, note this not very exact
        let x1 = ((previous[1] - xRef) * earthRadians) * Math.cos(yRef * Math.PI / 180);
        let y1 = ((previous[0] - yRef) * earthRadians);
        let x2 = ((current[1] - xRef) * earthRadians) * Math.cos(yRef * Math.PI / 180);
        let y2 = ((current[0] - yRef) * earthRadians);
        total += (x1 * y2) - (x2 * y1);
        previous = current;
    }
    let meters = 0.5 * Math.abs(total);
    return {
        m: meters,
        km: meters  / 1e+6
    };
};

module.exports = getGeoPolygonAreaFast;
