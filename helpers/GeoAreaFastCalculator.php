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
class GeoAreaFastCalculator {
	/**
	 *
	 * @param float[][] $coordinates
	 * @param float     $a
	 * @param float     $f
	 *
	 * @return float area of given polygon in square meters
	 * @throws Exception
	 */
	public static function getArea( $coordinates, $a = 6378137.0, $f = 298.257223563 ) {
		if ( ! is_array( $coordinates ) || ! is_array( $coordinates[0] ) ) {
			throw new Exception( "Array of array of floats expected!" );
		}

		if ( ( $coordinates[0][0] != $coordinates[ count( $coordinates ) - 1 ][0] )
		     || ( $coordinates[0][1] != $coordinates[ count( $coordinates ) - 1 ][1] )
		) {
			$coordinates[] = $coordinates[0];
		}


		return $area;
	}

}
