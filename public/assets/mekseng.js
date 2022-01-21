/*********
 * Shader *
 *********/
AFRAME.registerShader('wallShader', {
    schema: {
        colorTertiary: { type: 'color', is: 'uniform', default: 'yellow' },
        environment: { type: 'map', is: 'uniform', default: 'assets/envmap.png' },
        hitLeft: { type: 'vec3', is: 'uniform', default: { x: 0, y: 9000, z: 20 } },
        hitRight: { type: 'vec3', is: 'uniform', default: { x: 0, y: 9000, z: 20 } },
        iTime: { type: 'time', is: 'uniform' },
        opacity: { type: 'number', is: 'uniform' },
    },

    vertexShader: [
        'varying vec2 uvs;',
        'varying vec3 nrml;',
        'varying vec3 worldPos;',

        'void main() {',
        'uvs.xy = uv.xy;',
        'nrml.xyz = normal.xyz;',
        'vec4 p = projectionMatrix * modelViewMatrix * vec4(position, 1.0);',
        'worldPos = (modelMatrix * vec4(position, 1.0)).xyz;',
        'gl_Position = p;',
        '}'
    ].join('\n'),

    fragmentShader: [
        'uniform float iTime;',
        'uniform float opacity;',
        'uniform sampler2D environment;',
        'uniform vec3 colorTertiary;',
        'uniform vec3 hitLeft;',
        'uniform vec3 hitRight;',
        'varying vec2 uvs;',
        'varying vec3 nrml;',
        'varying vec3 worldPos;',

        '#define SEED 19.1252',
        '#define time (3.0 + iTime) / 1000.0',

        'float noise(vec3 uv) {',
        'return fract(sin(uv.x*123243. + uv.y*424. + uv.z*642. + SEED) * 1524.);',
        '}',

        'vec4 drawHit(vec3 p, vec3 center, vec3 color) {',
        'center.z -= 0.1;',
        'float dist = 1.0 - smoothstep(0.0, 0.3, length(p - center));',
        'float glitch = noise(floor(p*3.0)) * 0.06 - 0.03;',
        'float alpha = 1.0 - smoothstep(0.0, 0.01, abs(p.z-center.z + glitch));',
        'alpha += 1.0 - smoothstep(0.0, 0.01, abs(p.y-center.y + glitch));',
        'return vec4(color * dist, alpha * dist + alpha);',
        '}',

        'void main() {',
        'vec2 uv1 = uvs.xy-0.5;',
        'float alpha = 0.0;',
        '// border',
        'alpha += smoothstep(0.44, 0.50, abs(uv1.x));',
        'alpha += smoothstep(0.44, 0.50, abs(uv1.y));',
        'alpha += smoothstep(0.486, 0.49, abs(uv1.x));',
        'alpha += smoothstep(0.486, 0.49, abs(uv1.y));',
        'alpha = min(1.0, alpha * 0.5);',

        // weapon collision
        'vec4 hit;',
        'hit = drawHit(worldPos, hitRight, colorTertiary);',
        'hit += drawHit(worldPos, hitLeft, colorTertiary);',

        // reflection
        'vec3 ray = reflect(normalize(cameraPosition - worldPos + sin(worldPos.z) * 0.1 + cos(worldPos.z * 0.3) * 0.3), nrml);',
        'float m = 2.0 * sqrt(pow(ray.x, 2.0) + pow(ray.y, 2.0) + pow(ray.z, 2.0));',
        'vec2 uv = ray.xy / m + 0.5;',
        'vec3 col = texture2D(environment, uv).rgb * 0.3;',

        'gl_FragColor = vec4(mix(col, colorTertiary, alpha) + hit.rgb, (alpha * 0.2 + 0.8) * opacity + hit.a);',
        '}'
    ].join('\n')
});

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
var wideLeftObstacle;
var wideRightObstacle;
var middleObstacle;
var topRightObstacle;
var topLeftObstacle;
var topMiddleObstacle;

