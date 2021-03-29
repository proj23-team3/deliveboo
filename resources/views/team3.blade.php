<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    <style>
        body {
            width: 100vw;
            background: #0F2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #2C5364, #203A43, #0F2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #2C5364, #203A43, #0F2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        .avatars {
            display: grid;
            grid-template-columns: repeat(5, 1fr)
        }

        img {
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #FFF;
            font-size: 90px;
            padding: 0;
            margin: 0;
            line-height: 1;
            text-shadow: 0 0 10px #ff006c, 0 0 20px #ff006c, 0 0 30px #ff006c, 0 0 40px #ff417d, 0 0 70px #ff417d, 0 0 80px #ff417d, 0 0 100px #ff417d, 0 0 150px #ff417d;
        }

    </style>
</head>

<body>
    <h1>Team 3</h1>
    <div class="avatars">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ asset('img/AndyAvatar.png') }}">
                </figure>
            </div>
            <div class="card-content">

                <div class="content">
                    <p class="title is-3">Andrea Di Cataldi</p>
                    <p class="subtitle is-5">aka linksMan</p>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('img/AntoAvatar.png') }}" alt="">
        </div>
        <div>
            <img src="{{ asset('img/FedeAvatar.png') }}" alt="">
        </div>
        <div>
            <img src="{{ asset('img/GaggiAvatar.png') }}" alt="">
        </div>
        <div>
            <img src="{{ asset('img/MirkoAvatar.png') }}" alt="">
        </div>
    </div>
</body>

</html>
