<?php
function db_connect()
{
    return new mysqli('localhost', 'root', '', 'simplex');
}

function db_migrate(mysqli $db)
{
    $db->query('
    CREATE TABLE IF NOT EXISTS `services` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `description` text NOT NULL,
      PRIMARY KEY (`id`)
    );');
}

function db_seed(mysqli $db)
{
    $row_count = $db->query('SELECT * FROM services')->num_rows;
    if ($row_count > 0) return;
    $db->query("
    INSERT INTO simplex.services (name,description) VALUES
	 ('Водительская справка',' Для категорий: A, B, BE, M, A1, B1 - 1 200 рублей.<br>
 Для категорий: C, D, CE, DE, Tm, Tb, C1, D1, C1E, D1E (грузовой транспорт) - 2 500 рублей.'),
	 ('Анализ на коронавирус','Экспресс-анализ на антитела - 1000 рублей.<br>
Анализ на антигены - 2200 рублей.<br>
Выявление РНК вируса (ПЦР тест) - 2000 рублей.'),
	 ('Справка для трудоустройства','До 3000 рублей в зависимости от вредных факторов и условий работы'),
	 ('Вакцинация','Против COVID-19 - бесплатно при наличии полиса ОМС<br>
Против гепатита А - 1600 рублей<br>
Против гриппа - 450 рублей'),
	 ('Услуги предприятиям','По договору на индивидуальных условиях:<br>
Периодические осмотры, диспансеризация, предрейсовые осмотры, ренгенография<br>'),
	 ('Ультразвуковая диагностика','УЗИ суставов, печени, почек - 500 рублей<br>
УЗИ легких - 750 рублей<br>');
");
}

class ServicesAdapter
{
    private mysqli $db;

    function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        return $this->db->query('SELECT * FROM services')->fetch_all(MYSQLI_ASSOC);
    }
}
