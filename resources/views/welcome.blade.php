<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>moVRin</title>

    <!-- Script -->
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
    <script src="assets/mekseng.js"></script>
    <script src="https://unpkg.com/aframe-text-geometry-component@^0.5.0/dist/aframe-text-geometry-component.min.js"></script>
</head>

<body>
    <a-scene fog="type: linear; color: #665A8A; near:20; far:50">
        <!-- Lights -->
        <a-light type="directional" castShadow="true" intensity="0.45" color="white;" position="1 1 2"></a-light>
        <a-light intensity="0.8" type="ambient" color="white"></a-light>

        <!-- moVRin -->
        <a-assets>
            <a-asset-item id="montserrat" src="fonts/montserrat_black.typeface.json"></a-asset-item>
        </a-assets>

        <a-entity text-geometry="value: moVRin; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0.02; bevelThickness: 1" position="-15 20 -35" rotation="25 0 0" material="color: #A0CEEA"></a-entity>

        <!-- Obstacles -->
        <a-entity id="obstacles-container">
            <!-- Top -->
            <a-entity id="top-obstacle" position="0 3.3 0">
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 0 0 -70; to: 0 0 10; dur: 4000; easing: linear"></a-box>
            </a-entity>

            <!-- Right -->
            <a-entity id="right-obstacle" position="2 2.5 0">
                <a-box shadow="cast: true" height="5" width="4" depth="5" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 0 0 -70; to: 0 0 10; dur: 4000; easing: linear"></a-box>
            </a-entity>

            <!-- Left -->
            <a-entity id="left-obstacle" position="-2 2.5 0">
                <a-box shadow="cast: true" height="5" width="4" depth="5" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 0 0 -70; to: 0 0 10; dur: 4000; easing: linear"></a-box>
            </a-entity>

            <!-- Top-Left -->
            <a-entity id="top-left-obstacle">
                <a-box shadow="cast: true" height="5" width="4" depth="5" position="-2 2.5 0" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: -2 2.5 -70; to: -2 2.5 10; dur: 4000; easing: linear"></a-box>
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 0" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 0 3.3 -70; to: 0 3.3 10; dur: 4000; easing: linear"></a-box>
            </a-entity>

            <!-- Top-Right -->
            <a-entity id="top-right-obstacle">
                <a-box shadow="cast: true" height="5" width="4" depth="5" position="2 2.5 0" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 2 2.5 -70; to: 2 2.5 10; dur: 4000; easing: linear"></a-box>
                <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 0" color="#DE87A4" material="opacity: 1; transparency: true" animation="property: position; from: 0 3.3 -70; to: 0 3.3 10; dur: 4000; easing: linear"></a-box>
            </a-entity>
        </a-entity>

        <!-- Grass -->
        <a-box depth="150" width="150" height="1" color="#A3D1EE" position="0 -2 0"></a-box>

        <!-- PLatform -->
        <a-plane shadow="receive: true" position="0 0 -43" rotation="-90 0 0" width="3" depth="5" height="90" color="#FDCEBA" shadow position="0 -3.5 -1.5"></a-plane>

        <a-sky color="#665A8A" radius="60"></a-sky>
    </a-scene>
</body>

</html>