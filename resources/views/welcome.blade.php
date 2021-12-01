<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VR Test</title>

    <!-- Script -->
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-text-geometry-component@^0.5.0/dist/aframe-text-geometry-component.min.js"></script>

</head>

<body>
    <a-scene>
        <a-entity light="type: ambient; color: #BBB; castShadow: true"></a-entity>
        <a-entity light="type: directional; color: #FFF; intensity: 0.6 castShadow: true" position="-0.5 1 1"></a-entity>

        <!-- moVRin -->
        <a-assets>
            <a-asset-item id="montserrat" src="fonts\montserrat_black.typeface.json"></a-asset-item>
        </a-assets>

        <a-entity text-geometry="value: moVRin; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0.02; bevelThickness: 1" position="-15 25 -40" rotation="25 0 0" material="color: #EED7CE"></a-entity>

        <!-- Obstacles -->
        <a-entity position="0 0 -35" animation="property: position; to: 0 0 180; dur: 7000; easing: linear; loop: true">
            <!-- Top -->
            <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 -30" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Right -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="0.75 2.5 -50" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Left -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="-0.75 2.5 -70" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Right -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="0.75 2.5 -90" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Left -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="-0.75 2.5 -110" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>d

            <!-- Top -->
            <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 -130" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Top-Left -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="-0.75 2.5 -150" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>d
            <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 -150" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>

            <!-- Top-Right -->
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="0.75 2.5 -170" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>
            <a-box shadow="cast: true" height="3.7" width="8" depth="5" position="0 3.3 -170" color="#FFC4E1" material="opacity: 1; transparency: true"></a-box>
        </a-entity>

        <a-plane shadow="receive: true" position="0 0 -44" rotation="-90 0 0" width="3" depth="5" height="90" color="#F2DDC1"></a-plane>

        <a-sky color="#cbded4" radius="60"></a-sky>
    </a-scene>
</body>

</html>