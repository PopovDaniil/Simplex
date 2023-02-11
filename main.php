<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симплекс</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="root">
        <header>
            <a href=".">
                <section class="container bg-blur wfull hfull center vert-center">
                    <div class="row gap-20 center vert-center">
                        <img src="img/logo.png" alt="">
                        <h1 class="text-white">ООО "Симплекс"</h1>
                    </div>
                </section>
            </a>
        </header>
        <main>

            <article>
                <h2>
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
                                <?= $data['selectedService']['short_description'] ?>
                                <?= $data['selectedService']['full_description'] ?>
                            </section>
                            <?php } else {
                            foreach ($data['services'] as $key => $service) {
                            ?>
                            <a href="?service=<?=$service['id']?>">
                                <section class="card min-w300 w500 min-h150">
                                    <h4 class="text-center"><?= $service['name'] ?></h4>
                                    <div>
                                        <?= $service['short_description'] ?>
                                    </div>
                                </section>
                            </a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </article>

            <?php if ($data['isMainPage']) { ?>
                <article>
                    <h2 class="text-center">О нас</h2>
                    <div class="column vert-center center">
                        <section class="card row w1200 gap-20">
                            <img class="w300" src="./img/centr-medicinskih-osmotrov-1-rostov-sokolova.jpg" alt="">
                            <p>Коллектив Центра медицинских осмотров «Симплекс» считает, что получение необходимых
                                медицинских документов должно быть просто, быстро и удобно.<br>
                                Мы предлагаем полный спектр медицинских осмотров: медицинские справки, личные медицинские
                                книжки, предварительные и периодические медицинские осмотры, диспансеризацию государственных
                                служащих, лабораторную и рентгенологическую диагностику.<br>
                                В нашем медицинском центре созданы все условия (наличие всех необходимых врачей
                                специалистов, цифровой рентгеновский кабинет, лаборатория) позволяющие в течение 30 минут
                                пройти медицинский осмотр.<br>
                                Мы осуществляем выезд на территорию предприятий ЮФО. Наши передвижные медицинские комплексы
                                позволяют работать на территории предприятий, не имеющих собственных медицинских
                                кабинетов.<br>
                                Мы ценим Ваше время и деньги!</p>
                        </section>
                    </div>
                </article>
                <article>
                    <h2>Контакты</h2>
                    <section class="column vert-center">
                        <div class="card w1200">
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
        <footer class="text-center">© Симплекс, 2022</footer>
    </div>
</body>

</html>
