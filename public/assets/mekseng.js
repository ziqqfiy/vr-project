/*********
 * OBSTACLE *
 *********/

var obstacleTimer;

var templates;
var obstaclesContainer;

var ObstaclesContainer;
var numberOfObstacles = 0;

var topObstacle;
var wideLeftObstacle;
var wideRightObstacle;
var middleObstacle;
var topRightObstacle;
var topLeftObstacle;
var topMiddleObstacle;

function setupObstacles() {
    topObstacle = document.getElementById('top-obstacle');
    wideLeftObstacle = document.getElementById('wide-left-obstacle');
    wideRightObstacle = document.getElementById('wide-right-obstacle');
    middleObstacle = document.getElementById('middle-obstacle');
    topRightObstacle = document.getElementById('top-right-obstacle');
    topLeftObstacle = document.getElementById('top-left-obstacle');
    topMiddleObstacle = document.getElementById('top-middle-obstacle');

    ObstaclesContainer = document.getElementById('obstacles-container');
    templates = [topObstacle, wideLeftObstacle, wideRightObstacle, middleObstacle, topRightObstacle, topLeftObstacle, topMiddleObstacle];

    removeObstacles(topObstacle)
    removeObstacles(wideLeftObstacle)
    removeObstacles(wideRightObstacle)
    removeObstacles(middleObstacle)
    removeObstacles(topRightObstacle)
    removeObstacles(topLeftObstacle)
    removeObstacles(topMiddleObstacle)
}

function teardownObstacles() {
    clearInterval(obstacleTimer);
}

function addObstaclesRandomlyLoop({ intervalLength = 600 } = {}) {
    obstacleTimer = setInterval(addObstaclesRandomly, intervalLength);
}

function removeObstacles(obstacle) {
    obstacle.parentNode.removeChild(obstacle);
}

function addObstacles(el) {
    numberOfObstacles += 1;
    el.id = 'obstacle-' + numberOfObstacles;
    ObstaclesContainer.appendChild(el);
}

function addObstacleTo(position_index) {
    var template = templates[position_index];
    addObstacles(template.cloneNode(true));
}

function addObstaclesRandomly({
    probObstacleTop = 0.5,
    probObstacleWideLeft = 0.5,
    probObstacleWideRight = 0.5,
    probObstacleMiddle = 0.5,
    probObstacleTopLeft = 0.5,
    probObstacleTopRight = 0.5,
    probObstacleTopMiddle = 0.5,
    maxNumberObstacles = 1,
} = {}) {
    var obstacles = [
        { probability: probObstacleTop, position_index: 0 },
        { probability: probObstacleWideLeft, position_index: 1 },
        { probability: probObstacleWideRight, position_index: 2 },
        { probability: probObstacleMiddle, position_index: 3 },
        { probability: probObstacleTopRight, position_index: 4 },
        { probability: probObstacleTopLeft, position_index: 5 },
        { probability: probObstacleTopMiddle, position_index: 6 },
    ]

    shuffle(obstacles);

    var numberOfObstaclesAdded = 0;
    obstacles.forEach(function (obstacle) {
        if (Math.random() < obstacle.probability && numberOfObstaclesAdded < maxNumberObstacles) {
            addObstacleTo(obstacle.position_index);
            numberOfObstaclesAdded += 1;
        }
    });

    return numberOfObstaclesAdded;
}

/**************
 * COLLISIONS *
 **************/

const POSITION_Z_OUT_OF_SIGHT = 1;
const POSITION_Z_LINE_START = 0.6;
const POSITION_Z_LINE_END = 0.7;

function setupCollisions() {
    AFRAME.registerComponent('player', {
        tick: function () {
            document.querySelectorAll('.obstacle').forEach(function (obstacle) {
                position = obstacle.getAttribute('position');
                obstacle_id = obstacle.getAttribute('id');

                if (position.z > POSITION_Z_OUT_OF_SIGHT) {
                    removeObstacles(obstacle);
                }

                if (!isGameRunning) return;
            })
        }
    })
}

/********
 * Gradient Sky *
 ********/

/********
 * GAME *
 ********/

var isGameRunning = false;

setupCollisions()

window.onload = function () {
    setupObstacles();
    startGame();
}

function startGame() {
    if (isGameRunning) return;
    isGameRunning = true;

    addObstaclesRandomlyLoop();
}

function gameOver() {
    isGameRunning = false;

    alert('Game Over!');
    teardownObstacles();
}

/*************
 * UTILITIES *
 *************/

function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}