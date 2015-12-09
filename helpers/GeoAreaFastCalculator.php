<?php

/*
 * Author: Anton Sadovnikoff
 * E-mail: sadovnikoff@gmail.com
 * 
 * Description: 
 * Вычисление площади полигона в координатах WGS'84 (fast version)
 * портирование JS алгоритма на Php 
 * источник: 
 */

namespace siddthartha\geo\area\fast\helpers;

use Exception;

/**
 * Description of GeoAreaCalculator
 *
 * @author siddthartha
 */
class GeoAreaFastCalculator
{

        /**
         * Get polygon area fast method
         * 
         * @param float[][] $polygon
         * @param float     $a
         * @param float     $f
         *
         * @return float area of given polygon in square meters 
         * @throws Exception
         */
        public static function getArea( $polygon, $a = 6378137.0 )
        {
                if( !is_array( $polygon ) || !is_array( $polygon[ 0 ] ) )
                {
                        throw new Exception( "Array of array of floats expected!" );
                }

                if( ( $polygon[ 0 ][ 0 ] != $polygon[ count( $polygon ) - 1 ][ 0 ] ) || ( $polygon[ 0 ][ 1 ] != $polygon[ count( $polygon ) - 1 ][ 1 ] )
                )
                {
                        $polygon[] = $polygon[ 0 ];
                }

                $total    = 0;
                $previous = $polygon[ 0 ];
                $cx       = 0;
                $cy       = 0;

                for( $i = 1; $i < count( $polygon ); $i++ )
                {
                        $cx = $cx + $polygon[ $i ][ 1 ];
                        $cy = $cy + $polygon[ $i ][ 0 ];
                }
                $cx = $cx / count( $polygon );
                $cy = $cy / count( $polygon );

                $xRef = $cx + 1;
                $yRef = $cy + 1;

                for( $i = 1; $i < count( $polygon ); $i++ )
                {
                        $current      = $polygon[ $i ];
                        $earthRadians = ($a * pi() / 180);
                        // convert to cartesian coordinates in meters, note this not very exact
                        $x1           = (($previous[ 1 ] - $xRef) * $earthRadians) * cos( $yRef * pi() / 180 );
                        $y1           = (($previous[ 0 ] - $yRef) * $earthRadians);
                        $x2           = (($current[ 1 ] - $xRef) * $earthRadians) * cos( $yRef * pi() / 180 );
                        $y2           = (($current[ 0 ] - $yRef) * $earthRadians);
                        $total       += ($x1 * $y2) - ($x2 * $y1);
                        $previous     = $current;
                }
                return 0.5 * abs( $total );
        }
}
