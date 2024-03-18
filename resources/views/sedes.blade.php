<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodePen - No script accordion animation</title>
    <link rel="stylesheet" href="{{ asset('css/sedes.css') }}">
</head>
<body>

<section class="container">
    <div class="category_container">
        <a href="{{ route('berlin') }}" class="content">
            <img src="{{ asset('img/alemania.avif') }}" class="professio_image" alt="Profession" />
            <img src="{{ asset('img/sede_alemania.jpeg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Berlin, Alemania</span>
                <p>UI/UX Designer + Graphic Designer</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>"UI is the saddle, the stirrups, & the reins. UX is the feeling you get being able to ride the horse."</p>
                </div>
            </div>
        </a>

        <a href="{{ route('barcelona') }}" class="content">
            <img src="{{ asset('img/barcelona.jpg') }}" class="profession_image" alt="Profession" />
            <img src="{{ asset('img/sede_barcelona.jpg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Barcelona, España</span>
                <p>Photographer + Model</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>"If you see something that moves you, and then snap it, you keep a moment."</p>
                </div>
            </div>
        </a>

        <a href="{{ route('montreal') }}" class="content">
            <img src="{{ asset('img/canada.jpg') }}" class="profession_image" alt="Profession" />
            <img src="{{ asset('img/sede_canada.jpg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Montreal, Canada</span>
                <p>Fashion Designer + Model</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>"My mission in life is not merely to survive, but to thrive and to do so with some passion, some compassion, some humor, and some style."</p>
                </div>
            </div>
        </a>
    </div>
</section>

</body>
</html>
