<?php
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('max_execution_time', 0);
set_time_limit(0);
//$lang_code = init_lang_code();
//require $basepath.'/vendor/autoload.php';
$lang_code = 'vi';
$keywords = "cờ tướng, cotuong, co tuong, xiangqi, xiang qi";
$og_title = "Đây là Máy tính Nhịp sinh học";
$og_desc = "Đây là Máy tính Nhịp sinh học. Sử dụng công cụ này để tìm hiểu thêm về bản thân bạn. Chọn Ngày sinh Dương lịch của bạn với định dạng YYYY-MM-DD (năm-tháng-ngày) bằng công cụ Chọn ngày. Sau đó, nhấn nút `Tính` để tính toán chỉ số Sức khỏe, Tình cảm, Trí tuệ của bạn. Nếu bạn chỉ quan tâm đến Nhịp sinh học ngủ, bạn có thể bỏ qua mục này.";
$article_tag = "cờ tướng";
$bmi_title = "Đây là Máy tính Chỉ số khối cơ thể";
$bmi_desc = "Đây là Máy tính Chỉ số khối cơ thể. Sử dụng công cụ này để biết Cân nặng và Chiều cao lý tưởng cũng như Lời khuyên.";
$game_title = "Cùng chơi Cờ Tướng nào";
$game_desc = "Đây là Bàn Cờ Tướng, cùng chơi nào!";
$time_zone = 7;
$show_ad = false;
$show_donate = false;
$show_sponsor = false;
$show_addthis = false;
$show_sumome = false;
$hotjar = false;
$clicktale = false;
$smartlook = false;
$credential_id = 3; //change this to 4 in DEMO
//$cdn_url = 'https://nhipsinhhoc.cdn.vccloud.vn';
//$cdn_url = "https://cdn_local.nhipsinhhoc.vn";
//$cdn_url = "https://cdn.biorhythm.xyz";
//$cdn_url = "https://static-bio.vncdn.vn";
$cdn_url = "";
//$cdn_url = "https://filecuatui.com";
//$cdn_url = "https://taptincuatui.com";
//$cdn_url = 'https://biorhythm.cdn.vccloud.vn';
if (isset($_GET['ad'])) {
	setcookie('BIO:show_ad',$_GET['ad']);
}