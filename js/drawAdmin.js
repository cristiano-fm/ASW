var step = 1;

var renderer = new THREE.WebGLRenderer({canvas: document.getElementById("landing-canvas"), antialias: true});
renderer.setClearColor(0xD8D8D8);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize( window.innerWidth, window.innerHeight );
document.getElementById("canvas-loc").appendChild( renderer.domElement );

var camera = new THREE.PerspectiveCamera( 30, window.innerWidth/window.innerHeight, 0.1, 3000 );
camera.position.z = 50;
camera.position.x = 25;

var scene = new THREE.Scene();

//resizing rendering while resizing page
window.addEventListener( 'resize', function () {
  var width =  window.innerWidth;
  var height = window.innerHeight;
  renderer.setSize( width, height );
  camera.aspect = width / height;
  camera.updateProjectionMatrix();
} );

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
translate(centerPlanet, -4, 0, 0);

var centerPlanet2 = newPlanet(10);
scene.add( centerPlanet2 );
translate(centerPlanet2, 54, 0, 0);

var moon = newPlanet(0.5);
scene.add( moon );
translate(moon, 10, 0, 10);

var moonsOrbitCenter = new THREE.Object3D();
moonsOrbitCenter.add(moon);
scene.add( moonsOrbitCenter );

var moonsOrbitTilt = new THREE.Object3D();
moonsOrbitTilt.add(moonsOrbitCenter);
scene.add( moonsOrbitTilt );
moonsOrbitTilt.rotation.y = 0.5;
moonsOrbitTilt.rotation.z = 0.8;

var secondPlanet = newPlanet(6);
scene.add( secondPlanet );
translate( secondPlanet, -2, 0, 0);

var secondMoon = newPlanet(2);
scene.add( secondMoon );
translate(secondMoon, 8, 0, 0);

var SecondOrbitCenter = new THREE.Object3D();
translate(SecondOrbitCenter, 76, -30, -100);
SecondOrbitCenter.add(secondPlanet);
SecondOrbitCenter.add(secondMoon);
scene.add( SecondOrbitCenter );
SecondOrbitCenter.rotation.x = 0.2;


var saturn = newPlanet(6);
scene.add( saturn );

var ringGeo = new THREE.RingGeometry( 8, 12, 60 );
var ringMat = new THREE.MeshNormalMaterial();
var ring = new THREE.Mesh( ringGeo, ringMat );
ring.material.side = THREE.DoubleSide;
scene.add( ring );
ring.rotation.x = 1.7;

var saturnCenter = new THREE.Object3D();
saturnCenter.add(saturn);
saturnCenter.add(ring);
scene.add( saturnCenter );
translate(saturnCenter, -43, -38, -133);



//---------------------illumination-----------------------//
var ambientLight = new THREE.AmbientLight( 0xFFFFFFF, 0.3);
scene.add( ambientLight );

var directLight = new THREE.PointLight( 0xFFFFFF, 1);
scene.add( directLight );

renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFShadowMap;


var update = function () {
  centerPlanet.rotation.y +=0.001;
  moonsOrbitCenter.rotation.y -= 0.01;
  secondPlanet.rotation.y +=0.001;
  secondMoon.rotation.y +=0.001;
  SecondOrbitCenter.rotation.y +=0.008;
  saturnCenter.rotation.y +=0.005;
  
}

var animate = function () {
	requestAnimationFrame( animate );

  update();
	renderer.render( scene, camera );
};

animate();
