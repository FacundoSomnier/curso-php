<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL; cURL handle
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resutlado de la peticion y no mostrarlo en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion
   y guardamos el resultado
*/

$result = curl_exec($ch);
// Una alternativa es utilizar file_get_contents
// $result = file_get_contents(API_URL);

$data = json_decode($result, true);

curl_close($ch);



?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
    <meta name="descripcion" content="La proxima pelicula de Marvel" />
    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            display: grid;
            place-content: center;
        }

        section{
            display: flex;
            justify-content: center;
            text-align: center;
        }

        hgroup{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        img{
            margin: 0 auto;

        }

    </style>
</head>

<main>


    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="<?= $data['title']?>"
        style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?= $data["title"]?> se estrena en <?= $data["days_until"]?> dias</h3>
        <p>Fecha de estreno <?= $data["release_date"]?></p>
        <p>La proxima pelicula es <?= $data["following_production"]["title"]?></p>
    </hgroup>

</main>





