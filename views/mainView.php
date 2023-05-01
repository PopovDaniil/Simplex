<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симплекс</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="styles/glide.core.min.css">
    <link rel="stylesheet" href="styles/glide.theme.min.css">
    <script src="glide.min.js"></script>
</head>

<body>
    <div class="root">
        <?php if (!isset($_GET['service'])) { ?>
            <nav class="container center">
                <div class="container w300 space-between">
                    <a href="#services">Услуги</a>
                    <a href="#about">О нас</a>
                    <a href="#contacts">Контакты</a>
                </div>
            </nav>
        <?php } ?>
        <header>
            <a href=".">
                <section class="container bg-blur wfull hfull center vert-center">
                    <div class="row gap-20 center vert-center">
                        <img class="logo" src="img/logo.png" alt="">
                        <h1 class="text-white">ООО "Симплекс"</h1>
                    </div>
                </section>
            </a>
        </header>
        <main>

            <article>
                <h2>
                    <div class="anchor" id="services"></div>
                    <?php if (isset($_GET['service'])) {
                        echo $data['selectedService']['name'];
                    } else { ?>
                        Услуги
                    <?php } ?>
                </h2>
                <div class="container center">
                    <div class="row wrap center vert-center">
                        <?php if (isset($_GET['service'])) { ?>
                            <section class="card">
                                <p><?= $data['selectedService']['short_description'] ?></p>
                                <p><?= $data['selectedService']['full_description'] ?></p>
                                <p>
                                    <?php foreach ($data['serviceContent'] as $entry) { ?>
                                        <?= $entry['description'] ?> - <?= $entry['price'] ?> рублей<br>
                                    <?php } ?>
                                </p>
                            </section>
                            <?php } else {
                            foreach ($data['services'] as $key => $service) {
                            ?>
                                <section class="card min-w300 w500 min-h150">
                                    <a href="?service=<?= $service['id'] ?>">
                                        <h4 class="text-center"><?= $service['name'] ?></h4>
                                        <div>
                                            <?= $service['short_description'] ?>
                                        </div>
                                    </a>
                                </section>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </article>

            <?php if ($data['isMainPage']) { ?>
                <article>
                    <div class="anchor" id="about"></div>
                    <h2 class="text-center">О нас</h2>
                    <div class="column vert-center center margin-small">
                        <section class="card row wfull">
                            <div class="glide">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slides">
                                        <li class="row vert-center gap-20 glide__slide">
                                            <img class="w300" src="./img/centr-medicinskih-osmotrov-1-rostov-sokolova.jpg" alt="">
                                            <p>Коллектив Центра медицинских осмотров «Симплекс» считает, что получение необходимых
                                                медицинских документов должно быть просто, быстро и удобно.<br>
                                                Мы предлагаем полный спектр медицинских осмотров: медицинские справки, личные медицинские
                                                книжки, предварительные и периодические медицинские осмотры, диспансеризацию государственных
                                                служащих, лабораторную и рентгенологическую диагностику.<br>
                                            </p>
                                        </li>
                                        <li class="row gap-20 glide__slide">
                                            <img class="w300" src="./img/centr-medicinskih-osmotrov-3-procedurnyj.jpg" alt="">
                                            <p>В нашем медицинском центре созданы все условия (наличие всех необходимых врачей
                                                специалистов, цифровой рентгеновский кабинет, лаборатория) позволяющие в течение 30 минут
                                                пройти медицинский осмотр.<br>
                                                Мы ценим Ваше время и деньги!
                                            </p>
                                        </li>
                                        <li class="row gap-20 glide__slide">
                                            <img class="w300" src="./img/centr-medicinskih-osmotrov-simpleks-vyezdnoj-1.jpeg" alt="">
                                            <p> Мы осуществляем выезд на территорию предприятий ЮФО. Наши передвижные медицинские комплексы
                                                позволяют работать на территории предприятий, не имеющих собственных медицинских
                                                кабинетов.<br>
                                                Мы ценим Ваше время и деньги!
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="glide__arrows" data-glide-el="controls">
                                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"> ← </button>
                                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"> → </button>
                                </div>
                            </div>

                        </section>
                    </div>
                </article>
                <article>
                    <div class="anchor" id="contacts"></div>
                    <h2 id="contacts">Контакты</h2>
                    <section class="column vert-center">
                        <div class="card">
                            <b>Адреса:</b>
                            <div>
                                <span class="text-red">ул. Соколова 84/302</span>
                                <span class="text-blue">Пн - Пт с 08:00 до 18:00. Сб с 09:00 до 13:00</span>
                            </div>
                            <div>
                                <span class="text-red">ул. Варфоломеева 243а (диагностика COVID-19)</span>
                                <span class="text-blue"> Пн-Пт 08:00-18:00. Сб-Вс 09:00-15:00.</span>
                            </div>
                            <b>Телефон:</b>
                            <div>
                                <a href="tel:+7 (863) 333-22-82">+7 (863) 333-22-82</a>
                            </div>
                        </div>
                    </section>
                    <section class="map text-center">
                        <h3 class="text-vert-center">Как проехать</h3>
                        <div class="container center">
                            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A308cc78b6b218e22a8ff3cb88ceab758dcf40a9bb310a7fa942722f551b95d87&amp;width=1200&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
                        </div>
                    </section>
                </article>
            <?php } ?>
        </main>
        <footer class="text-center">© Симплекс, 2023</footer>


        <script>
            if (document.querySelector('.glide')) {
                new Glide('.glide', {
                    autoplay: 5000,
                    animationDuration: 1000,
                }).mount()
            }
        </script>
    </div>
</body>

</html>
