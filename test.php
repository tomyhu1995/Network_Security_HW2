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

    for($a = 15; $a >= 0; $a--){
      for($b = 15; $b >= 0; $b--){
        for($c = 15; $c >= 0; $c--){
          for($d = 15; $d >= 0; $d--){
            for($e = 15; $e >= 0; $e--){
              for($f = 15; $f >= 0; $f--){
                for($g = 15; $g >= 0; $g--){
                  for($h = 15; $h >= 0; $h--){
                    for($i = 15; $i >= 0; $i--){
                      for($j = 15; $j >= 0; $j--){
                        for($k = 15; $k >= 0; $k--){
                          for($l = 15; $l >= 0; $l--){
                            for($m = 15; $m >= 0; $m--){
                              for($n = 15; $n >= 0; $n--){
                                for($o = 15; $o >= 0; $o--){
                                  for($p = 15; $p >= 0; $p--){
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

                                    //echo "ID = ".$id.", "."Hash = ".my_own_hash($id)."\r\n";
				    if($k === 10){
					echo "Finding....."."  ID = ".$id.", "."Hash = ".my_own_hash($id)."\r\n";
				    }

                                    if(my_own_hash($id) === $id){
                                        echo "bing go !"."     b = ".$id.", "."Hash = ".my_own_hash($id)."\r\n";
                                        goto success;
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
success:
	echo 'The end'."\r\n";
}
 
get_id();
//echo my_own_hash('ffffffffffffff10');







