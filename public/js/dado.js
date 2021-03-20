var rollTheDice = function() {
    var faceValue;
    var output = '';
    faceValue = Math.floor(Math.random() * 6);
    output += "&#x268" + faceValue + "; ";
    document.getElementById('dado').innerHTML = output;
    document.getElementById('resultado').innerHTML = faceValue + 1;
}