<?php

function my_own_hash($input)
{
  $magic1 = 1345345333;
  $magic2 = 0x12345671;
  $sum = 7;  $tmp = null;
  $len = strlen($input);
  for ($i = 0; $i < $len; $i++) {
    $byte = substr($input, $i, 1);
    if ($byte == ' ' || $byte == "\t")
        continue;
    $tmp = ord($byte);
    $magic1 ^= ((($magic1 & 63) + $sum) * $tmp) + (($magic1 << 8) & 0xFFFFFFFF);
    $magic2 += (($magic2 << 8) & 0xFFFFFFFF) ^ $magic1;
    $sum += $tmp;
  }
  $out_a = $magic1 & ((1 << 31) - 1);
  $out_b = $magic2 & ((1 << 31) - 1);
  $output = sprintf("%08x%08x", $out_a, $out_b);
  
  return $output;
}

function getrand_id(){
    $id_len = 16;//字串長度
    $id = '';
    $word = '0123456789abcdef';//字典檔 你可以將 數字 0 1 及字母 O L 排除
    $len = strlen($word);//取得字典檔長度
  
    for($i = 0; $i < $id_len; $i++){ //總共取 幾次
        $id .= $word[rand() % $len];//隨機取得一個字元
    }

    return $id;//回傳亂數帳號
}
 
$a=array();//初始化一個陣列要來存放所產生的亂數
 
while(my_own_hash($b) !== $b){ //$x=>要取得幾筆亂數帳號
    $b=getrand_id();//取得亂數帳號
    if(!in_array($b,$a)){//判斷有沒有重覆
        array_push($a,$b);//將產生的亂數帳號加入陣列
    }else{
        $x-=1;
    }//有重覆再重新產生一筆
    echo "b = ".$b.", "."Hash = ".my_own_hash($b)."\r\n";

    if(my_own_hash($b) === $b){
      echo "bing go !"."     b = ".$b.", "."Hash = ".my_own_hash($b)."\r\n";
    }
}






