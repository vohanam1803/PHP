<script>
let board = null;
let game = new Xiangqi();

function removeGreySquares () {
  $('#ban-co .square-2b8ce').removeClass('highlight');
}

function greySquare (square) {
  let $square = $('#ban-co .square-' + square);

  $square.addClass('highlight');
}

function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false;

  // only pick up pieces for Red
  if (piece.search(/^b/) !== -1) return false;
}

function makeRandomMove () {
  let possibleMoves = game.moves();

  // game over
  if (possibleMoves.length === 0) return;

  let randomIdx = Math.floor(Math.random() * possibleMoves.length);
  game.move(possibleMoves[randomIdx]);
  board.position(game.fen());
  if (game.turn() === 'r') {
    $('#game-status').removeClass('black').addClass('red').html('<i class="fal fa-chess-clock-alt"></i> Tới lượt ĐỎ');
  } else if (game.turn() === 'b') {
    $('#game-status').removeClass('red').addClass('black').html('<i class="fal fa-chess-clock"></i> Tới lượt ĐEN');
  }
}

function onDrop (source, target) {
  // see if the move is legal
  let move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });

  // illegal move
  if (move === null) return 'snapback';

  // make random legal move for black
  window.setTimeout(makeRandomMove, 250);
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
// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
  board.position(game.fen());
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
$(document).ready(function() {
  $('#FEN').val(game.fen());
});
</script>