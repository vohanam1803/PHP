<script>
let board = null;
let game = new Xiangqi();

function writeTextFile(file) {
  $.ajax({
    type: "POST",
    url: '/triggers/update_FEN.php',
    data: {
      FEN_file: file,
      FEN_txt: game.fen()
    },
    dataType: 'text'
  });
}

function readTextFile(file) {
  var rawFile = new XMLHttpRequest();
  rawFile.open('GET', file, false);
  rawFile.onreadystatechange = function ()
  {
    if(rawFile.readyState === 4) {
      if(rawFile.status === 200 || rawFile.status == 0) {
        var allText = rawFile.responseText;
        board.position(allText, false);
      }
    }
  }
  rawFile.send(null);
}
function removeGreySquares () {
  $('#ban-co .square-2b8ce').removeClass('highlight');
}

function greySquare (square) {
  let $square = $('#ban-co .square-' + square);

  $square.addClass('highlight');
}

function onDragStart (source, piece) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false;

  // or if it's not that side's turn
  if ((game.turn() === 'r' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^r/) !== -1)) {
    return false;
  }
}

function onDrop (source, target) {
  removeGreySquares();

  // see if the move is legal
  let move = game.move({
    from: source,
    to: target
  });

  // illegal move
  if (move === null) return 'snapback';
}

function onMouseoverSquare (square, piece) {
  // get list of possible moves for this square
  let moves = game.moves({
    square: square,
    verbose: true
  });

  // exit if there are no moves available for this square
  if (moves.length === 0) return;

  // highlight the square they moused over
  greySquare(square);

  // highlight the possible squares for this piece
  for (let i = 0; i < moves.length; i++) {
    greySquare(moves[i].to);
  }
}

function onMouseoutSquare (square, piece) {
  removeGreySquares();
}

function onSnapEnd () {
  board.position(game.fen());
  $('#FEN').val(game.fen());
  writeTextFile('/FEN/sample.txt');
  document.getElementById('nuoc-co').play();
  if (game.turn() === 'r') {
    $('#game-status').removeClass('black').addClass('red').html('<i class="fal fa-chess-clock-alt"></i> Tới lượt ĐỎ');
  } else if (game.turn() === 'b') {
    $('#game-status').removeClass('red').addClass('black').html('<i class="fal fa-chess-clock"></i> Tới lượt ĐEN');
  }
  if (game.game_over()) {
    document.getElementById('het-tran').play();
    $('#game-over').removeClass('d-none').addClass('d-inline-block');
  }
}

let config = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onMouseoutSquare: onMouseoutSquare,
  onMouseoverSquare: onMouseoverSquare,
  onSnapEnd: onSnapEnd,
  //pieceTheme: '/static/img/xiangqipieces/traditional/{piece}.svg'
};
board = Xiangqiboard('ban-co', config);
if (game.turn() === 'r') {
  $('#game-status').removeClass('black').addClass('red').html('<i class="fal fa-chess-clock-alt"></i> Tới lượt ĐỎ');
} else if (game.turn() === 'b') {
  $('#game-status').removeClass('red').addClass('black').html('<i class="fal fa-chess-clock"></i> Tới lượt ĐEN');
}
function updateBoard() {
  readTextFile('/FEN/sample.txt');
}
//        setInterval(updateBoard, 240);
</script>