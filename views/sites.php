<a href="#">Site1</a><br><br>
<a href="#">Site2</a><br><br>
<a href="#">Site3</a><br><br>
<a href="#">Site4</a><br><br>
<a href="#">Site5</a><br><br>
<a href="#">Site6</a><br><br>
<a href="#">Site7</a><br><br>

<audio controls>
    <source src="img/Never Gonna Give You Up.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<a onclick="myAudioFunction('A');">
    <img src="img/lilith.jpg" style="max-width: 50px;">
</a>
<script>
    var aAudio = new Audio('img/Never Gonna Give You Up.mp3');
    function myAudioFunction(letter) {
        if (letter == 'A') {
            aAudio.play();
        }
    }
</script>



