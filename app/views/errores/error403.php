<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403</title>
    <link rel="stylesheet" href="<?php echo constant('URL').'public/css/errores/error403.css'?>">
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700,900" rel="stylesheet">

<div id="sign-wrapper">
  <div id="hole1" class="hole"></div>
  <div id="hole2" class="hole"></div>
  <div id="hole3" class="hole"></div>
  <div id="hole4" class="hole"></div>
  <header id="header">
    <h1>403 forbidden</h1>
    <div id="strike1" class="strike"></div>
    <div id="strike2" class="strike"></div>
  </header>
  <section id="sign-body">
    <div id="copy-container">
      <h2>Solo Personal Autorizado</h2>
      <p><strong>Error 403: Forbidden</strong>. Tu no tienes permiso para entrar a esta pagina.</p>
    </div>
    <div id="circle-container">
      <svg version="1.1" viewBox="0 0 500 500" preserveAspectRatio="xMinYMin meet">
        <defs>
          <pattern id="image" patternUnits="userSpaceOnUse" height="450" width="450">
            <image x="25" y="25" height="450" width="450" xlink:href="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></image>
          </pattern>
        </defs>
        <circle cx="250" cy="250" r="200" stroke-width="40px" stroke="#343a40" fill="url(#image)"/>
        <line x1="100" y1="100" x2="400" y2="400" stroke-width="40px" stroke="#343a40"/>
      </svg>
    </div>
  </section>
</div>
</body>
</html>