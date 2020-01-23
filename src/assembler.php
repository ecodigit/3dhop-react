<?php

include 'gatherer.php'; 


$html=
'<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta content="charset=UTF-8"/>
<title>3DHOP - 3D Heritage Online Presenter</title>
<!--STYLESHEET-->
<link type="text/css" rel="stylesheet" href="3DHOP/minimal/stylesheet/3dhop.css"/>
<!--SPIDERGL-->
<script type="text/javascript" src="3DHOP/minimal/js/spidergl.js"></script>
<!--JQUERY-->
<script type="text/javascript" src="3DHOP/minimal/js/jquery.js"></script>
<!--PRESENTER-->
<script type="text/javascript" src="3DHOP/minimal/js/presenter.js"></script>
<!--3D MODELS LOADING AND RENDERING-->
<script type="text/javascript" src="3DHOP/minimal/js/nexus.js"></script>
<script type="text/javascript" src="3DHOP/minimal/js/ply.js"></script>
<!--TRACKBALLS-->
<script type="text/javascript" src="3DHOP/minimal/js/trackball_turntable.js"></script>
<script type="text/javascript" src="3DHOP/minimal/js/trackball_turntable_pan.js"></script>
<script type="text/javascript" src="3DHOP/minimal/js/trackball_pantilt.js"></script>
<script type="text/javascript" src="3DHOP/minimal/js/trackball_sphere.js"></script>
<!--UTILITY-->
<script type="text/javascript" src="3DHOP/minimal/js/init.js"></script>
</head>
<body>
<div id="3dhop" class="tdhop" onmousedown="if (event.preventDefault) event.preventDefault()"><div id="tdhlg"></div>
<!--HOME-->
 <div id="toolbar">
  <img id="home"        title="Home"                   src="3DHOP/minimal/skins/dark/home.png"/><br/>
<!--HOME-->
<!--ZOOM-->
  <img id="zoomin"      title="Zoom In"                src="3DHOP/minimal/skins/dark/zoomin.png"/><br/>
  <img id="zoomout"     title="Zoom Out"               src="3DHOP/minimal/skins/dark/zoomout.png"/><br/>
<!--ZOOM-->
<!--LIGHTING-->
  <img id="lighting_off" title="Enable Lighting"       src="3DHOP/minimal/skins/dark/lighting_off.png" style="position:absolute; visibility:hidden;"/>
  <img id="lighting"     title="Disable Lighting"      src="3DHOP/minimal/skins/dark/lighting.png"/><br/>
<!--LIGHTING-->
<!--LIGHT-->
  <img id="light_on"    title="Disable Light Control"  src="3DHOP/minimal/skins/dark/lightcontrol_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="light"       title="Enable Light Control"   src="3DHOP/minimal/skins/dark/lightcontrol.png"/><br/>
<!--LIGHT-->
';





if ($hasHotspot == 'true') {
$html.=
'

<!--BOTTONE HOTSPOT-->
 <img id="hotspot_on" title="Hide Hotspots"         src="3DHOP/minimal/skins/dark/pin_on.png"          style="position:absolute; visibility:hidden;"/>
<img id="hotspot"    title="Show Hotspots"         src="3DHOP/minimal/skins/dark/pin.png"             /><br/>
<!--BOTTONE HOTSPOT -->

';
}





$html.=
'<!--MEASURE-->
  <img id="measure_on"  title="Disable Measure Tool"   src="3DHOP/minimal/skins/dark/measure_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="measure"     title="Enable Measure Tool"    src="3DHOP/minimal/skins/dark/measure.png"/><br/>
<!--MEASURE-->
<!--POINT PICKING-->
  <img id="pick_on"     title="Disable PickPoint Mode" src="3DHOP/minimal/skins/dark/pick_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="pick"        title="Enable PickPoint Mode"  src="3DHOP/minimal/skins/dark/pick.png"/><br/>
<!--POINT PICKING-->
<!--SECTIONS-->
  <img id="sections_on" title="Disable Plane Sections" src="3DHOP/minimal/skins/dark/sections_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="sections"    title="Enable Plane Sections"  src="3DHOP/minimal/skins/dark/sections.png"/><br/>
<!--SECTIONS-->
<!--COLOR-->
  <img id="color_on"    title="Disable Solid Color"    src="3DHOP/minimal/skins/dark/color_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="color"       title="Enable Solid Color"     src="3DHOP/minimal/skins/dark/color.png"/><br/>
<!--COLOR-->
<!--CAMERA-->
  <img id="perspective"  title="Perspective Camera"    src="3DHOP/minimal/skins/dark/perspective.png" style="position:absolute; visibility:hidden;"/>
  <img id="orthographic" title="Orthographic Camera"   src="3DHOP/minimal/skins/dark/orthographic.png"/><br/>
