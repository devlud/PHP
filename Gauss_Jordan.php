<?php

function Gauss_Jordan($X, $b, $etat = "OK" ){

	$n = count( $X ) ;

	for( $i = 0; $i < $n; $i++ ){

		if( $X[ $i ][ $i ] == 0 ){

			return $etat = "KO" ;
		}

		else{
    
    		for( $j=0; $j<=$n ; $j++){
     
        		if( $j < $n ){
            
            		$S[$i][$j] = $X[$i] [$j] ;
       			}
        		else{
            		$S[$i][$j] = $b[$i];
        		}
    		}
		}
		
	}

	for( $i = 0; $i < $n; $i++ ){
		
        $pivot = $S[ $i ][ $i ] ;

		for( $j = 0; $j < $n + 1; $j++ ){
            
            if( $pivot == 0 ){

                return $etat = "KO" ;
            }
            
            else{
            
                $S[ $i ][ $j ] = $S[ $i ][ $j ] / $pivot ;
                
            }
			
        }

        for( $k = 0; $k < $n ; $k++ ){
				
			if( $k <> $i ){
			
                $coef = $S[ $k ][ $i ] ;
                
                for( $j = 0; $j < $n + 1; $j++ ){

				    $S[ $k ][ $j ] = $S[ $k ][ $j ] - $coef * $S[ $i ][ $j ]  ;
                    
                }
			
            }

		}
		
	}

	for( $i = 0; $i < $n ; $i++ ){

		$resultat[ $i ][ 0 ] = $S[ $i ][ $n ]  ;
		
	}

	return $resultat ;

}

$A = array( 
 	 array( 2, 1, -4 ), 
	 array(  3,  3,  -5 ), 
 	 array(  4,   5,   -2)
) ;

$sol = array( 8, 14, 16 ) ; 

$syst = Gauss_Jordan($A,$sol);

echo "<pre>";
print_r($syst);
echo "</pre>";

?>


