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
	<title><?php echo (isset($_GET['ma-phong'])) ? 'Phòng: '.$_GET['ma-phong']: 'Trang nhất'; ?> - Cờ Tướng</title>
	<?php
include template('head.game');
include template('ga');
?>
</head>

<body class="<?php echo (isset($_GET['ma-phong'])) ? 'room': 'home'; ?>" data-href="/">
	<?php
include template('header');
?>
	<main class="main">
		<div class="container-fluid game px-0">
			<div class="container p-5">
				<h2 class="h1-responsivefooter text-center my-4">Cờ tướng cho mọi người</h2>
				<audio id="nuoc-co">
					<source src="/static/sound/am-thanh-co.wav" type="audio/wav">
					Your browser does not support the audio element.
				</audio>
				<audio id="het-tran">
					<source src="/static/sound/het-tran.mp3" type="audio/mp3">
					Your browser does not support the audio element.
				</audio>
				<!-- <p class="w-100 text-center my-1">
					<a id="tao-phong" data-file="/ma-phong/<?php echo md5(time()); ?>.txt"
						class="btn btn-success btn-lg"
						href="/?ma-phong=<?php echo md5(time()); ?>"><i
							class="fad fa-plus-hexagon"></i> Tạo phòng</a>
				</p> -->
				<?
if (!isset($_GET['quan'])):
  if (isset($_GET['choi-voi-may']) && $_GET['choi-voi-may'] == 'ok'):
?>
				<!-- <h3 class="text-center my-2"><i class="fal fa-desktop"></i> Đang chơi với máy</h3> -->
				<?php
  // elseif (isset($_GET['ma-phong'])):
?>
				<!-- <p id="room-code" class="w-100 text-center mt-2">
					<span class="alert alert-info d-inline-block" role="alert"><i
							class="fad fa-trophy-alt"></i> Mã phòng:
						 <?php echo $_GET['ma-phong']; ?></span> 
				</p> -->
				<!-- <?php
    //  if (isset($_GET['duoc-moi']) && $_GET['duoc-moi'] == 'ok'):
?> -->
				<!-- <p class="w-100 text-center mt-2">
					<span class="alert alert-success d-inline-block" role="alert">Đã được mời</span>
					<span class="side-color black">QUÂN ĐEN</span>
				</p> -->
				<?php
    // else:
?>
				<!-- <p class="w-100 text-center mt-2">
					<a class="w-25 mx-auto btn btn-success btn-sm" target="_blank" href=""><i
							class="fad fa-external-link-alt"></i> Mời bạn bè cùng chơi</a>
				</p> -->
				<!-- <div id="copy-url" class="input-group mb-2 w-50 mx-auto">
					<div class="input-group-prepend">
						<span class="input-group-text" id="url-addon"><i
								class="fal fa-copy"></i></span>
					</div>
					<input type="text" class="form-control" id="url" aria-describedby="url-addon"
						value="" />
				</div> -->
				<!-- <p class="w-100 text-center mt-2">
					<span class="side-color red">QUÂN ĐỎ</span>
				</p> -->
				<?php
    // endif;
// else:
?> 
				<!-- <h3 class="text-center my-2"><i class="fal fa-user"></i> Đang chơi với nhau</h3> -->
				<?php
  // endif;
// elseif (isset($_GET['quan'])):
?>
				<!-- <p id="room-code" class="w-100 text-center mt-2">
					<span class="alert alert-info d-inline-block" role="alert"><i
							class="fad fa-trophy-alt"></i> Mã phòng:
						<?php echo $_GET['ma-phong']; ?></span>
				</p> -->
				<?php
//   if ($_GET['quan'] == 'do'):
?>
				<!-- <p class="w-100 text-center mt-2">
					<span class="side-color red">QUÂN ĐỎ</span>
				</p> -->
				<?php
//   elseif ($_GET['quan'] == 'den'):
?>
				<!-- <p class="w-100 text-center mt-2">
					<span class="side-color black">QUÂN ĐEN</span>
				</p> -->
				<?php
//   endif;
?>
				<?php
// endif;
?>
				<div class="row">
					<p class="w-100 text-center my-1">
						<span class="d-inline-block rounded" id="game-status"></span>
					</p>
					<p class="w-100 text-center mt-2">
						<span class="rounded d-none" id="game-over"><i
								class="fad fa-flag-checkered"></i> HẾT TRẬN</span>
					</p>
					<div id="ban-co" class="w-50 mx-auto"></div>
					<input type="hidden" name="FEN" id="FEN" />
					<?
if (isset($_GET['choi-voi-may']) && $_GET['choi-voi-may'] == 'ok'):
?>
					<p class="w-100 text-center mt-4">
						<a class="w-25 btn btn-danger btn-lg" href="/"><i
								class="fad fa-user"></i> Chơi với nhau</a>
						<a class="w-25 btn btn-warning btn-lg" href="/?choi-voi-may=ok"><i
								class="fad fa-redo-alt"></i> Chơi lại</a>
					</p>
					<?php
// else:
?>
					<p class="w-100 text-center mt-4">
						<a class="w-25 btn btn-danger btn-lg" href="/?choi-voi-may=ok"><i
								class="fad fa-desktop"></i> Chơi với máy</a>
					</p>
					<?php
// endif;
?>
					<!-- <h4 class="w-100 mt-5"><i class="fab fa-github"></i> Xin chân thành cám ơn:</h4>
					<ul id="credit">
						<li><a target="_blank"
								href="https://github.com/lengyanyu258/xiangqiboardjs">lengyanyu258/xiangqiboardjs</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/lengyanyu258/xiangqi.js">lengyanyu258/xiangqi.js</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/twbs/bootstrap">twbs/bootstrap</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/jquery/jquery">jquery/jquery</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/popperjs/popper-core">popperjs/popper-core</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/FortAwesome/Font-Awesome">FortAwesome/Font-Awesome</a>
						</li>
						<li><a target="_blank"
								href="https://github.com/tungpham42/co-tuong">tungpham42/co-tuong</a>
						</li>
					</ul> -->
				</div>
			</div>
		</div>
		<?php
include template('script.game');
if (isset($_GET['choi-voi-may']) && $_GET['choi-voi-may'] == 'ok') {
  include template('game.ai');
} elseif (isset($_GET['ma-phong'])) {
  include template('game.room');
} else {
  include template('game.human');
}
include template('adsense');
?>
	</main>
	<?php
include template('footer');
include template('service_worker');
?>
</body>

</html>