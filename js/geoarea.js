/* 
 * Author: Anton Sadovnikoff
 * E-mail: sadovnikoff@gmail.com
 * 
 * Description: 
 * Вычисление площади полигона в координатах WGS'84
 * портирование ?? алгоритма на JavaScript 
 * источник: 
 */
ffGeo = (function ( _this ) {

    /**
     * NO LAST POINT on input ! now
     * @param {type} polygon
     * @returns {Number}
     */
    function getGeoPolygonAreaFast( polygon ) {
        if ( polygon.length < 3 ) {
            throw new Error('polygon should have at least three points');
        }
        // first -> new last
        polygon.push( polygon[0] );
        var total = 0;
        var previous = polygon[0];
        var cx = 0;
        var cy = 0;

        for (var i = 1; i < polygon.length; i++) {
            cx = cx + polygon[i][1];
            cy = cy + polygon[i][0];
        }
        cx = cx / polygon.length;
        cy = cy / polygon.length;

        var xRef = cx + 1;
        var yRef = cy + 1;

        for (var i = 1; i < polygon.length; i++) {
            var current = polygon[i];
            var earthRadians = (6378137 * Math.PI / 180);
            // convert to cartesian coordinates in meters, note this not very exact
            var x1 = ((previous[1] - xRef) * earthRadians) * Math.cos(yRef * Math.PI / 180);
            var y1 = ((previous[0] - yRef) * earthRadians);
            var x2 = ((current[1] - xRef) * earthRadians) * Math.cos(yRef * Math.PI / 180);
            var y2 = ((current[0] - yRef) * earthRadians);
            total += (x1 * y2) - (x2 * y1);
            previous = current;
        }
        return 0.5 * Math.abs(total);
    }
    ;

    _this.getGeoPolygonAreaFast = getGeoPolygonAreaFast;

    return _this;
}( typeof ffGeo !== 'undefined' ? ffGeo : {} ));

if(! typeof module === 'undefined' ) {
    module.exports = ffGeo;
}