<?php
function db_connect()
{
    require './.env.php';
    return new mysqli(
        $env['MYSQL_HOST'],
        $env['MYSQL_USER'],
        $env['MYSQL_PASSWORD'],
        $env['MYSQL_DB'],
    );
}

function db_migrate(mysqli $db)
{
    $db->query('DROP TABLE IF EXISTS services');
    $db->query('
    CREATE TABLE `services` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `short_description` text NOT NULL,
      `full_description` text NOT NULL,
      PRIMARY KEY (`id`)
    );');
}

function db_seed(mysqli $db)
{
    $row_count = $db->query('SELECT * FROM services')->num_rows;
    if ($row_count > 0) return;
    $db->query("
    INSERT INTO services (name,short_description, full_description) VALUES
	 ('Водительская справка',' Для категорий: A, B, BE, M, A1, B1 - 1 200 рублей.<br>
 Для категорий: C, D, CE, DE, Tm, Tb, C1, D1, C1E, D1E (грузовой транспорт) - 2 500 рублей.',
 ''
),
	 ('Анализ на коронавирус','Экспресс-анализ на антитела - 1000 рублей.<br>
Анализ на антигены - 2200 рублей.<br>
Выявление РНК вируса (ПЦР тест) - 2000 рублей.', ''),
	 ('Справка для трудоустройства','До 3000 рублей в зависимости от вредных факторов и условий работы', ''),
	 ('Вакцинация','Против COVID-19 - бесплатно при наличии полиса ОМС<br>
Против гепатита А - 1600 рублей<br>
Против гриппа - 450 рублей', ''),
	 ('Услуги предприятиям','По договору на индивидуальных условиях:<br>
Периодические осмотры, диспансеризация, предрейсовые осмотры, ренгенография<br>', ''),
	 ('Ультразвуковая диагностика','УЗИ суставов, печени, почек - 500 рублей<br>
УЗИ легких - 750 рублей<br>', '');
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

    public function getById(int $id)
    {
        $escaped_id = $this->db->escape_string($id);
        return $this->db->query("SELECT * FROM services WHERE id=$escaped_id")->fetch_assoc();
    }

    public function create(string $name, string $short_description, string $full_description)
    {
        $escaped = [
            'name' => $this->db->escape_string($name),
            'short_description' => $this->db->escape_string($short_description),
            'full_description' => $this->db->escape_string($full_description),
        ];
        return $this->db->query("INSERT INTO services(name,short_description, full_description) VALUES ('{$escaped['name']}', '{$escaped['short_description']}', '{$escaped['full_description']}')");
    }

    public function update(int $id, string $name, string $short_description, string $full_description)
    {
        $escaped = [
            'id' => $this->db->escape_string($id),
            'name' => $this->db->escape_string($name),
            'short_description' => $this->db->escape_string($short_description),
            'full_description' => $this->db->escape_string($full_description),
        ];
        return $this->db->query("UPDATE services SET name = '{$escaped['name']}', short_description = '{$escaped['short_description']}', full_description = '{$escaped['full_description']}' WHERE id = {$escaped['id']}");
    }

    public function delete(int $id)
    {
        $escaped_id = $this->db->escape_string($id);
        return $this->db->query("DELETE FROM services WHERE id=$escaped_id");
    }
}
