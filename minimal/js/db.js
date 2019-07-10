JSON
// js che contiene i dati collegati agli spots

var db2 = {
	"spot" : {
		mesh : "spot",
		transform : { 
			matrix: SglMat4.mul(SglMat4.translation([ 3.3, 110.0, -7.0]), SglMat4.rotationAngleAxis(sglDegToRad(-5.0), [0.0, 0.0, 1.0])) 
		},
		color : [0.0, 0.25, 1.0],
		alpha : 0.2,
		titolo:"spot1",
		image: "../db_data/1.png",
		didascalia:"questo è lo spot1",
		testo:"lorem ipsum dolor sit amet...pippobaudo",
		trackBallPosition:[ 0,  0, 0.0, 0.0, 0.0, 0 ]
	},
	"spot1" : {
		mesh : "spot",
		transform : { 
			matrix: SglMat4.mul(SglMat4.translation([-1, 1, 1]), SglMat4.scaling([ 1, 1, 1]))
		},
		color : [0.0, 0.25, 1.0],
		alpha : 0.5,
		titolo:"spot2",
		image: "../db_data/2.png",
		didascalia:"pquesto è lo spot 2",
		testo:"pippobaudo",
		trackBallPosition:[ 0,  0, 0.0, 0.0, 0.0, 0 ]
	}
}
