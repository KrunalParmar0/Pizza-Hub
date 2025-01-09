<?php
    function some(){
        $a = rand(0,9);
        $b = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $c = array('!','@','#','$','%');
        
        // foreach($b as $ele)
        //     echo ;
        // }
       
        for($i=0;$i<1;$i++){
            $b =  $b[rand($i,25)];
            $c =  $c[rand($i,4)];
        }
        return $a.$b.$c;
        // echo $b;
        // echo $c;
    }
    
  echo "<br >";
   $k =  some();
//    echo $k;
?>