/*********
 * OBSTACLE *
 *********/

var obstacleTimer;

var templates;
var obstaclesContainer;

var ObstaclesContainer;
var numberOfObstacles = 0;

var topObstacle;
var leftObstacle;
var rightObstacle;
var topRightObstacle;
var topLeftObstacle;

function setupObstacles() {
    topObstacle = document.getElementById('top-obstacle');
    leftObstacle = document.getElementById('left-obstacle');
    rightObstacle = document.getElementById('right-obstacle');
    topRightObstacle = document.getElementById('top-right-obstacle');
    topLeftObstacle = document.getElementById('top-left-obstacle');

    ObstaclesContainer = document.getElementById('obstacles-container');
    templates = [topObstacle, leftObstacle, rightObstacle, topRightObstacle, topLeftObstacle];

    removeObstacles(topObstacle)
    removeObstacles(leftObstacle)
    removeObstacles(rightObstacle)
    removeObstacles(topRightObstacle)
    removeObstacles(topLeftObstacle)
}

function teardownObstacles(){
    clearInterval(obstacleTimer);
}

function addObstaclesRandomlyLoop({intervalLength = 1000} = {}){
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
    probObstacleLeft = 0.5,
    probObstacleRight = 0.5,
    probObstacleTopLeft = 0.5,
    probObstacleTopRight = 0.5,
    maxNumberObstacles = 1,
} = {}) {
    var obstacles = [
        { probability: probObstacleTop, position_index: 0 },
        { probability: probObstacleLeft, position_index: 1 },
        { probability: probObstacleRight, position_index: 2 },
        { probability: probObstacleTopRight, position_index: 3 },
        { probability: probObstacleTopLeft, position_index: 4 },
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

/********
 * GAME *
 ********/

window.onload = function () {
    setupObstacles();
    addObstaclesRandomlyLoop();
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