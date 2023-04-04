<?php
include template('script.common');
?>
<script src="<?php echo $cdn_url; ?>/static/js/xiangqiboard.js?v=7"></script>
<script src="<?php echo $cdn_url; ?>/static/js/xiangqi.js?v=1"></script>
<script>
$('#tao-phong').on('click', function() {
  $.ajax({
    type: "POST",
    url: '/triggers/update_FEN.php',
    data: {
      FEN_file: $('#tao-phong').attr('data-file'),
      FEN_txt: 'rnbakabnr/9/1c5c1/p1p1p1p1p/9/9/P1P1P1P1P/1C5C1/9/RNBAKABNR r - - 0 1'
    },
    dataType: 'text'
  });
});
$('#url').on('click', function() {
  copyToClipboard('#url');
  selectText('#url')
});
</script>