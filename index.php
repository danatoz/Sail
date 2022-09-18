<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php
        require "admin/DbContext.php";
        $metaQuery = $pdo->query('SELECT * FROM `MetaKeyWords`');
        $metaTags = "";
        while($row = $metaQuery->fetch(PDO::FETCH_OBJ)){
            $metaTags .= "$row->Description, "; 
        }
        $verificationKeys = $pdo->query('SELECT * FROM `VerificationKeys`');
        echo('
            <!--Мета для индескирование сайта-->
            <!--<base href="https://www.rsail.ru/">-->
            <meta name="description" content="">
            <meta name="keywords" content="'.$metaTags.'">
            <meta name="robots" content="index">
            <meta name="yandex" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
            <meta name="Revisit" content="1">
            
        ');
        #<!--Требуется подтвердить права доступа владельцу сайта-->
        while ($row = $verificationKeys->fetch(PDO::FETCH_OBJ)) {
            echo('
                <meta name="'.$row->Name.'" content="'.$row->Key.'">
            ');
        };
    ?>
    <meta name="keywords" content="<?php while(1 > 1){
        }?>">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/ico/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Арендовать яхту в Саратове - RSail</title>
</head>

<body>
    <div class="wrapper">
        <?php
        require "_Header.php"
        ?>
        <content>
            <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                <div class="textBlock container-fluid">
                    <h1>Аренда парусной яхты в Саратове</h1>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/slider_1.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Романтические прогулки для влюбленных</h5>
                            <p>
                                Свадьба под алыми парусами, с застольем на острове.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider_2.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Путешествие по Волге</h5>
                            <p>
                                Катание на яхтах по живописным волжским протокам.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider_3.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Фотосессии на яхте</h5>
                            <p>
                                Где, как не на яхте, делать красивые фотографии?!
                            </p>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>

            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <h2>Аренда парусной яхты в Саратове!</h2>
                        <h4>Вы можете выбрать:</h4>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        require "admin/DbContext.php";

                        $query = $pdo->query('SELECT * FROM `Products` ORDER BY `SortKey`');
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            echo ('
                                <div class="col">
                                    <div class="card shadow-sm cardVariant">
                                        <img src="' . $row->UrlImage . '" alt="' . $row->ImageDescription . '">
                                        <div class="card-body">
                                            <p class="card-text">' . $row->Description . '</p>
                                        </div>
                                    </div>
                                </div>
                                ');
                        }
                        ?>
                    </div>
                    <div class="row notCarriage">
                        <p>*Не является услугой по перевозке пассажиров</p>
                    </div>
                </div>
            </div>
            <div class="container illustration">
                <h2>Наш флот</h2>
                <div class="container marketing">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <?php
                        require "admin/DbContext.php";

                        $query = $pdo->query('SELECT * FROM `OurFleet` ORDER BY `SortKey`');
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            echo ('
                                <div class="col">
                                    <div class="card bg-dark text-white">
                                        <img src="' . $row->UrlImage . '" class="card-img" alt="' . $row->ImageDescription . '">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">' . $row->Name . '</h5>
                                        </div>
                                    </div>
                                </div>
                                ');
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="container marketing reviews">
                <h2>Отзывы клиентов</h2>
                <hr />
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <?php
                    require "admin/DbContext.php";

                    $query = $pdo->query('SELECT * FROM `Reviews` ORDER BY `SortKey`');
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo ('
                            <div class="col-lg-4 review">
                                <img src="'.$row->UrlImage.'" alt="'.$row->ImageDescription.'" />
                                <h2>'.$row->Name.'</h2>
                                <p>'.$row->Description.'</p>
                            </div>
                        ');
                    }

                    ?>
                </div>
            </div>
            <div class="container block_video">
                <h2>Видеоролик</h2>
                <hr />
                <iframe src="https://www.youtube.com/embed/P-rpjzOr5Ug" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </content>
        <?php
        require "_Footer.php"
        ?>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>