<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>moVRin</title>

    <!-- Script -->
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="assets/mekseng.js"></script>
    <script src="https://unpkg.com/aframe-text-geometry-component@^0.5.0/dist/aframe-text-geometry-component.min.js"></script>
</head>

<body>
    <a-scene fog="type: linear; color: #665A8A; near:5; far:50">
        <!-- Asset Management System -->
        <a-assets>
            <a-asset-item id="montserrat" src="fonts/montserrat_black.typeface.json"></a-asset-item>
            <audio id="bgm" src="assets/bg_music.mp3"></audio>
            <a-asset-item id="tree-obj" src="assets/lowpolytree.obj"></a-asset-item>
            <a-asset-item id="tree-mtl" src="assets/lowpolytree.mtl"></a-asset-item>
        </a-assets>

        <!-- Player -->
        <a-entity id="cameraRig" cameraRig>
            <a-entity id="camera" bind__wasd-controls="enabled: !inVr" position="0 1.6 0" camera="far: 10000" look-controls player-height wasd-controls="acceleration: 15"></a-entity>
            <a-entity id="cameraWallCollider" bind__raycaster__wall="enabled: isPlaying && gameMode !== 'ride'" proxy-event__wallhitstart="event: raycaster-intersection; to: a-scene; as: wallhitstart" proxy-event__wallhitend="event: raycaster-intersection-cleared; to: a-scene; as: wallhitend" follow-position="target: #camera" raycaster__wall="objects: [data-wall-active]; interval: 150; direction: 0 -1 0; far: 5" visible="false"></a-entity>
        </a-entity>

        <!-- Oculus Touch -->
        <a-entity id="left-controller" oculus-touch-controls="hand: left; controllerType: oculus-touch-v3"></a-entity>
        <a-entity id="right-controller" oculus-touch-controls="hand: right; controllerType: oculus-touch-v3"></a-entity>

        <!-- Lights -->
        <a-entity id="sunlight" light="type:directional; castShadow:true; intensity: 0.45; color: #fede86; distance: 50; shadowCameraRight: 20; shadowCameraTop: 20; shadowCameraLeft: -20; shadowRadius: 5" position="3.755 4.082 5.158"></a-entity>
        <a-light id="ambient" intensity="0.8" type="ambient" color="white"></a-light>

        <!-- Sound -->
        <a-entity id="sound" sound="src: #bgm; autoplay: true; loop: true; volume: 1"></a-entity>

        <!-- moVRin -->
        <a-entity id="title" text-geometry="value: moVRin; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0; bevelThickness: 1" position="-15 20 -35" rotation="25 0 0" material="fog: false; color: #A0CEEA"></a-entity>
       
        <!-- Score -->
        <a-entity id="score" shadow="cast: true; receive: true" text-geometry="value: ; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0; bevelThickness: 1" position="6 -4.5 -20.5" rotation="0 -18 0" material="fog: false; color: #FDCEBA"></a-entity>
       
        <!-- Tree -->
        <a-entity id="tree" shadow="cast: true; receive: true" position="-3 -2.6 0" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
        <a-entity id="tree" shadow="cast: true; receive: true" position="3 -2.6 0" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
        
        <!-- Obstacles -->
        <a-entity id="obstacles-container" obstacle-despawn>
            <!-- Top -->
            <a-entity class="obstacle" id="top-obstacle" position="0 2.1 0" animation="property: position; from: 0 2.1 -70; to: 0 2.1 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1" render-order></a-box>
            </a-entity>

            <!-- Right -->
            <a-entity class="obstacle" id="right-obstacle" position="0.75 1.5 0" animation="property: position; from: 0.75 1.5 -70; to: 0.75 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Left -->
            <a-entity class="obstacle" id="left-obstacle" position="-0.75 1.5 0" animation="property: position; from: -0.75 1.5 -70; to: -0.75 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Wide-Right -->
            <a-entity class="obstacle" id="wide-right-obstacle" position="0.5 1.5 0" animation="property: position; from: 0.5 1.5 -70; to: 0.5 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="2" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Wide-Left -->
            <a-entity class="obstacle" id="wide-left-obstacle" position="-0.5 1.5 0" animation="property: position; from: -0.5 1.5 -70; to: -0.5 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="2" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Middle -->
            <a-entity class="obstacle" id="middle-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="1 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="-1 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Top-Left -->
            <a-entity class="obstacle" id="top-left-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" position="-0.75 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Top-Right -->
            <a-entity class="obstacle" id="top-right-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" position="0.75 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>

            <!-- Top-Middle -->
            <a-entity class="obstacle" id="top-middle-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="1 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="-1 1.5 0" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1"></a-box>
            </a-entity>
        </a-entity>

        <!-- Floor -->
        <a-box id="floor" shadow="receive: true" depth="150" width="150" height="1" color="#A3D1EE" position="0 -5 0"></a-box>

        <!-- Sun -->
        <a-sphere id="sun" color="#fede86" position="9.283 10.557 14.033" scale="5 5 5" material="emissive: #fede86; emissiveIntensity: 1"></a-sphere>

        <!-- PLatform -->
        <a-box id="platform" shadow="cast: true" position="0 -0.3 0" width="3" depth="3" height="0.5" color="#FDCEBA"></a-box>

        <!-- Pathway -->
        <a-box id="pathway" shadow="cast: true" position="0 -0.3 -40" width="3" depth="60" height="0.5" color="#FDCEBA"></a-box>

        <!-- Sky -->
        <a-sky id="sky" color="#665A8A"></a-sky>
    </a-scene>
</body>

</html>