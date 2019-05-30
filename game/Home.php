
<?php
session_start();
include('../openconn.php');

if(!isset($_SESSION['username'])) {
	header('Location: ../Landing.php');
}

$queryGameValues = "SELECT * FROM `game` WHERE `id`= ".$_SESSION['game_id'];
$resultGameValues = mysqli_query($conn, $queryGameValues);

while($rowGameValues = mysqli_fetch_assoc($resultGameValues)) {
    $_SESSION['population'] = $rowGameValues['population'];
    $_SESSION['happiness'] = $rowGameValues['happiness'];
    $_SESSION['money'] = $rowGameValues['money'];
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Frontiers</title>
    <link rel="icon" type="image/png" href="../media/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/game.css">
</head>
<body>
    <div id="load-block"></div>

    <section id="canvas-loc">
        <canvas id="landing-canvas"></canvas>
    </section>

    <section id="top-control">
        <a href="../logOut.php">
        <img class="top-icon" id="icon-top-1" src="../media/logout.png">
        </a>
        <h2 id="world-name"><?php echo ucfirst($_SESSION['username'])?>'s World</h2>
        <img class="top-icon" id="icon-top-2" src="../media/sound_off.png">
    </section>

    <section id="control-panel">
        <div id="left-controls">
            <span id="coll-bt">COLLECTIONS</span>
            <span class="dark-bt" id="cards-bt">CARDS</span>
        </div>
        <div id="center-controls">
            <div id="status">
                <p>cims</p>
                <p>happiness</p>
                <p>coins</p>
            </div>
            <div id="icons">
                <img class="icon" src="../media/population_control.png">
                <img class="icon" src="../media/happiness_control.png">
                <img class="icon" src="../media/stars_control.png">
            </div>
            <div id="values">
                <p id="population-status"><?php echo number_format(floatval($_SESSION['population']), 0, '.', ' ')?></p>
                <p id="happiness-status"><?php if(intval($_SESSION['happiness']) > 100){echo "100%";} else {echo $_SESSION['happiness']."%";}?></p>
                <p id="money-status"><?php echo number_format(floatval($_SESSION['money']), 0, '.', ' ')?></p>
            </div>
        </div>
        <div id="right-controls">
            <span class="dark-bt" id="store-bt">STORE</span>
            <span id="chat-bt">&nbsp CHAT ROOM &nbsp</span>
        </div>
    </section>

    <div id="window-block"></div>
    <!----------------------CARDS-IN-PLANET------------------------->
    <section class="window" id="cards-in-planet">
        <div class="top-bar">
            <h1>CARDS <strong>in your planet</strong></h1>
            <img class="skip" src="../media/close2.png">
        </div>
        <section class="interior" id="cards-go-here">
            <h2>HABITATION</h2>
            <!--AJAX fetched cards-->
        </section>
    </section>

    <!-----------------------COLLECTIONS---------------------------->
    <section class="window" id="collections">
        <div class="top-bar">
            <h1>COLLECTIONS</h1>
            <img class="skip" src="../media/close2.png">
        </div>
        <section class="interior" id="colls-go-here">
            <!--AJAX fetched colls-->
        </section>
    </section>

    <!--------------ONE COLLECTION FROM COLLECTIONS---------------->
    <section class="window" id="one-collection">
        <!--AJAX fetched coll -->
        </section>
    </section>

    <!---------------------------STORE----------------------------->
    <section class="window" id="store">
            <div class="top-bar">
                <h1>STORE</h1>
                <img class="skip" src="../media/close2.png">
            </div>
            <section class="interior" id="colls-to-store">
                <!--AJAX fetched colls-->
            </section>
        </section>

        <!-----------------STORE IN A COLLECTION------------------->
        <section class="window" id="coll-store">
            <!--AJAX fetched coll-->
        </section>
    </section>

    <!--------------------------CHAT-ROOM-------------------------->
    <section class="window" id="chat-room">
        <div class="top-bar">
            <h1>CHAT ROOM</h1>
            <img class="skip" src="../media/close2.png">
        </div>
        <section class="interior" id="chat-interior">
            <!--AJAX fetched chat-->
        </section>
        <div id="msg-form">
            <input type="text" name="msg" id="msg-to-send">
            <span class="dark-bt" id="send-msg">SEND</span>
        </div>
    </section>

    <audio id="bg-music" loop>
        <source src="../media/sound_track.mp3" type="audio/mpeg">
    </audio>
    <script src="../js/main.js"></script>
    <script src="../js/three.js"></script>
    <script src="../js/GLTFLoader.js"></script>
    <script src="../js/OrbitControls.js"></script>

    <script type="text/javascript">
    var objs= <?php
        // LISTA DE OBJS PARA SESSION
        $queryCards = "SELECT * FROM `game_cards` WHERE `game_id`= ".$_SESSION['game_id'];
        $resultCards = mysqli_query($conn, $queryCards);
        $_SESSION['cards'] = array();
        while($rowCards = mysqli_fetch_assoc($resultCards)) {
            for ($k = 0 ; $k < $rowCards['quantity']; $k++){
                $queryCard = "SELECT `object` FROM `card` WHERE `name`= '".$rowCards['name']."'";
                $resultCard = mysqli_query($conn, $queryCard);
                while($rowCard = mysqli_fetch_assoc($resultCard)) {
                    $_SESSION['cards'][] = "'".$rowCard['object']."'";
                };
            };
        };

        $str = implode(", ", $_SESSION['cards']);

        echo  "[ ".$str."]"; ?>;
    </script>

    <script>
        window.onbeforeunload = function() {
           return "are you sure you want to logout?";
        }

        var renderer = new THREE.WebGLRenderer({canvas: document.getElementById("landing-canvas"), antialias: true});
        renderer.setClearColor(0x434157);
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize( window.innerWidth, window.innerHeight );
        document.getElementById("canvas-loc").appendChild( renderer.domElement );

        var camera = new THREE.PerspectiveCamera( 10, window.innerWidth/window.innerHeight, 0.1, 3000 );
        camera.position.z = 220;

        var scene = new THREE.Scene();

        //resizing rendering while resizing page
        window.addEventListener( 'resize', function () {
        var width =  window.innerWidth;
        var height = window.innerHeight;
        renderer.setSize( width, height );
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        } );


        // controls
        controls = new THREE.OrbitControls( camera, renderer.domElement );
        controls.enableDamping = true; // an animation loop is required when either damping or auto-rotation are enabled
        controls.dampingFactor = 0.25;
        controls.screenSpacePanning = false;
        controls.minDistance = 20;
        controls.maxDistance = 500;
        //controls.maxPolarAngle = Math.PI;
        controls.enablePan = false;
        controls.rotateSpeed = 0.3;

        //color scheme
        var white = 0xFFFFFF;
        var tone1 = 0x0D3849;
        var tone2 = 0x1E667C;
        var tone3 = 0x4A9694;
        var tone4 = 0xA17E94;
        var tone5 = 0xF48979;

        //------------------planets---------------------//
        var newPlanet = function( radius ){
        var geo = new THREE.SphereGeometry( radius, 60, 60 );
        var mtr = new THREE.MeshNormalMaterial();
        var planet = new THREE.Mesh( geo, mtr );
        return planet;
        }

        var translate = function( obj, trsX, trsY, trsZ ){
        obj.position.x = trsX;
        obj.position.y = trsY;
        obj.position.z = trsZ;
        }

        var centerPlanet = newPlanet(10);
        scene.add( centerPlanet );

        var moon = newPlanet(0.5);
        scene.add( moon );
        translate(moon, 20, 0, 20);

        var moonsOrbitCenter = new THREE.Object3D();
        moonsOrbitCenter.add(moon);
        scene.add( moonsOrbitCenter );

        var moonsOrbitTilt = new THREE.Object3D();
        moonsOrbitTilt.add(moonsOrbitCenter);
        scene.add( moonsOrbitTilt );

        moonsOrbitTilt.rotation.y = 0.5;
        moonsOrbitTilt.rotation.z = 0.8;

        //-----------------------BUILDINGS------------------------//
        function getRandom(){
            return Math.random() * Math.PI * 2
        }

        //var objs=['skyscraper.glb', 'tiny_house.glb']
        objs.forEach(loadObj);

        function loadObj(obj) {
            var loader = new THREE.GLTFLoader();
            loader.load('../buildings/' + obj, handle_load);
        }

        var idk = [];
        var pivots = [];

        function handle_load(gltf){
        idk.push(gltf.scene.children[0]);

        var lastObj = idk[idk.length-1];
        scene.add(lastObj);
        lastObj.material = new THREE.MeshNormalMaterial();
        translate(lastObj, 0, 10, 0);
        
        var lastPivot = pivots[pivots.length-1];
        pivots.push(new THREE.Object3D());
        lastPivot.add(lastObj);
        scene.add(lastPivot);
        lastPivot.rotation.y = getRandom();
        lastPivot.rotation.z = getRandom();
        lastPivot.rotation.x = getRandom();
        }

        //---------------------illumination-----------------------//
        var ambientLight = new THREE.AmbientLight( 0xFFFFFFF, 0.3);
        scene.add( ambientLight );

        var directLight = new THREE.PointLight( 0xFFFFFF, 1);
        scene.add( directLight );

        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFShadowMap;

        var update = function () {
        centerPlanet.rotation.y +=0.0001;
        moonsOrbitCenter.rotation.y -= 0.003;
        }

        var animate = function () {
            requestAnimationFrame( animate );

        update();
            renderer.render( scene, camera );
        };

        animate();       
    </script>
</body>
</html>
