<?php
class csv{
public function to_array($filename='', $delimiter=',') {
  ini_set('auto_detect_line_endings',TRUE);
  if(!file_exists($filename) || !is_readable($filename))
      return FALSE;

  $header = NULL;
  $data = array();
  if (($handle = fopen($filename, 'r')) !== FALSE)
  {
      while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
      {
          if (!$header) {
              $header = $row;
          }
          else {
              if (count($header) > count($row)) {
                  $difference = count($header) - count($row);
                  for ($i = 1; $i <= $difference; $i++) {
                      $row[count($row) + 1] = $delimiter;
                  }
              }
              $data[] = array_combine($header, $row);
          }
      }
      fclose($handle);
  }
  return $data;
}


function match($file = '',$array1,$array2 = array() ){
  $csv = to_array($file);
  $csv_header = $array1[0];
  $csv_value = $array1[1];
  $match = false;
  $match_array_2 = false;
  if(isset( $array2) )
    $match_array_2 = true;

  foreach ($csv as $key => $value) {
    if($match_array_2){
      if( trim($value[ $array1[0] ]) === trim($array1[1])  &&  trim($value[ $array2[0] ]) === trim($array2[1]) )
         return true;
      }

      if(!$match_array_2){
        if( trim($value[ $array1[0] ]) === trim($array1[1]) )
          return true;
      }
    }
    return false;
  }

}

if($_REQUEST["debug_csv_array"] === 'true'){
  $csv = new csv;
  $csv = $csv->to_array($file = 'example.csv');
  echo '<pre>';
  print_r($csv);
  echo '</pre>';
}


?>