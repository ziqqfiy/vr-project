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
            <a-mixin id="title" text="font:exo2bold; height:10; width:10; anchor:center; align:center;"></a-mixin>
        </a-assets>

        <!-- Cursor -->
        <a-entity id="mouseCursor" cursor="rayOrigin: mouse" raycaster="objects: #start-button; useWorldCoordinates: true"></a-entity>

        <!-- Oculus Touch -->
        <a-entity id="left-controller" laser-controls="hand: left" raycaster="objects: #start-button;"></a-entity>
        <a-entity id="right-controller" laser-controls="hand: right" raycaster="objects: #start-button;"></a-entity>

        <!-- Menus -->
        <a-entity id="menu-container">
            <a-entity id="start-menu" position="0 1.1 -3">
                <a-entity id="start-button" geometry="primitive: box; width: 2; height: 0.6; depth: 0.1" material="color: #A0CEEA" position="0 0.65 -0.05" animation__mouseenter="property: scale; startEvents: mouseenter; easing: easeOutCubic; dur: 150; from: 1 1 1; to: 1.2 1.2 1.2" animation__mouseleave="property: scale; startEvents: mouseleave; easing: easeOutCubic; dur: 500; from: 1.2 1.2 1.2; to: 1 1 1">
                    <a-text value="START" position="0 0.08 0.05" mixin="title"></a-text>
                </a-entity>
            </a-entity>
        </a-entity>

        <!-- Player -->
        <a-entity id="cameraRig" collider-check raycaster="objects: #start-button">
            <a-entity id="camera" bind__wasd-controls="enabled: !inVr" position="0 1.6 0" camera="far: 10000" look-controls player-height wasd-controls="acceleration: 15">
            </a-entity>
        </a-entity>

        <!-- Sound -->
        <a-entity id="sound" sound="src: #bgm; autoplay: true; loop: true; volume: 1"></a-entity>

        <!-- Lights -->
        <a-entity id="sunlight" light="type:directional; castShadow:true; intensity: 0.45; color: #fede86; distance: 50; shadowCameraBottom: -10; shadowCameraRight: 46; shadowCameraTop: 20; shadowCameraLeft: -20; shadowRadius: 5" position="3.755 4.082 5.158"></a-entity>
        <a-light id="ambient" intensity="0.8" type="ambient" color="white"></a-light>

        <!-- moVRin -->
        <a-entity id="title" text-geometry="value: moVRin; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0; bevelThickness: 1" position="-15 20 -35" rotation="25 0 0" material="fog: false; color: #A0CEEA"></a-entity>

        <!-- Score -->
        <a-entity id="score" shadow="cast: true; receive: true" text-geometry="value: 0; font: #montserrat; size: 5 height: 0.1; bevelEnabled: true; bevelSize: 0; bevelThickness: 1" position="6 -4.4 -20.5" rotation="0 -18 0" material="fog: false; color: #FDCEBA"></a-entity>

        <!-- Tree -->
        <a-entity id="trees-container">
            <a-entity id="left-trees-group">
                <a-entity id="tree" shadow="cast: true; receive: true" position="-4.588 -0.700 -65.213" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-8.507 -0.7 -58.654" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-5.363 -0.7 -52.531" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-7.437 -0.7 -46.778" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-4.874 -0.7 -41.261" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-6.670 -0.7 -34.806" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-4.141 -0.7 -29.387" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-7.411 -0.7 -24.295" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-14.092 -0.7 -21.100" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-20.319 -0.7 -15.164" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-12.382 -0.7 -28.780" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-20.456 -0.7 -21.262" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-18.112 -0.7 -31.711" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-12.709 -0.7 -37.613" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-14.092 -0.7 -45.122" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-18.951 -0.7 -38.267" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-25.527 -0.7 -34.291" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-23.170 -0.7 -27.600" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-27.837 -0.7 -17.997" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-27.727 -0.7 -10.214" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-20.814 -0.7 -9.950" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-13.533 -0.7 -8.818" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-11.082 -0.7 -2.579" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-5.442 -0.7 -0.036" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-28.064 -0.7 -23.994" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-17.638 -0.7 -3.508" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-23.757 -0.7 -4.113" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-10.894 -0.7 4.677" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-4.408 -0.7 6.166" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="-35.001 -0.7 -23.742" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
            </a-entity>
            <a-entity id="right-trees-group">
                <a-entity id="tree" shadow="cast: true; receive: true" position="4.588 -0.700 -65.213" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="8.507 -0.7 -58.654" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="5.363 -0.7 -52.531" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="7.437 -0.7 -46.778" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="4.874 -0.7 -41.261" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="6.670 -0.7 -34.806" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="4.141 -0.7 -29.387" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="7.411 -0.7 -24.295" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="14.092 -0.7 -21.100" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="20.319 -0.7 -15.164" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="12.382 -0.7 -28.780" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="20.456 -0.7 -21.262" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="18.112 -0.7 -31.711" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="12.709 -0.7 -37.613" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="14.092 -0.7 -45.122" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="18.951 -0.7 -38.267" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="25.527 -0.7 -34.291" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="23.170 -0.7 -27.600" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="27.837 -0.7 -17.997" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="27.727 -0.7 -10.214" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="20.814 -0.7 -9.950" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="13.533 -0.7 -8.818" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="11.082 -0.7 -2.579" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="5.442 -0.7 -0.036" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="28.064 -0.7 -23.994" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="17.638 -0.7 -3.508" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="23.757 -0.7 -4.113" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="10.894 -0.7 4.677" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="4.408 -0.7 6.166" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
                <a-entity id="tree" shadow="cast: true; receive: true" position="35.001 -0.7 -23.742" scale="2 2 2" obj-model="obj: #tree-obj; mtl: #tree-mtl"></a-entity>
            </a-entity>
        </a-entity>

        <!-- Obstacles -->
        <a-entity id="obstacles-container" obstacle-despawn>
            <!-- Top -->
            <a-entity class="obstacle" id="top-obstacle" position="0 2.1 0" animation="property: position; from: 0 2.1 -70; to: 0 2.1 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" material="shader: wallShader; colorTertiary: #8267BE; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.y; from: 5; to: 0; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Right -->
            <a-entity class="obstacle" id="right-obstacle" position="0.75 1.5 0" animation="property: position; from: 0.75 1.5 -70; to: 0.75 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: 5; to: 0; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Left -->
            <a-entity class="obstacle" id="left-obstacle" position="-0.75 1.5 0" animation="property: position; from: -0.75 1.5 -70; to: -0.75 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" material="shader: wallShader; colorTertiary: #637EDB; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: -5; to: 0; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Wide-Right -->
            <a-entity class="obstacle" id="wide-right-obstacle" position="0.5 1.5 0" animation="property: position; from: 0.5 1.5 -70; to: 0.5 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="2" depth="5" material="shader: wallShader; colorTertiary: #fede86; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: 5; to: 0; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Wide-Left -->
            <a-entity class="obstacle" id="wide-left-obstacle" position="-0.5 1.5 0" animation="property: position; from: -0.5 1.5 -70; to: -0.5 1.5 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="2" depth="5" material="shader: wallShader; colorTertiary: #637EDB; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: -5; to: 0; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Middle -->
            <a-entity class="obstacle" id="middle-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="1 1.5 0" material="shader: wallShader; colorTertiary: #F7F7F7; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: 5; to: 1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="-1 1.5 0" material="shader: wallShader; colorTertiary: #F7F7F7; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: -5; to: -1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Top-Left -->
            <a-entity class="obstacle" id="top-left-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" position="-0.75 1.5 0" material="shader: wallShader; colorTertiary: #3FA796; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: -5; to: -0.75; easing: easeInOutElastic; dur: 1500" render-order></a-box>
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #3FA796; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.y; from: 5; to: 2.1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Top-Right -->
            <a-entity class="obstacle" id="top-right-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="3" width="1.5" depth="5" position="0.75 1.5 0" material="shader: wallShader; colorTertiary: #F90716; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: 5; to: 0.75; easing: easeInOutElastic; dur: 1500" render-order></a-box>
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #F90716; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.y; from: 5; to: 2.1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>

            <!-- Top-Middle -->
            <a-entity class="obstacle" id="top-middle-obstacle" animation="property: position; from: 0 0 -70; to: 0 0 70; dur: 9000; easing: linear">
                <a-box shadow="cast: true" height="1.8" width="3" depth="5" position="0 2.1 0" material="shader: wallShader; colorTertiary: #FFAFAF; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.y; from: 5; to: 2.1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="1 1.5 0" material="shader: wallShader; colorTertiary: #FFAFAF; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: 5; to: 1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
                <a-box shadow="cast: true" height="3" width="1" depth="5" position="-1 1.5 0" material="shader: wallShader; colorTertiary: #FFAFAF; transparent: true; side: double; opacity: 1" animation__fadein="property: components.material.material.uniforms.opacity.value; from: 0; to: 1; easing: easeInCubic; dur: 1500" animation__scalein="property: object3D.position.x; from: -5; to: -1; easing: easeInOutElastic; dur: 1500" render-order></a-box>
            </a-entity>
        </a-entity>

        <!-- Floor -->
        <a-box id="floor" shadow="receive: true" depth="150" width="150" height="1" color="#A3D1EE" position="0 -5 0"></a-box>

        <!-- PLatform -->
        <a-box id="platform" shadow="cast: true" position="0 -0.3 0" width="3" depth="3" height="0.5" color="#FDCEBA"></a-box>

        <!-- Pathway -->
        <a-box id="pathway" shadow="cast: true" position="0 -0.3 -40" width="3" depth="60" height="0.5" color="#FDCEBA"></a-box>

        <!-- Sun -->
        <a-sphere id="sun" color="#fede86" position="9.283 10.557 14.033" scale="5 5 5" material="emissive: #fede86; emissiveIntensity: 1"></a-sphere>

        <!-- Sky -->
        <a-sky id="sky" color="#665A8A"></a-sky>
    </a-scene>
</body>

</html>