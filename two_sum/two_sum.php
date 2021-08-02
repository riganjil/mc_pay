<?php
function twoSum($nums, $target) {
    foreach($nums as $key => $num){
        for($i = $key+1; $i<count($nums);$i++){
            if($num + $nums[$i] == $target){
                return [$key, $i];
            }
        }
    }
}

echo json_encode(twoSum([2,7,11,15], 13));
?>