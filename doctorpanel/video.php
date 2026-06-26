<!DOCTYPE html>
<html>
<head>
<title>Video Consultation</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI';
}

body{
background:linear-gradient(white);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
overflow:hidden;
position:relative;
}

/* BACKGROUND CIRCLES */
body::before{
content:"";
position:absolute;
width:350px;
height:350px;
background:rgba(14,165,233,0.15);
border-radius:50%;
top:-120px;
left:-120px;
}

body::after{
content:"";
position:absolute;
width:300px;
height:300px;
background:rgba(37,99,235,0.12);
border-radius:50%;
bottom:-100px;
right:-100px;
}

/* CARD */
.container{
text-align:center;
background:white;
padding:45px 35px;
border-radius:28px;
box-shadow:0 20px 50px rgba(0,0,0,0.15);
animation:fadeUp 0.8s ease;
width:430px;
position:relative;
overflow:hidden;
z-index:1;
transition:0.4s;
}

/* CARD HOVER */
.container:hover{
transform:translateY(-6px);
box-shadow:0 25px 60px rgba(0,0,0,0.2);
}

/* GLOW EFFECT */
.container::before{
content:"";
position:absolute;
width:250px;
height:250px;
background:rgba(14,165,233,0.08);
border-radius:50%;
top:-120px;
right:-100px;
}

/* TITLE */
h2{
color:#0c3440;
margin-bottom:20px;
font-size:34px;
font-weight:bold;
animation:fadeDown 0.8s ease;
position:relative;
z-index:1;
}

/* ICON */
.icon{
font-size:75px;
color:#0ea5e9;
margin-bottom:18px;
animation:pulse 2s infinite;
position:relative;
z-index:1;
text-shadow:0 10px 20px rgba(14,165,233,0.3);
}

/* BUTTON */
button{
padding:14px 24px;
border:none;
border-radius:14px;
background:linear-gradient(rgb(12,52,61));
color:white;
font-size:17px;
font-weight:600;
cursor:pointer;
transition:0.4s;
margin-top:20px;
width:100%;
position:relative;
z-index:1;
}

button:hover{
transform:translateY(-4px) scale(1.03);
box-shadow:0 15px 30px rgba(37,99,235,0.35);
}

/* TEXT */
p{
color:#64748b;
font-size:15px;
margin-top:12px;
line-height:1.6;
position:relative;
z-index:1;
}

/* ANIMATIONS */
@keyframes fadeUp{
from{
opacity:0;
transform:translateY(30px);
}
to{
opacity:1;
transform:translateY(0);
}
}

@keyframes fadeDown{
from{
opacity:0;
transform:translateY(-20px);
}
to{
opacity:1;
transform:translateY(0);
}
}

@keyframes pulse{
0%{
transform:scale(1);
}
50%{
transform:scale(1.1);
}
100%{
transform:scale(1);
}
}

</style>

</head>
<body>

<div class="container">

<div class="icon">🎥</div>

<h2>Video Consultation</h2>

<p>Connect with your patient in a secure video session</p>

<button onclick="start()">Start Video Call</button>

</div>

<script>
function start(){
    let room = "dermabridgex_" + Math.floor(Math.random()*10000);
    window.open("https://meet.jit.si/" + room);
}
</script>

</body>
</html>