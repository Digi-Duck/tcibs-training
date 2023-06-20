<?php
    // $word = explode(' ',trim(fgets(STDIN)));
    // $num = trim(fgets(STDIN));
    // $array = [];
    // $lon = 0;
    // $a = 0;
    // $in = str_split($word[0]);
    // $end = str_split($word[1]); 
    // $anArr = [];
    // array_push($anArr,$in);

    // for ($i=0; $i < $num ; $i++) { 
    //     array_push($array,str_split(trim(fgets(STDIN))));
    // }
    // while($a == 0){
    //     $b = 0;
    //     foreach ($array as $key => $value) {
    //         if($in == $end){
    //             $a = 1;
    //         }elseif (count(array_diff_assoc($in,$value)) == 1) {
    //             array_push($anArr,$value);
    //             $in = $value;
    //             $b = 1;
    //         }
            
    //     }
    //     // echo count(array_diff_assoc($start,$value));
        
    //     if($b == 0){
    //         // print_r($anArr);
    //         if(count($anArr) > 0){
    //             if(count($array) > 1){
    //                 unset($array[array_search(end($anArr),$array)]);
    //                 unset($anArr[array_search(end($anArr),$anArr)]);
    
    //             }else{
    //                 $array = [];
    //             }

    //         }else{
    //             $a = 1;
    //         }

    //     }
    // }

    // // foreach ($anArr as $key => $value) {
    // //     foreach ($value as $k => $v) {
    // //         echo $v;
    // //     }
    // //     echo ''."\n";
    // // }
    // echo count($anArr);

    class Node {
        public $value;
        public $child;

        public function __construct($value) {
            $this->value = $value;
            $this->child = [];
        }
    }

    function build_graph($items) {
        $graph = [];
        foreach ($items as $value) {
            $node = new Node($value);
            foreach ($items as $other) {
                if ($other === $value) {
                    continue;
                }
                if (count(array_diff_assoc($value,$other)) === 1) {
                    array_push($node->child, $other);
                }
            }
            array_push($graph, $node);
        }
        return $graph;
    }

    $word = explode(' ',trim(fgets(STDIN)));
    $num = trim(fgets(STDIN));
    $array = [str_split($word[0])];

    for ($i=0; $i < $num ; $i++) { 
        array_push($array,str_split(trim(fgets(STDIN))));
    }
    
    $graph = build_graph($array);

    $stack = [0];
    $v = 0;
    $marked = array_fill(0, count($graph), 0);
    $path = [];

    print_r($graph);

    while (count($stack) > 0) {
        $v = array_pop($stack);
        if ($marked[$v] === 0) {
            $marked[$v] = 1;
            array_push($path, $v);
            foreach ($graph[$v]->child as $idx => $n) {
                array_push($stack, $idx);
            }
        }
    }

    print_r($path);

?>