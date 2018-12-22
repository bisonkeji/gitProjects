<?php
function gen() {
    global $some_state; 

    echo "gen() execution start\n";
    $some_state = "changed";

    yield 1;
    yield 2;
}

$ret = gen();

foreach($ret as $k=>$v)
{
    echo "\n====\n";
    var_dump($k);
    var_dump($v);
}