<!--CAMERA-->
<!--FULLSCREEN-->
  <img id="full_on"     title="Exit Full Screen"       src="3DHOP/minimal/skins/dark/full_on.png" style="position:absolute; visibility:hidden;"/>
  <img id="full"        title="Full Screen"            src="3DHOP/minimal/skins/dark/full.png"/>
<!--FULLSCREEN-->
 </div>

<!--MEASURE-->
 <div id="measure-box" class="output-box">Measured length<hr/><span id="measure-output" class="output-text" onmousedown="event.stopPropagation()">0.0</span></div>
<!--MEASURE-->

<!--POINT PICKING-->
 <div id="pickpoint-box" class="output-box">XYZ picked point<hr/><span id="pickpoint-output" class="output-text" onmousedown="event.stopPropagation()">[ 0 , 0 , 0 ]</span></div>
<!--POINT PICKING-->

<!--SECTIONS-->
 <div id="sections-box" class="output-box">
  <table class="output-table" onmousedown="event.stopPropagation()">
	<tr><td>Plane</td><td>Position</td><td>Flip</td></tr>
	<tr>
		<td><img   id="xplane_on"    title="Disable X Axis Section" src="3DHOP/minimal/skins/icons/sectionX_on.png" onclick="sectionxSwitch()" style="position:absolute; visibility:hidden; border:1px inset;"/>
			<img   id="xplane"       title="Enable X Axis Section"  src="3DHOP/minimal/skins/icons/sectionX.png"  onclick="sectionxSwitch()"/><br/></td>
		<td><input id="xplaneSlider" class="output-input"  type="range"    title="Move X Axis Section Position"/></td>
		<td><input id="xplaneFlip"   class="output-input"  type="checkbox" title="Flip X Axis Section Direction"/></td></tr>
	<tr>
		<td><img   id="yplane_on"    title="Disable Y Axis Section" src="3DHOP/minimal/skins/icons/sectionY_on.png" onclick="sectionySwitch()" style="position:absolute; visibility:hidden; border:1px inset;"/>
			<img   id="yplane"       title="Enable Y Axis Section"  src="3DHOP/minimal/skins/icons/sectionY.png"  onclick="sectionySwitch()"/><br/></td>
		<td><input id="yplaneSlider" class="output-input"  type="range"    title="Move Y Axis Section Position"/></td>
		<td><input id="yplaneFlip"   class="output-input"  type="checkbox" title="Flip Y Axis Section Direction"/></td></tr>
	<tr>
		<td><img   id="zplane_on"    title="Disable Z Axis Section" src="3DHOP/minimal/skins/icons/sectionZ_on.png" onclick="sectionzSwitch()" style="position:absolute; visibility:hidden; border:1px inset;"/>
			<img   id="zplane"       title="Enable Z Axis Section"  src="3DHOP/minimal/skins/icons/sectionZ.png"  onclick="sectionzSwitch()"/><br/></td>
		<td><input id="zplaneSlider" class="output-input"  type="range"    title="Move Y Axis Section Position"/></td>
		<td><input id="zplaneFlip"   class="output-input"  type="checkbox" title="Flip Z Axis Section Direction"/></td></tr></table>
  <table class="output-table" onmousedown="event.stopPropagation()" style="text-align:right;">
	<tr>
	 <td>Show planes<input id="showPlane" class="output-input" type="checkbox" title="Show Section Planes" style="bottom:-3px;"/></td>
	 <td>Show edges<input  id="showBorder" class="output-input" type="checkbox" title="Show Section Edges" style="bottom:-3px;"/></td></tr></table>
 </div>
<!--SECTIONS-->

 <canvas id="draw-canvas" style="background-image: url(3DHOP/minimal/skins/backgrounds/light.jpg)"/>
</div>
</body>




<script type="text/javascript">
var presenter = null;

