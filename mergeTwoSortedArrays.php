
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Merging two sorted arrays</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>

    <?php


    $array1 = generateRandomAndSortedArray();
    $array2 = generateRandomAndSortedArray();

    $final_array = array();


    $max_loops = (count($array1)+count($array2));

    for ($i=0; $i < $max_loops ;$i++){

        $arrayContainsSmallestValue = (current($array1)<current($array2))?"array1":"array2";
        $arrayContainsBiggerValue = (current($array1)>current($array2))?"array1":"array2";

        $smallestItem = current($$arrayContainsSmallestValue);
        next($$arrayContainsSmallestValue);
        if(current($$arrayContainsSmallestValue)==null){
            while(current($$arrayContainsBiggerValue)!=null){
                doArrayPush(current($$arrayContainsBiggerValue));
                next($$arrayContainsBiggerValue);
            }
            break;
        }

        // if both values are identical then we move also the pointer of the array with the bigger value
        if( current($$arrayContainsSmallestValue)===current($$arrayContainsBiggerValue)){
            next($$arrayContainsBiggerValue);
        }

        doArrayPush($smallestItem);

    }
    /**
     * @param $smallestItem
     * Pushing to $final_array the smallest available value
     */
    function doArrayPush($smallestItem){
        global $final_array;
        if ($smallestItem > end($final_array)){
            array_push($final_array, $smallestItem);
        }
    };

    /**
     * Generating sorted array with random values (numbers ) and random length
     */
    function generateRandomAndSortedArray(){
        $valueMinItem       = 1;
        $valueMaxItem       = 40;
        $arrayMinLength     = 10;
        $arrayMaxLength     = 50;

        $numbers = range($valueMinItem, $valueMaxItem);
        $lengthArray = rand($arrayMinLength,$arrayMaxLength);
        shuffle($numbers);
        $numbers=array_slice($numbers, 0, $lengthArray);
        sort($numbers);
        return $numbers;
    };

    ?>
    <style>
        .column {
            float: left;
            width: 33.33%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

</head>
<body>

<input type="button" value="click to reload page and generate two new random arrays" onclick="javascript:document.location.reload()">
<hr>
<div class="row">
    <div class="column">
        <b>Sorted array #1<br>Randomly generated</b>
        <br>
        <pre><?php print_r($array1); ?></pre>
    </div>
    <div class="column">
        <b>Sorted array #2<br>Randomly generated</b>
        <br>
        <pre><?php print_r($array2); ?></pre>
    </div>
    <div class="column">
        <b>Array #1 & #2 merged and mantained sorted <br>into new array using pointers</b>
        <br>
        <pre><?php print_r($final_array); ?></pre>
    </div>
</div>


</body>


