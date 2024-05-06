

let elmBingoGrid = document.getElementById("bingo-grid");

let numsLeft = [];
let bingoClassSuffix = ["singles", "teens", "twenties", "thirties", "fourties"];
let elmCurrentContainer = document.getElementById("current");
let elmHistoryContainer = document.getElementById("history");
let started = false;
let calls = {
  1: "Kelly’s Eye",
  2: "One Little Duck",
  3: "Cup of Tea",
  4: "Knock at the Door",
  5: "Man Alive",
  6: "Tom Mix",
  7: "Lucky 7",
  8: "Garden Gate",
  9: "Doctor’s Orders",
  10: "Theresa’s Den",
  11: "Legs Eleven",
  12: "One Dozen",
  13: "Unlucky for Some",
  14: "Valentine’s Day",
  15: "Young and Keen",
  16: "Sweet 16",
  17: "Dancing Queen",
  18: "Coming of Age",
  19: "Goodbye Teens",
  20: "One Score",
  21: "Key of the Door",
  22: "Two Little Ducks",
  23: "Thee and Me",
  24: "Two Dozen",
  25: "Duck and Dive",
  26: "Pick N Mix",
  27: "Gateway to Heaven",
  28: "Overweight",
  29: "Rise and Shine",
  30: "Dirty Gertie",
  31: "Get up and Run",
  32: "Buckle my Shoe",
  33: "Dirty Knee",
  34: "Ask for More",
  35: "Jump and Jive",
  36: "Three Dozen",
  37: "More than Eleven",
  38: "Christmas Cake",
  39: "Steps",
  40: "Naughty 40",
  41: "Time for Fun",
  42: "Winnie the Pooh",
  43: "Down on your Knees",
  44: "Droopy Drawers",
  45: "Halfway There",
  46: "Up to Tricks",
  47: "Four and Seven",
  48: "Four Dozen",
  49: "PC",
  50: "Half a Century"
};

function initNums() {
  for (let i = 1; i <= 50; i++) {
    numsLeft.push(i);
  }
  for (let i = numsLeft.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [numsLeft[i], numsLeft[j]] = [numsLeft[j], numsLeft[i]];
  }
}

function getBallClass(num) {
  return `bingo-ball--${bingoClassSuffix[Math.min(Math.floor(num / 10), 4)]}`;
}

function getClassesToClear() {
  return bingoClassSuffix.map((s) => `bingo-ball--${s}`);
}

function setCall(num) {
  elmCurrentContainer.getElementsByClassName(
    "current__display"
  )[0].innerText = `${calls[num]} : `;
}

function drawNumber() {
  if (numsLeft.length > 0) {
    let drawnNumber = numsLeft.pop();
    setCall(drawnNumber);
    let currentBall = elmCurrentContainer.getElementsByClassName(
      "bingo-ball"
    )[0];

    if (started) {
      let historyBall = currentBall.cloneNode(true);
      historyBall.classList.remove("current__bingo-ball");
      elmHistoryContainer.prepend(historyBall);
      started = true;
    }
    if (!started) {
      elmCurrentContainer.classList.remove("hidden");
      started = true;
    }
    currentBall.classList.remove(...getClassesToClear());
    currentBall.classList.remove("bingo-ball");
    currentBall.classList.add(getBallClass(drawnNumber));
    currentBall.getElementsByClassName("bingo-ball__text")[0].innerText =
      drawnNumber > 9 ? drawnNumber : `0${drawnNumber}`;
    setTimeout(() => {
      currentBall.classList.add("bingo-ball");
    }, 0);
  }
}

function generateNums(n) {
  let nums = [];
  for (let i = n; i <= n + 9; i++) {
    nums.push(i);
  }
  for (let i = nums.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [nums[i], nums[j]] = [nums[j], nums[i]];
  }
  return nums.slice(0, 5).sort((a, b) => a - b);
}

function addBall(num, className, row) {
  var ballContainer = document.createElement("div");
  ballContainer.classList.add("bingo-ball__container");
  ballContainer.setAttribute("style", `grid-row:${row}`);
  var ball = document.createElement("div");
  ball.classList.add(`bingo-ball`);
  ball.classList.add(`bingo-ball--${className}`);
  ball.addEventListener("click", () => {
    ball.classList.toggle("bingo-ball--selected");
  });

  var text = document.createElement("h3");
  text.innerText = num < 10 ? `0${num}` : num;
  text.classList.add(`bingo-ball__text`);

  ball.append(text);
  ballContainer.append(ball);
  elmBingoGrid.append(ballContainer);
}

let gridNums = [
  generateNums(1),
  generateNums(11),
  generateNums(21),
  generateNums(31),
  generateNums(41)
];

gridNums.forEach((col, i) => {
  let className = bingoClassSuffix[i];
  col.forEach((num, row) => {
    addBall(num, className, row + 1);
  });
});

initNums();

