<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Panel Gallery</title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/javascript_panel_gallery.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<!-- Her skal sidens indhold ligge -->

<div class="panels">
    <div class="panel panel1">
        <p>Hey</p>
        <p>Let's</p>
        <p>Dance</p>
    </div>
    <div class="panel panel2">
        <p>Give</p>
        <p>Take</p>
        <p>Receive</p>
    </div>
    <div class="panel panel3">
        <p>Experience</p>
        <p>It</p>
        <p>Today</p>
    </div>
    <div class="panel panel4">
        <p>Give</p>
        <p>All</p>
        <p>You can</p>
    </div>
    <div class="panel panel5">
        <p>Life</p>
        <p>In</p>
        <p>Motion</p>
    </div>
</div>

<script>

    const panels = document.querySelectorAll('.panel');

    function toggleOpen() {
        this.classList.toggle('open');
    }

    function toggleActive(e){
        console.log(e.propertyName);
        if (e.propertyName.includes('flex')){
            this.classList.toggle('open-active');
        }
    }

    panels.forEach(panel => panel.addEventListener('click' , toggleOpen));
    panels.forEach(panel => panel.addEventListener('transitionend' , toggleActive));




</script>


</body>
</html>
