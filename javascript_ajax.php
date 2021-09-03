<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="en">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Sigende titel</title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/javascript_ajax.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<!-- Her skal sidens indhold ligge -->

<form class="search-form">
    <label>
        <input type="text" class="search" placeholder="City or State">
    </label>
    <ul class="suggestions">
        <li>Filter for a city</li>
        <li>or a state</li>
    </ul>
</form>
<script>
    const endpoint = 'https://gist.githubusercontent.com/Miserlou/c5cd8364bf9b2420bb29/raw/2bf258763cdddd704f8ffd3ea9a3e81d25e2c6f6/cities.json';

    const cities = [];

    fetch(endpoint)
        .then(blob => blob.json())
        .then(data => cities.push(...data))

    function findMatches(wordToMatch, cities){
        return cities.filter(place => {
            const regex = new RegExp(wordToMatch, 'gi');
            return place.city.match(regex) || place.state.match(regex)
        });
    }

    function numberWithCommas (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }


    function displayMatches (){
        const matchArray = findMatches(this.value, cities);
        const html = matchArray.map(place => {
            const regex = new RegExp(this.value, 'gi');
            const cityName = place.city.replace(regex, `<span class="hl">${this.value}</span>`)
            const stateName = place.state.replace(regex, `<span class="hl">${this.value}</span>`)

            return`
          <li>
                <span class="name">${cityName}, ${stateName}</span>
                <span class="population">${numberWithCommas(place.population)}</span>
          </li>
       `;
        }).join('')
        suggestions.innerHTML = html;
    }

    const searchInput = document.querySelector('.search');
    const suggestions = document.querySelector('.suggestions');

    searchInput.addEventListener('change', displayMatches);
    searchInput.addEventListener('keyup', displayMatches);


</script>


</body>
</html>
