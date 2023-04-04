<?php
error_reporting(-1);
ini_set('display_errors', 'On');
$basepath = realpath($_SERVER['DOCUMENT_ROOT']);
$template_path = $basepath.'/templates/';
require $basepath.'/inc/template.inc.php';
require $basepath.'/inc/variables.inc.php';
$sub = 'game';
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
  <meta charset="UTF-8">
  <title>Danh sách phòng - Cờ Tướng</title>
<?php
include template('head.game');
include template('ga');
?>
  </head>
  <body class="room" data-href="/danh-sach-phong/">
<?php
include template('header');
?>
    <main class="main">
      <div class="container-fluid game px-0">
        <div class="container p-5">
          <h2 class="h1-responsivefooter text-center my-4">Danh sách phòng</h2>
<?php
$dir = $basepath.'/ma-phong';
$files = glob($dir."/*.txt");
$files_count = count($files);
$room_codes = array();
for ($i = 0; $i < $files_count; ++$i) {
  $room_codes[$i] = str_replace(array($dir.'/', '.txt'), '', $files[$i]);
}
//print_r($files);
//print_r($room_codes);
?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-dark">
                <tr>
                  <th class="text-center" scope="col">STT</th>
                  <th class="text-left" scope="col">Mã phòng</th>
                  <th class="text-center" scope="col">Đỏ</th>
                  <th class="text-center" scope="col">Đen</th>
                </tr>
              </thead>
              <tbody style="background-color: whitesmoke;">
<?php
for ($p = 0; $p < $files_count; ++$p):
?>
                <tr>
                  <th class="text-center" scope="row"><?php echo ($p + 1); ?></th>
                  <td class="text-left"><?php echo '<a target="_blank" href="/?ma-phong='.$room_codes[$p].'">'.$room_codes[$p].'</a>'; ?></td>
                  <td class="text-center"><?php echo '<a class="btn btn-danger" href="/?ma-phong='.$room_codes[$p].'&amp;quan=do">ĐỎ</a>'; ?></td>
                  <td class="text-center"><?php echo '<a class="btn btn-dark" href="/?ma-phong='.$room_codes[$p].'&amp;quan=den">ĐEN</a>'; ?></td>
                </tr>
<?php
endfor;
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<?php
include template('script.common');
include template('adsense');
?>
    </main>
<?php
include template('footer');
include template('service_worker');
?>
  </body>
</html>