<?php
if (isset($_POST['FEN_file']) && isset($_POST['FEN_txt'])) {
  // if (file_exists($_POST['FEN_file'])) {
  //   $fh = fopen(realpath($_SERVER['DOCUMENT_ROOT']).$_POST['FEN_file'], 'a');
  //   fwrite($fh, $_POST['FEN_txt']."\n");
  // } else {
    $fh = fopen(realpath($_SERVER['DOCUMENT_ROOT']).$_POST['FEN_file'], 'w') or die("Cannot open file \"$myFile\"...\n");
    fwrite($fh, $_POST['FEN_txt']);
  // }
  // fclose($fh);
}
?>