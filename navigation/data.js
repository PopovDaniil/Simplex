/**
 * @typedef {{id: number, name: string, parentId: number | null}} ServiceItem Список услуг
 */
/**
 * @var {ServiceItem}
 */
const inputData = {
  services: [
    {
      id: 1,
      name: "Водительская справка (категории А и В)",
      contents: [
        {
          name: "Медицинское заключение №003 В/у по приказу МЗ РФ 344",
        },
        {
          name: "Осмотр врачом-терапевтом по приказу МЗ РФ 1092н",
        },
        {
          name: "Осмотр врачом-офтальмологом по приказу МЗ РФ 1092н",
        },
        {
          name: "Освидетельствование врачом психиатром-наркологом (НД РО)",
        },
        {
          name: "Освидетельствование врачом-психиатром (ПНД РО)",
        },
        {
          name: "Экспресс-освидетельствование",
        },
      ],
      parentId: null,
    },
    {
      id: 2,
      name: "Водительская справка (все категории)",
      contents: [
        {
          name: "Медицинское заключение №003 В/у по приказу МЗ РФ 344",
        },
        {
          name: "Осмотр врачом-терапевтом по приказу МЗ РФ 1092н",
        },
        {
          name: "Осмотр врачом-офтальмологом по приказу МЗ РФ 1092н",
        },
        {
          name: "Электроэнцефалография",
        },
        {
          name: "Освидетельствование врачом психиатром-наркологом (НД РО)",
        },
        {
          name: "Освидетельствование врачом-психиатром (ПНД РО)",
        },
        {
          name: "Экспресс-освидетельствование",
        },
        {
          name: "Осмотр врачом-неврологом по приказу МЗ РФ 1092н",
        },
        {
          name: "Осмотр врачом-оториноларингологом по приказу МЗ РФ 1092н",
        },
      ],
      parentId: null,
    },
    {
      id: 3,
      name: "Справка частного охранника",
      contents: [
        {
          name: "ХТИ на наркотики в НД РО (ф.003)",
        },
        {
          name: "Освидетельствование врачом психиатром-наркологом (НД РО)",
        },
        {
          name: "Освидетельствование врачом-психиатром (ПНД РО)",
        },
        {
          name: "Осмотр врачом-офтальмологом по приказу МЗ РФ №441",
        },
        {
          name: "Медицинское заключение №002 ЧО по приказу МЗ РФ №1252",
        },
      ],
    },
    {
      id: 4,
      name: "Справка на гос.службу",
      contents: [
        {
          name: "Медицинское заключение для гос.службы по приказу МЗ РФ 984 (форма 001)",
        },
        {
          name: "Осмотр врачом-психиатром с выдачей справки",
        },
        {
          name: "Осмотр врачом-психиатром-наркологом с выдачей справки",
        },
        {
          name: "Осмотр врачом-неврологом по приказу МЗ РФ №984",
        },
      ],
    },
    {
      id: 5,
      name: "Справка на гос.тайну",
      contents: [
        {
          name: "Медицинское заключение для гос.тайны по приказу МЗ РФ №989-н",
        },
        {
          name: "Осмотр врачом-неврологом по приказу МЗ РФ 989",
        },
        {
          name: "Осмотр врачом-психиатром с выдачей справки",
        },
        {
          name: "Осмотр врачом-психиатром-наркологом с выдачей справки",
        },
      ],
    },
    {
      id: 6,
      name: "Мед.заключение для сотрудников орг-ций атомной энергии",
      contents: [
        {
          name: "Осмотр врачом-терапевтом по приказу МЗ РФ №749-н",
        },
        {
          name: "Осмотр врачом-психиатром-наркологом по приказу МЗ РФ №749-н",
        },
        {
          name: "Осмотр врачом-неврологом по приказу МЗ РФ №749-н",
        },
        {
          name: "Осмотр врачом-психиатром по приказу МЗ РФ №749-н",
        },
        {
          name: "ХТИ на наркотики в НД РО",
        },
        {
          name: "Электрокардиография",
        },
        {
          name: "Рентгенография грудной клетки(цифровая)",
        },
        {
          name: "Определение индекса массы тела (ИМТ)",
        },
        {
          name: "Определение абсолютного сердечно-сосудистого риска",
        },
        {
          name: "Измерение внутриглазного давления",
        },
        {
          name: "Клинический анализ крови",
        },
        {
          name: "Клинический анализ мочи",
        },
        {
          name: "Исследование уровня глюкозы в крови",
        },
        {
          name: "Определение уровня общего холестерина в крови",
        },
        {
          name: "Психофизиологическое обследование",
        },
        {
          name: "Медицинское заключение по приказу МЗ РФ № 749н для атомной",
        },
      ],
    },
    /*  {
      id: 3,
      parentId: 2,
      name: "Service 2.1",
    }, */
  ],
};
