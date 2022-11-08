<?php
function taoMang($n) {
    //tạo mảng có n phần tử, các phần tử có giá trị [-100,200]
    $arr = array();

    for($i=0;$i<$n;$i++) {
        $x=rand(-100,200);
        $arr[$i]=$x;
    }

    return $arr;
}

function demSoChan($arr) {
    $count=0;

    foreach($arr as $v){
        if($v%2==0)
            $count++;
    }

    return $count;
}