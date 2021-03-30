<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    <style>
        body {
            width: 100vw;
        }

        .avatars {
            display: flex;
            flex-wrap: wrap
        }

        .avatars .card {
            flex: 1 200px;
            padding: 0.3rem;
            border-radius: .2rem;
        }

        img {
            width: 100%;
        }

        .card .content span:first-of-type {
            display: inline-block;
            margin: 5px 0;
            font-style: italic;
            position: relative;
        }

        span.quote {
            position: absolute;
            top: -5px;
        }

        .content blockquote {
            background-color: #dffffd;
            border-left: 5px solid #06babb;
        }

    </style>
</head>

<body>
    <div class="avatars">
        {{-- andre --}}
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/AndyAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">
                <div class="content">
                    <p class="title is-3">Andrea Di Cataldi</p>
                    <p class="subtitle is-5">aka LinksMan</p>
                    <p>Il suo mantra:</p>
                    <blockquote>"Raga un attimo che ha citofonato il corriere!"</blockquote>
                    <p>Dicono di lui nel team:</p>
                    <blockquote>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> L'unica persona che conosco
                            che scrive correttamente Sì (con l'accento). Tanta roba
                            ✅</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> L'efficienza al primo
                            posto... finché dura (dai 5 minuti alle 3 ore... dipende)</span>
                    </blockquote>
                </div>
            </div>
        </div>

        {{-- antonio --}}
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/AntoAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">
                <div class="content">
                    <p class="title is-3">Antonio Lo Voto</p>
                    <p class="subtitle is-5">aka The Nightwatcher</p>
                    <p>Non ha un mantra. Lui crea mantra.</p>
                    <p>Dicono di lui nel team:</p>
                    <blockquote>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Mentre il mondo dorme lui è
                            sveglio, davanti al pc, insieme al suo tarlo: "Lascia stare la
                            brief, la domanda è: cosa possiamo fare con le API di Laravel?" 😈</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> La sua fame di conoscenza è
                            inesauribile e oggetto della mia sana invidia.</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Il developer che scambia il
                            giorno con la notte</span>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/FedeAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">

                <div class="content">
                    <p class="title is-3">Federico Scarpati</p>
                    <p class="subtitle is-5">aka MemeMan</p>
                    <p>Il suo mantra:</p>
                    <blockquote>"Raga a me non funziona"</blockquote>
                    <p>Dicono di lui nel team:</p>
                    <blockquote>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Dopo ore&ore sulla home alla
                            ricerca della perfezione nelle imgs, per Fede oggi è normale
                            lavorare con le frazioni del pixel 😯</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Creatività infinita con un
                            pizzico di genialità</span>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/GaggiAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">

                <div class="content">
                    <p class="title is-3">Andrea Gaggia</p>
                    <p class="subtitle is-5">aka Mr. Wolf</p>
                    <p>Il suo mantra:</p>
                    <blockquote>"Ce l'ho fatta ma è na roba grezzissima..."</blockquote>
                    <p>Dicono di lui nel team:</p>
                    <blockquote>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Il suo sapere del codice è
                            pari alla lunghezza dei suoi capelli</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Tanto calmo quanto
                            competente, infonde sicurezza intorno a sè</span>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/MirkoAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">

                <div class="content">
                    <p class="title is-3">Mirko Saponeiro</p>
                    <p class="subtitle is-5">aka LogMan</p>
                    <p>Il suo mantra:</p>
                    <blockquote>"Ma i component quando li facciamo??"</blockquote>
                    <p>Dicono di lui nel team:</p>
                    <blockquote>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> La mentalità imprenditoriale
                            si fonde con Vue.js.</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Può eseguire un console.dir
                            nella sua mente senza codarlo 🤯</span>
                        <br>
                        <span><span class="quote"><i class="fas fa-quote-right"></i></span> Arriva sempre al punto, non
                            importa quale, come e dove</span>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
