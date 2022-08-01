
<input type="button" id="iniciar" value="Iniciar" onclick="inicia();"/> <input type="button" id="pausar" value="Pausar" onclick="pausar();" disabled/> <input type="button" value="Novo" onclick="limpar();"/><br>
<center><span id="counter">00:00:00</span><br></center>

<div id="resultados">
    <!-- <span id="resultado"></span><br>
    <input type="number" name="" id="resultado1" value="1234" disabled><br> -->
</div>


<script>

function formatatempo(segs) {
min = 0;
hr = 0;
/*
se hr < 10 entao hr = "0"&hr
se min < 10 entao min = "0"&min
se segs < 10 entao segs = "0"&segs
*/
while(segs>=60) {
if (segs >=60) {
segs = segs-60;
min = min+1;
}
}

while(min>=60) {
if (min >=60) {
min = min-60;
hr = hr+1;
}
}

if (hr < 10) {hr = "0"+hr}
if (min < 10) {min = "0"+min}
if (segs < 10) {segs = "0"+segs}
fin = hr+":"+min+":"+segs
return fin;
}

var segundos = 0; //inicio do cronometro

function conta() {
segundos++;
document.getElementById("counter").innerHTML = formatatempo(segundos);
}

function inicia(){
interval = setInterval("conta();",1000);

document.getElementById("iniciar").setAttribute("disabled", false);
document.getElementById("pausar").removeAttribute("disabled");
var temp = document.createElement("span");
var linebreak = document.createElement("br");
//TEMPO
var d = new Date();

var datestring = "<br><br>" + d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate() + " - " +
d.getHours() + "h " + d.getMinutes() + "m " + d.getSeconds() + "s";

//TEMPO


temp.innerHTML = datestring;
document.getElementById("resultados").appendChild(linebreak);
document.getElementById("resultados").appendChild(temp);
document.getElementById("resultados").appendChild(linebreak);


}

function pausar(){
clearInterval(interval);
document.getElementById("iniciar").removeAttribute("disabled");
document.getElementById("pausar").setAttribute("disabled", false);
var tempReg = document.createElement("input");
tempReg.setAttribute("disabled", "disabled");
var linebreak = document.createElement("br");
var temp = document.createElement("span");

//TEMPO
var d = new Date();

var datestring = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate() + " - " +
d.getHours() + "h " + d.getMinutes() + "m " + d.getSeconds() + "s";

//TEMPO

temp.innerHTML = datestring;
document.getElementById("resultados").appendChild(linebreak);
document.getElementById("resultados").appendChild(tempReg).value = formatatempo(segundos);
document.getElementById("resultados").appendChild(linebreak);

document.getElementById("resultados").appendChild(temp);
document.getElementById("resultados").appendChild(linebreak);

document.getElementById("resultados").appendChild(temp);

/*document.getElementById("resultado").innerHTML += '<br>' + formatatempo(segundos);
document.getElementById("resultado1").value += 1993;*/
clearInterval(interval);
}

function limpar(){
clearInterval(interval);
document.getElementById("iniciar").removeAttribute("disabled");
document.getElementById("pausar").setAttribute("disabled", false);
segundos = 0;
document.getElementById("counter").innerHTML = formatatempo(segundos);
clearInterval(interval);
document.getElementById("resultados").innerHTML = '';
}
</script>
