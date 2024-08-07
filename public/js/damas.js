


var draughtsInitial = [ // ' ' is an empty square, 'b' a black piece, 'w' a white piece; 'B' and 'W' are kings.
	[' ','b',' ','b',' ','b',' ','b'],
	['b',' ','b',' ','b',' ','b',' '],
	[' ','b',' ','b',' ','b',' ','b'],
	[' ',' ',' ',' ',' ',' ',' ',' '],
	[' ',' ',' ',' ',' ',' ',' ',' '],
	['w',' ','w',' ','w',' ','w',' '],
	[' ','w',' ','w',' ','w',' ','w'],
	['w',' ','w',' ','w',' ','w',' ']];
var draughts = [];
var player = 'B'; // current active player
var playMode = 2; // number of human players (1 or 2)
var aiColourMode = "random"; // "random", 'W', or 'B'. Colour of AI player.
var humans = {W: true, B: true}; // human or AI
var selected; // piece selected to be moved
var legalMoves = []; // array of all possible moves given the current board and player state.
var highlightOptions = true;



function setPlayMode(n,tableto,playercolor) {
	playMode = n;
	// button1player.className = "playModeButton";
	// button2player.className = "playModeButton";
	//document.getElementById("button"+n+"player").className += " selectedPlayMode";
	initialise(tableto,playercolor);
}

function tester(n,tableto,playercolor) {
	playMode = n;
	initialise(tableto,playercolor);
}

// function setColourMode(c) {
// 	aiColourMode = c;
// 	if (playMode == 1) initialise();
// }

function initialise(tableto,playercolor) {
	//player = 'B';
	player = playercolor;
	humans.W = true;
	humans.B = true;
	if (playMode == 1) { // game against AI
		if (aiColourMode == "random") {
			if (Math.random() < 0.5) humans.W = false;
			else humans.B = false;
		} else {
			humans[aiColourMode] = false;
		}
	}
	//draughts = draughtsInitial.map(r => r.slice()); // copy draughtsInitial to draughts
	draughts = tableto.map(r => r.slice()); 
	selected = false;
	legalMoves = findLegalMoves(draughts,player);
	renderBoard();
	// MCTS AI
	mcTree = {r: -1, c: -1, moveSequence: [], player: 'B', wins: 0, plays: 0, parent: null, children: []};
	mcState = draughts.map(r => r.slice()); // copy array
	if (!humans[player]) aiMove();
}

function renderBoard() {
	while (boardDiv.firstChild) boardDiv.removeChild(boardDiv.firstChild);
	draughts.forEach((row,r) => {
		var draughtsRow = document.createElement("div");
		boardDiv.appendChild(draughtsRow);
		draughtsRow.className = "draughtsRow";
		row.forEach((square,c) => {
			var draughtsSquare = document.createElement("div");
			draughtsRow.appendChild(draughtsSquare);
			draughtsSquare.className = "draughtsSquare";
			if (draughts[r][c].toUpperCase() == 'W' || draughts[r][c].toUpperCase() == 'B') {
				var draughtsPiece = document.createElement("div");
				draughtsSquare.appendChild(draughtsPiece);
				draughtsPiece.className = "draughtsPiece "+draughts[r][c];
				if (selected && selected.r == r && selected.c == c) draughtsPiece.className += " selected";
			}
			if (draughts[r][c] == 'W' || draughts[r][c] == 'B') draughtsPiece.textContent = '\u2654'; // king
			if (legalMoves.some(m => m.r == r && m.c == c)) {
				if (humans[player]) {
					draughtsSquare.onclick = function(){selectPiece(r,c);};
					if (highlightOptions) draughtsSquare.className += " clickable";
				} else if (highlightOptions) draughtsSquare.className += " aiOption";
			}
			if (selected &&
				legalMoves.some(m => 
					(m.r == selected.r && m.c == selected.c &&
					 m.moveSequence[0].r == r && m.moveSequence[0].c == c))) {
				if (humans[player]) {
					draughtsSquare.onclick = function(){placePiece(r,c);};
					if (highlightOptions) draughtsSquare.className += " clickable";
				} else if (highlightOptions) draughtsSquare.className += " aiOption";
			}
		});
	});
	if (humans.B && humans.W) infoDiv.innerHTML = "Es el turno de "+((player == 'W') ? "Blancas" : "Negras");
	else infoDiv.innerHTML = humans[player] ? "your move" : "AI thinking...";
	if (legalMoves.length === 0) infoDiv.innerHTML = ((player == 'W') ? "BLACK" : "WHITE")+" WINS";

}

