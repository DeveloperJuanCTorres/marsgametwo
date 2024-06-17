function freeCell(){
  var FREE = document.getElementsByClassName("Free")[0].innerHTML = "FREE";
  document.getElementById("cn3").style.backgroundColor = "#ffb617";
  }
  
  (function clickEvent (){
  //set click event
      
  document.getElementById("board").addEventListener('click',toggle);
   
  //function to colour in cell
  
  function toggle(){
  var color = event.srcElement.style.backgroundColor;
    
  color = (color == "rgb(175, 175, 175)") ? "#FFFFFF" : "#afafaf";
  
  event.srcElement.style.backgroundColor = color;
  
  freeCell()
  }
    
  newNumbers()
  })();
  
  
  function newNumbers() {
  
  //Generate Numbers
  
  var board = [];
  
    // generate 5 sets of five numbers in the appropriate group values
  for(var i = 0; i <=4; i++){
    var col = [];
    for(var s = 1; s <=5; s++ ){
      while(col.length < s){
    var rand = Math.floor(Math.random() * 15) +   (i * 15) + 1;
   
  if(col.indexOf(rand) < 0) col.push(rand);}}
  board.push(col);}
  
   // Fill with numbers
      var bingo = ["b","i","n","g","o"];
      for (i = 0; i <= 4; i++){
          for(s = 1; s <=5; s++ ){
            boxid = "c" + bingo[i] + s; 
              document.getElementById(boxid).innerText = board[i][s-1];
          }}
  
    
  /*  
  freeCell()
    */
   
  }
  
  freeCell()
  
  