function setupObstacles() {
    topObstacle = document.getElementById('top-obstacle');
    leftObstacle = document.getElementById('left-obstacle');
    rightObstacle = document.getElementById('right-obstacle');
    wideLeftObstacle = document.getElementById('wide-left-obstacle');
    wideRightObstacle = document.getElementById('wide-right-obstacle');
    middleObstacle = document.getElementById('middle-obstacle');
    topRightObstacle = document.getElementById('top-right-obstacle');
    topLeftObstacle = document.getElementById('top-left-obstacle');
    topMiddleObstacle = document.getElementById('top-middle-obstacle');

    ObstaclesContainer = document.getElementById('obstacles-container');
    templates = [topObstacle, leftObstacle, rightObstacle, wideLeftObstacle, wideRightObstacle, middleObstacle, topRightObstacle, topLeftObstacle, topMiddleObstacle];

    removeObstacles(topObstacle)
    removeObstacles(leftObstacle)
    removeObstacles(rightObstacle)
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

function addObstaclesRandomlyLoop({ intervalLength = 700 } = {}) {
    obstacleTimer = setInterval(addObstaclesRandomly, intervalLength);
}

function despawnObstaclesLoop({ intervalLength = 700 } = {}) {
    obstacleTimer = setInterval(despawnObstacles, intervalLength);
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
    probObstacleLeft = 1,
    probObstacleRight = 1,
    probObstacleWideLeft = 0,
    probObstacleWideRight = 0,
    probObstacleMiddle = 1,
    probObstacleTopLeft = 0.5,
    probObstacleTopRight = 0.5,
    probObstacleTopMiddle = 0.5,
    maxNumberObstacles = 1,
} = {}) {
    var obstacles = [
        { probability: probObstacleTop, position_index: 0 },
        { probability: probObstacleLeft, position_index: 1 },
        { probability: probObstacleRight, position_index: 2 },
        { probability: probObstacleWideLeft, position_index: 3 },
        { probability: probObstacleWideRight, position_index: 4 },
        { probability: probObstacleMiddle, position_index: 5 },
        { probability: probObstacleTopRight, position_index: 6 },
        { probability: probObstacleTopLeft, position_index: 7 },
        { probability: probObstacleTopMiddle, position_index: 8 },
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

AFRAME.registerComponent('obstacle-despawn', {
    tick: function () {
        document.querySelectorAll('.obstacle').forEach(function (obstacle) {
            position = obstacle.getAttribute('position');
            obstacle_id = obstacle.getAttribute('id');
            if (position.z > 20) {
                removeObstacles(obstacle);
            }

            if (position.z > 4) {
                addScore(obstacle_id);
                updateScoreDisplay();
            }
        })
    }
});

/**************
 * COLLISIONS *
 **************/

AFRAME.registerComponent('collider-check', {
    dependencies: ['raycaster'],

    init: function () {
        this.el.addEventListener('raycaster-intersection', function () {
            console.log('Player hit something!');
        });
    }
});

/*********
 * SCORE *
 *********/

var score;
var countedObstacle;
var scoreDisplay;

function setupScore() {
    score = 0;
    countedObstacle = new Set();
    scoreDisplay = document.getElementById('score');
}

function teardownScore() {
    scoreDisplay.setAttribute('text-geometry', 'value', '');
}

function addScore() {
    if (countedObstacle.has(obstacle_id)) return;
    score += 1;
    countedObstacle.add(obstacle_id);
}

function updateScoreDisplay() {
    let s = score.toString();
    scoreDisplay.setAttribute("text-geometry", "value", s);
}

/********
 * MENU *
 ********/

var menuStart;
var menuContainer;
var isGameRunning = false;
var startButton;

function hideEntity(el) {
    el.setAttribute('visible', false);
}

function showEntity(el) {
    el.setAttribute('visible', true);
}

function setupAllMenus() {
    menuStart = document.getElementById('start-menu');
    menuContainer = document.getElementById('menu-container');
    startButton = document.getElementById('start-button');

    startButton.addEventListener('click', startGame);

    showStartMenu();
}

function hideAllMenus() {
    hideEntity(menuContainer);
    startButton.classList.remove('clickable');
}

function showStartMenu() {
    showEntity(menuContainer);
    showEntity(menuStart);
    startButton.classList.add('clickable');
}

/********
 * End Game *
 ********/

/********
 * GAME *
 ********/

var isGameRunning = false;

window.onload = function () {
    setupAllMenus()
    setupScore();
    setupObstacles();
}

function gameOver() {
    isGameRunning = false;

    alert('Game Over!');
    teardownObstacles();
    teardownScore();
    showGameOverMenu();
}

function startGame() {
    if (isGameRunning) return;
    isGameRunning = true;
    setupScore();
    updateScoreDisplay();
    addObstaclesRandomlyLoop();
    hideAllMenus();
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