function selectPiece(r,c) { // r = row, c = column
	if (selected && selected.r == r && selected.c == c) selected = false;
	else selected = {r: r, c: c};
	console.log('render 2');
	renderBoard();
}

function placePiece(r,c) { // r = row, c = column
	var move = legalMoves.find(m => 
		(m.r == selected.r && m.c == selected.c &&
		 m.moveSequence[0].r == r && m.moveSequence[0].c == c));
	
	draughts = updateState(draughts,selected.r,selected.c,r,c);
	
	if (move.moveSequence.length > 1) {
		legalMoves = legalMoves.filter(m =>
			(m.r == selected.r && m.c == selected.c &&
			 m.moveSequence[0].r == r && m.moveSequence[0].c == c)).map(m =>
			 ({r: m.moveSequence[0].r, c: m.moveSequence[0].c, moveSequence: m.moveSequence.slice(1)}));
		selected = {r:r,c:c};
	} else {
		selected = false;
		player = (player == 'W') ? 'B' : 'W';
		legalMoves = findLegalMoves(draughts,player);
	}

	renderBoard();
	if (!humans[player] && !selected && legalMoves.length > 0) aiMove();

	Livewire.dispatch('move', { move: draughts,color:player })

}

function updateState(board,pieceR,pieceC,destinationR,destinationC) { // p = player
	board = board.map(r => r.slice()); // copy array
	board[destinationR][destinationC] = board[pieceR][pieceC];
	if (board[pieceR][pieceC] == 'w' && destinationR == 0) board[destinationR][destinationC] = 'W';
	if (board[pieceR][pieceC] == 'b' && destinationR == 7) board[destinationR][destinationC] = 'B';
	board[pieceR][pieceC] = ' ';
	
	if (Math.abs(destinationR-pieceR) == 2) { // a piece has been captured
		board[(pieceR+destinationR)/2][(pieceC+destinationC)/2] = ' ';
	}
	
	return board;
}

function findLegalMoves(board,p) { // p = player
	console.log('movimiento ');

	var possibleCaptures = [];
	var possibleSteps = []; // non-capturing moves
	board.forEach((row,r) => {
		row.forEach((square,c) => {
			if (square.toUpperCase() == p) {
				var king = (square == 'W' || square == 'B');
				var captures = findPossibleCaptures(board,r,c,p,king);
				if (captures.length > 0 || possibleCaptures.length > 0)
					possibleCaptures = possibleCaptures.concat(captures.map(seq =>
						({r: r, c: c, moveSequence: seq})));
				else {
					var steps = findPossibleSteps(board,r,c,p);
					if (steps.length > 0)
						possibleSteps = possibleSteps.concat(steps.map(step =>
							({r: r, c: c, moveSequence: step})));
				}
			}
		});
	});

	if (possibleCaptures.length > 0){
		return possibleCaptures;
	} else { 
		return possibleSteps;
	}
}

