let canvas = document.getElementById("myCanvas");
let ctx = canvas.getContext("2d");


let pos_x = [];
let pos_y = [];
let direction;
let radius;
let allVertices = [];

let container = document.getElementById('canvasDiv');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// what kind of color and radius will vertices have.
let color = "#000000"; // white
let r = 4;

// every x and y coodinates of every pixel in canvas put in array
// x to pos_X
// y to pos_y
function setPosition() {

    for (let i = 0; i < canvas.width; i++) {
        pos_x[i] = i;
    }

    for (let i = 0; i < canvas.height; i++) {
        pos_y[i] = i;
    }

}
// Clear canvas.
function clearCanvas() {

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

}

// Every vertex has 4 attributes.
// 1) x coor
// 2) y coor
// 3) direction -> which way it will circle. Clockwise or not
// 4) radius -> how big circle it will make.
function createVerticesPos() {

    setPosition();

    for (let vertex = 0; vertex < 80; vertex++) {

        console.log(canvas.width);
        ctx.fillStyle = color;

        xCor = pos_x[Math.floor(Math.random() * canvas.width)];
        yCor = pos_y[Math.floor(Math.random() * canvas.height)];
        direction = Math.random() >= 0.5;
        radius = Math.floor(Math.random() * 5);

        allVertices[vertex] = [xCor, yCor, direction, radius];

    }

    return allVertices;

}

// Put vertex on canvas
function createVertex(x, y) {
    ctx.fillStyle = color;
    ctx.arc(x, y, r, 0,Math.PI*2, true);
    ctx.closePath();
}

let speed = 5;

let angle = 0;

// Calculate distance of vector from given vertices A and B
function calculateDistance(vertexA, vertexB) {
    return Math.sqrt(((vertexB[0] - vertexA[0])**2) + ((vertexB[1] - vertexA[1])**2));
}

// Calculate opacity of edges if distance is greater than 130 and less 170
// where 130 is 100% opacity and 170 is 0% opacity.
function calculateOpacity(distance) {
    return 1 - (Math.floor(distance / 1.7) / 100);
}

// Main magic.
function animate() {
    // clear
    clearCanvas();

    ctx.beginPath();
    for (let vertex = 0; vertex < 80; vertex++) {

        let currentVertex = allVertices[vertex];
        let newX;
        if (currentVertex[2]) {
            newX = currentVertex[3] * Math.cos(angle * (Math.PI/180));
        }
        else {
            newX = currentVertex[3] * -Math.cos(angle * (Math.PI/180));
        }

        let newY = currentVertex[3] * Math.sin(angle * (Math.PI/180));

        x = newX + currentVertex[0];
        y = newY + currentVertex[1];

        currentVertex[0] = x;
        currentVertex[1] = y;

        createVertex(x, y);

    }

    ctx.fill();

    // Making edges
    for (let i = 0; i < 80; i++) {

        let vertexA = allVertices[i];

        for (let j = 0; j < 80; j++) {
            let vertexB = allVertices[j];

            //Edge from given A vertex and B vertex.
            // Now we have to choose opacity.
            if (calculateDistance(vertexA, vertexB) <= 130) {
                ctx.beginPath();
                ctx.moveTo(vertexA[0], vertexA[1]);
                ctx.lineTo(vertexB[0], vertexB[1]);
                ctx.strokeStyle = 'grey';
                ctx.stroke();
            } else if (calculateDistance(vertexA, vertexB) > 130 && calculateDistance(vertexA, vertexB) < 170) {
                ctx.beginPath();
                ctx.moveTo(vertexA[0], vertexA[1]);
                ctx.lineTo(vertexB[0], vertexB[1]);
                ctx.strokeStyle = 'grey ' + calculateOpacity(calculateDistance(vertexA, vertexB)) + ')';
                ctx.stroke();
            }

        }
    }

    angle += speed;

    setTimeout(animate, 40);
}

createVerticesPos();
animate();