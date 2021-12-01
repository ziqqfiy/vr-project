<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VR Test</title>

    <!-- Script -->
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
    <script src="aframe-effects.js"></script>

</head>

<body>
    <a-scene>

        <a-entity light="type: ambient; color: #BBB; castShadow: true"></a-entity>
        <a-entity light="type: directional; color: #FFF; intensity: 0.6 castShadow: true" position="-0.5 1 1"></a-entity>

        <a-entity position="0 0 -10" animation="property: position; to: 0 0 140; dur: 7000; easing: linear; loop: true">
            <a-box shadow="cast: true" height="3" width="8" depth="5" position="0 3 -30" color="orange" material="opacity: 0.8; transparency: true"></a-box>
            
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="0.75 2.5 -50" color="orange" material="opacity: 0.8; transparency: true"></a-box>
            
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="-0.75 2.5 -70" color="orange" material="opacity: 0.8; transparency: true"></a-box>
            
            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="0.75 2.5 -90" color="orange" material="opacity: 0.8; transparency: true"></a-box>

            <a-box shadow="cast: true" height="5" width="1.5" depth="5" position="-0.75 2.5 -110" color="orange" material="opacity: 0.8; transparency: true"></a-box>d
           
            <a-box shadow="cast: true" height="3" width="8" depth="5" position="0 3 -130" color="orange" material="opacity: 0.8; transparency: true"></a-box>
        </a-entity>

        <a-plane shadow="receive: true" position="0 0 -44" rotation="-90 0 0" width="3" depth="5" height="90" color="white"></a-plane>
        <a-sky radius="50" color="#cbded4"></a-sky>
    </a-scene>
</body>

</html>