<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asisten Rumah Tangga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://e1.pxfuel.com/desktop-wallpaper/22/991/desktop-wallpaper-gallery-for-indonesia-indonesia-top-30-hq-indonesia.jpg');
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }

        header {
            background-color: #0b6ce8 ;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        nav {
            background-color: #ffff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            margin: 0 15px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        nav a:hover {
            color: #fff;
            text-decoration: underline;
        }

        main {
            padding: 40px;
        }

        .card {
            background-color: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 30px;
        }

        footer {
            background-color: #0b6ce8;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1 class="display-4">Selamat Datang</h1>
    </header>

    <nav>
        <a class="btn btn-dark" href="#" onclick="loadContent('home.php')">Home</a>
        <a class="btn btn-dark" href="http://localhost/si_art/input_art.php" onclick="loadContent('read.php')">Input Data</a>
        <a class="btn btn-drak" href="http://localhost/si_art/cari_art.php?delete_art.php?id_art=3" onclick="loadContent('search.php')">Search</a>
        <body  style="background-color:RGB(0,0,0);">
        <a class="btn btn-dark" href="#" onclick="loadContent('profil.php')">Profil</a>
        
    </nav>

    <section id="contentSection">
        <!-- Content will be loaded here -->
    </section>

    <script>
        function loadContent(page) {
            // Use the page parameter to determine which content to load
            document.getElementById("contentSection").innerHTML = '<iframe src="' + page + '" name="tiga" style="width: 100%; height: 500px; border: none;"></iframe>';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>