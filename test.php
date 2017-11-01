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

function get_id(){
    $word = '0123456789abcdef';//字典檔

    for($a = 0; $a < 16; $a++){
      for($b = 0; $b < 16; $b++){
        for($c = 0; $c < 16; $c++){
          for($d = 0; $d < 16; $d++){
            for($e = 0; $e < 16; $e++){
              for($f = 0; $f < 16; $f++){
                for($g = 0; $g < 16; $g++){
                  for($h = 0; $h < 16; $h++){
                    for($i = 0; $i < 16; $i++){
                      for($j = 0; $j < 16; $j++){
                        for($k = 0; $k < 16; $k++){
                          for($l = 0; $l < 16; $l++){
                            for($m = 0; $m < 16; $m++){
                              for($n = 0; $n < 16; $n++){
                                for($o = 0; $o < 16; $o++){
                                  for($p = 0; $p < 16; $p++){
                                    $id = '';
                                    $id .= $word[$a];
                                    $id .= $word[$b];
                                    $id .= $word[$c];
                                    $id .= $word[$d];
                                    $id .= $word[$e];
                                    $id .= $word[$f];
                                    $id .= $word[$g];
                                    $id .= $word[$h];
                                    $id .= $word[$i];
                                    $id .= $word[$j];
                                    $id .= $word[$k];
                                    $id .= $word[$l];
                                    $id .= $word[$m];
                                    $id .= $word[$n];
                                    $id .= $word[$o];
                                    $id .= $word[$p];

                                    echo "ID = ".$id.", "."Hash = ".my_own_hash($id)."\r\n";

                                    if(my_own_hash($id) === $id){
                                        echo "bing go !"."     b = ".$id.", "."Hash = ".my_own_hash($id)."\r\n";
                                        break;
                                    }

                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    /*for($i = 0; $i < $id_len; $i++){ //總共取 幾次
        $id .= $word[rand() % $len];//隨機取得一個字元
    }*/

}
 
get_id();






