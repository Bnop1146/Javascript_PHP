<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Drop Down</title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/javascript_dropdown.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<!-- Her skal sidens indhold ligge -->

<h2>Javascript Opgaver.</h2>


<nav class="top">
    <div class="dropdownBackground">
        <span class="arrow"></span>
    </div>



    <ul class="cool">
        <li>
            <a href="#">About Me</a>
            <div class="dropdown dropdown1">
                <div class="bio">
                    <img alt src="https://logo.clearbit.com/wesbos.com">
                    <p>Wes Bos sure does love web development. He teaches things like JavaScript, CSS and BBQ. Wait. BBQ isn't part of web development. It should be though!</p>
                </div>
            </div>
        </li>
        <li>
            <a href="#">Courses</a>
            <ul class="dropdown courses">
                <li>
                    <span class="code">RFB</span>
                    <a href="https://ReactForBeginners.com">React For Beginners</a>
                </li>
                <li>
                    <span class="code">ES6</span>
                    <a href="https://ES6.io">ES6 For Everyone</a>
                </li>
                <li>
                    <span class="code">NODE</span>
                    <a href="https://LearnNode.com">Learn Node</a>
                </li>
                <li>
                    <span class="code">STPU</span>
                    <a href="https://SublimeTextBook.com">Sublime Text Power User</a>
                </li>
                <li>
                    <span class="code">WTF</span>
                    <a href="http://Flexbox.io">What The Flexbox?!</a>
                </li>
                <li>
                    <span class="code">GRID</span>
                    <a href="https://CSSGrid.io">CSS Grid</a>
                </li>
                <li>
                    <span class="code">LRX</span>
                    <a href="http://LearnRedux.com">Learn Redux</a>
                </li>
                <li>
                    <span class="code">CLPU</span>
                    <a href="http://CommandLinePowerUser.com">Command Line Power User</a>
                </li>
                <li>
                    <span class="code">MMD</span>
                    <a href="http://MasteringMarkdown.com">Mastering Markdown</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Other Links</a>
            <ul class="dropdown dropdown3">
                <li><a class="button" href="http://twitter.com/wesbos">Twitter</a></li>
                <li><a class="button" href="http://facebook.com/wesbos.developer">Facebook</a></li>
                <li><a class="button" href="http://wesbos.com">Blog</a></li>
                <li><a class="button" href="http://wesbos.com/courses">Course Catalog</a></li>
            </ul>
        </li>
    </ul>
</nav>



<script>
    const  triggers = document.querySelectorAll('.cool > li');
    const background = document.querySelector('.dropdownBackground');
    const nav = document.querySelector('.top');

    function handleEnter() {
        this.classList.add('trigger-enter');
        setTimeout(() => this.classList.contains('trigger-enter') && this.classList.add('trigger-enter-active') , 150);
        background.classList.add('open');

        const dropdown = this.querySelector('.dropdown');
        const dropdownCoords = dropdown.getBoundingClientRect();
        const navCoords = nav.getBoundingClientRect();

        const coords = {
            height: dropdownCoords.height,
            width: dropdownCoords.width,
            top: dropdownCoords.top - navCoords.top,
            left: dropdownCoords.left - navCoords.left

        };

        background.style.setProperty('height', `${coords.height}px`);
        background.style.setProperty('width', `${coords.width}px`);
        background.style.setProperty('transform', `translate(${coords.left}px, ${coords.top}px)`);

    }

    function handleLeave(){
        this.classList.remove('trigger-enter', 'trigger-enter-active');
        background.classList.remove('open');

    }

    triggers.forEach(trigger => trigger.addEventListener('mouseenter', handleEnter));
    triggers.forEach(trigger => trigger.addEventListener('mouseleave', handleLeave));






</script>


</body>
</html>