function setup3dhop() {
	presenter = new Presenter("draw-canvas");

	presenter.setScene({
		meshes: {
			"mesh_1" : { url: "'.$model.'" },
//			"mesh_2" : { url: "submodel1.nxz" },
';

if ($hasHotspot == 'true') {
	$html.= '
			"hs_1" : { url: "http://150.146.207.67/3dhop-react/models/sfera1.ply" },
			';
}

$html.='	
		},
		modelInstances : {
			"model_1" : {
				mesh  : "mesh_1",
				color : [0.8, 0.7, 0.75]
			},
//			"model_2" : {
//				mesh  : "mesh_2",
//				color : [0.8, 0.7, 0.75]
//			}
		},';

if ($hasHotspot == 'true') {
	$html.='
		spots : {
			"hs_1" : {
				mesh : "hs_1",
					transform: {
						matrix: SglMat4.mul(SglMat4.translation([0, 0, 0]), SglMat4.rotationAngleAxis(sglDegToRad(-
							5.0), [0.0, 0.0, 1.0]))
					},
					color: [1, 0.5, 0.5],
					alpha: 0.5
				}
		},';
	}


$html.='
		trackball: {
			type : TurntablePanTrackball,
			trackOptions : {
				startPhi: 35.0,
				startTheta: 15.0,
				startDistance: 2.5,
				minMaxPhi: [-180, 180],
				minMaxTheta: [-180.0, 180.0],
				minMaxDist: [0.5, 3.0]
			}
		}
	});';





if ($hasHotspot == 'true') {
$html.= 
 '

//--HOTSPOT--
	presenter.setSpotVisibility(HOP_ALL, false, true);
	presenter._onPickedSpot = onPickedSpot;
//--HOTSPOT--

  ';
}





$html.=
'//--MEASURE--
	presenter._onEndMeasurement = onEndMeasure;
//--MEASURE--

//--POINT PICKING--
	presenter._onEndPickingPoint = onEndPick;
//--POINT PICKING--

//--SECTIONS--
	sectiontoolInit();
//--SECTIONS--
}';





if ($hasHotspot == 'true') {
$html.=
'

//--HOTSPOT--
function onPickedSpot(id) {
  switch(id) {
     case \'hs_1\'   : alert("Hotspot Clicked"); break;
  }
}
//--HOTSPOT--

';
}





$html.=
'

function actionsToolbar(action) {
	if(action==\'home\') presenter.resetTrackball();
//--FULLSCREEN--
	else if(action==\'full\'  || action==\'full_on\') fullscreenSwitch();
//--FULLSCREEN--
//--ZOOM--
	else if(action==\'zoomin\') presenter.zoomIn();
	else if(action==\'zoomout\') presenter.zoomOut();
//--ZOOM--
//--LIGHTING--
	else if(action==\'lighting\' || action==\'lighting_off\') { presenter.enableSceneLighting(!presenter.isSceneLightingEnabled()); lightingSwitch(); }
//--LIGHTING--
//--LIGHT--
	else if(action==\'light\' || action==\'light_on\') { presenter.enableLightTrackball(!presenter.isLightTrackballEnabled()); lightSwitch(); }
//--LIGHT--
//--CAMERA--
	else if(action==\'perspective\' || action==\'orthographic\') { presenter.toggleCameraType(); cameraSwitch(); }
//--CAMERA--
//--COLOR--
	else if(action==\'color\' || action==\'color_on\') { presenter.toggleInstanceSolidColor(HOP_ALL, true); colorSwitch(); }
//--COLOR--
//--MEASURE--
	else if(action==\'measure\' || action==\'measure_on\') { presenter.enableMeasurementTool(!presenter.isMeasurementToolEnabled()); measureSwitch(); }
//--MEASURE--
//--POINT PICKING--
	else if(action==\'pick\' || action==\'pick_on\') { presenter.enablePickpointMode(!presenter.isPickpointModeEnabled()); pickpointSwitch(); }
//--POINT PICKING--
//--SECTIONS--
	else if(action==\'sections\' || action==\'sections_on\') { sectiontoolReset(); sectiontoolSwitch(); }
//--SECTIONS--';





if ($hasHotspot == 'true') {
$html.=
'

//--HOTSPOT--
else if(action==\'hotspot\'|| action==\'hotspot_on\') { 
	presenter.toggleSpotVisibility(HOP_ALL, true); presenter.enableOnHover(!presenter.isOnHoverEnabled()); hotspotSwitch(); 
}
//--HOTSPOT--

';
}





$html.=
'
}

//--MEASURE--
function onEndMeasure(measure) {
	// measure.toFixed(2) sets the number of decimals when displaying the measure
	// depending on the model measure units, use "mm","m","km" or whatever you have
	$(\'#measure-output\').html(measure.toFixed(2) + " " + "'.$unitMeas.'");
}
//--MEASURE--

//--PICKPOINT--
function onEndPick(point) {
	// .toFixed(2) sets the number of decimals when displaying the picked point
	var x = point[0].toFixed(2);
	var y = point[1].toFixed(2);
	var z = point[2].toFixed(2);
    $(\'#pickpoint-output\').html("[ "+x+" , "+y+" , "+z+" ]");
}
//--PICKPOINT--

$(document).ready(function(){
	init3dhop();

	setup3dhop();
});

</script>
</html>';


echo $html;

?>