function findPossibleCaptures(board,r,c,p,king) { // r = row, c = column, p = player
	var possibleCaptures = [];
	var dir = (p == 'B') ? 1 : -1;
	if (c >= 2 && r+2*dir >= 0 && r+2*dir < 8 && // take piece on the left
		board[r+dir][c-1] != ' ' && board[r+dir][c-1].toUpperCase() != p &&
		board[r+2*dir][c-2] == ' ') {
		var simulation = board.map(r => r.slice()); // copy array
		simulation[r+2*dir][c-2] = simulation[r][c];
		simulation[r+dir][c-1] = ' ';
		simulation[r][c] = ' ';
		var furtherCaptures = findPossibleCaptures(simulation,r+2*dir,c-2,p,king);
		if (furtherCaptures.length === 0) possibleCaptures.push([{r:r+2*dir,c:c-2}]);
		else possibleCaptures = possibleCaptures.concat(furtherCaptures.map(cap => [{r:r+2*dir,c:c-2}].concat(cap)));
	}
	if (c <= 5 && r+2*dir >= 0 && r+2*dir < 8 && // take piece on the right
		board[r+dir][c+1] != ' ' && board[r+dir][c+1].toUpperCase() != p &&
		board[r+2*dir][c+2] == ' ') {
		var simulation = board.map(r => r.slice()); // copy array
		simulation[r+2*dir][c+2] = simulation[r][c];
		simulation[r+dir][c+1] = ' ';
		simulation[r][c] = ' ';
		var furtherCaptures = findPossibleCaptures(simulation,r+2*dir,c+2,p,king);
		if (furtherCaptures.length === 0) possibleCaptures.push([{r:r+2*dir,c:c+2}]);
		else possibleCaptures = possibleCaptures.concat(furtherCaptures.map(cap => [{r:r+2*dir,c:c+2}].concat(cap)));
	}
	
	// kings can also capture backwards
	if (king) {
		dir *= -1;
		if (c >= 2 && r+2*dir >= 0 && r+2*dir < 8 && // take piece on the left
			board[r+dir][c-1] != ' ' && board[r+dir][c-1].toUpperCase() != p &&
			board[r+2*dir][c-2] == ' ') {
			var simulation = board.map(r => r.slice()); // copy array
			simulation[r+2*dir][c-2] = simulation[r][c];
			simulation[r+dir][c-1] = ' ';
			simulation[r][c] = ' ';
			var furtherCaptures = findPossibleCaptures(simulation,r+2*dir,c-2,p,king);
			if (furtherCaptures.length === 0) possibleCaptures.push([{r:r+2*dir,c:c-2}]);
			else possibleCaptures = possibleCaptures.concat(furtherCaptures.map(cap => [{r:r+2*dir,c:c-2}].concat(cap)));
		}
		if (c <= 5 && r+2*dir >= 0 && r+2*dir < 8 && // take piece on the right
			board[r+dir][c+1] != ' ' && board[r+dir][c+1].toUpperCase() != p &&
			board[r+2*dir][c+2] == ' ') {
			var simulation = board.map(r => r.slice()); // copy array
			simulation[r+2*dir][c+2] = simulation[r][c];
			simulation[r+dir][c+1] = ' ';
			simulation[r][c] = ' ';
			var furtherCaptures = findPossibleCaptures(simulation,r+2*dir,c+2,p,king);
			if (furtherCaptures.length === 0) possibleCaptures.push([{r:r+2*dir,c:c+2}]);
			else possibleCaptures = possibleCaptures.concat(furtherCaptures.map(cap => [{r:r+2*dir,c:c+2}].concat(cap)));
		}
	}
	
	return possibleCaptures;
}

function findPossibleSteps(board,r,c,p) { // r = row, c = column, p = player
	var steps = [];
	var dir = (p == 'B') ? 1 : -1;
	if (c >= 1 && r+dir >= 0 && r+dir < 8 &&
		board[r+dir][c-1] == ' ') steps.push([{r:r+dir,c:c-1}]);
	if (c <= 6 && r+dir >= 0 && r+dir < 8 &&
		board[r+dir][c+1] == ' ') steps.push([{r:r+dir,c:c+1}]);
	
	// kings can also step backwards
	if (board[r][c] == 'W' || board[r][c] == 'B') {
		dir *= -1;
		if (c >= 1 && r+dir >= 0 && r+dir < 8 &&
			board[r+dir][c-1] == ' ') steps.push([{r:r+dir,c:c-1}]);
		if (c <= 6 && r+dir >= 0 && r+dir < 8 &&
			board[r+dir][c+1] == ' ') steps.push([{r:r+dir,c:c+1}]);
	}
	
	return steps;
}

function toggleHighlight() {
	highlightOptions = !highlightOptions;
	console.log('salto ficha');
	renderBoard();
}


// setPlayMode(2);