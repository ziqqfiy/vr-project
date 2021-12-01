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
        <!-- Oculus Touch -->
        <a-entity oculus-touch-controls="hand: left"></a-entity>
        <a-entity oculus-touch-controls="hand: right"></a-entity>

        <!-- Lights -->
        <a-entity light="type:directional; castShadow:true; intensity: 0.45; color: #fede86; distance: 50; shadowCameraRight: 20; shadowCameraTop: 20; shadowRadius: 5" position="3.755 4.082 5.158"></a-entity>
        <a-light intensity="0.8" type="ambient" color="white"></a-light>

        <!-- Sound -->
        <a-sound src="url(assets/bg_music.mp3)" autoplay="true" loop="true" volume="1"></a-sound>

        <!-- moVRin -->
        <a-assets>
            <a-asset-item id="montserrat" src="fonts/montserrat_black.typeface.json"></a-asset-item>
        </a-assets>
        <a-entity text-geometry="value: moVRin; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0; bevelThickness: 1" position="-15 20 -35" rotation="25 0 0" material="fog: false; color: #A0CEEA"></a-entity>

        <!-- Obstacles -->
        <a-entity id="obstacles-container">
            <!-- Top -->
            <a-entity id="top-obstacle" position="0 3.3 0">
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" color="#DE87A4" material="opacity: 1" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 6000; easing: linear"></a-box>
            </a-entity>

            <!-- Right -->
            <a-entity id="right-obstacle" position="2 2.5 0">
                <a-box shadow="cast: true" height="5" width="4" depth="5" color="#DE87A4" material="opacity: 1" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 6000; easing: linear"></a-box>
            </a-entity>

            <!-- Left -->
            <a-entity id="left-obstacle" position="-2 2.5 0">
                <a-box shadow="cast: true" height="5" width="4" depth="5" color="#DE87A4" material="opacity: 1" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 6000; easing: linear"></a-box>
            </a-entity>

            <!-- Top-Left -->
            <a-entity id="top-left-obstacle">
                <a-box shadow="cast: true" height="5" width="4" depth="5" position="-2 2.5 0" color="#DE87A4" material="opacity: 1" animation="property: position; from: -2 2.5 -70; to: -2 2.5 70; dur: 6000; easing: linear"></a-box>
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 0" color="#DE87A4" material="opacity: 1" animation="property: position; from: 0 3.3 -70; to: 0 3.3 70; dur: 6000; easing: linear"></a-box>
            </a-entity>

            <!-- Top-Right -->
            <a-entity id="top-right-obstacle">
                <a-box shadow="cast: true" height="5" width="4" depth="5" position="2 2.5 0" color="#DE87A4" material="opacity: 1" animation="property: position; from: 2 2.5 -70; to: 2 2.5 70; dur: 6000; easing: linear"></a-box>
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 0" color="#DE87A4" material="opacity: 1" animation="property: position; from: 0 3.3 -70; to: 0 3.3 70; dur: 6000; easing: linear"></a-box>
            </a-entity>
        </a-entity>

        <!-- Floor -->
        <a-box shadow="receive: true" depth="150" width="150" height="1" color="#A3D1EE" position="0 -5 0"></a-box>

        <!-- PLatform -->
        <a-box shadow="cast: true" position="0 -0.3 -43" width="5" depth="90" height="0.5" color="#FDCEBA"></a-box>

        <a-sky color="#665A8A" radius="60"></a-sky>
    </a-scene>
</body>

</html>