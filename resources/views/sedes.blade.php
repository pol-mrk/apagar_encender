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

        <a href="{{ route('login') }}" class="content2">
            <img src="{{ asset('img/log_out.jpg') }}" class="professio_image" alt="Profession" />
            <img src="{{ asset('img/log_out.jpg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Log Out</span>
            </div>

        <a href="{{ route('berlin') }}" class="content">
            <img src="{{ asset('img/alemania.avif') }}" class="professio_image" alt="Profession" />
            <img src="{{ asset('img/sede_alemania.jpeg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Berlin, Alemania</span>
                <p>Sede de Berlin</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>Ver incidendias de Alemania</p>
                </div>
            </div>
        </a>

        <a href="{{ route('barcelona') }}" class="content">
            <img src="{{ asset('img/barcelona.jpg') }}" class="profession_image" alt="Profession" />
            <img src="{{ asset('img/sede_barcelona.jpg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Barcelona, España</span>
                <p>Sede de Barcelona</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>Ver incicendias de Barcelona</p>
                </div>
            </div>
        </a>

        <a href="{{ route('montreal') }}" class="content">
            <img src="{{ asset('img/canada.jpg') }}" class="profession_image" alt="Profession" />
            <img src="{{ asset('img/sede_canada.jpg') }}" class="profile_image" alt="Profile" />
            <div class="profile_detail">
                <span>Montreal, Canadá</span>
                <p>Sede de Canadá</p>
            </div>
            <div class="wrapper">
                <div class="profile_quote">
                    <p>Ver incicendias de Canadá</p>
                </div>
            </div>
        </a>
    </div>
</section>

</body>
</html>
