const blocks = [
  {
    templateName: "services",
    dataKey: "services",
    // recursive: true,
  },
];

function main() {
  const templates = document.querySelectorAll("script.template");
  if (templates.length === 0) {
    console.warn("Page does not have templates");
  }

  const renderPlaces = document.querySelectorAll(".render");
  if (renderPlaces.length === 0) {
    console.warn("Page does not have render places");
  }

  renderPlaces.forEach((element) => {
    const name = element.getAttribute("name");
    if (!name) {
      console.error(`Render place must have a 'name' attribute`);
      return;
    }

    const template = Array.from(templates).find((temp) => temp.id === name);
    if (!template) {
      console.error(`No template for block '${name}'`);
      return;
    }

    const block = blocks.find((block) => block.templateName === name);
    if (!block) {
      console.warn(`No handler for block '${name}'`);
      return;
    }

    let data = inputData[block.dataKey];
    if (!data) {
      console.warn(`No data with key ${block.dataKey}`);
    }
    const recursive = block.recursive;

    if (recursive) {
      recursiveRender(element, template, data, null);
    } else {
      render(element, template, data);
    }
  });
}

document.addEventListener("DOMContentLoaded", main);

/**
 * Отрисовывает шаблон
 * @param {HTMLElement} rootElement DOM-элемент, в котором будет отрисовываться шаблон
 * @param {HTMLElement} template DOM-элемент, содержащий шаблон
 * @param {Record<string, any>} data Данные в виде объекта
 */
function render(rootElement, template, data) {
  const source = template.innerHTML;
  const compiledTemplate = Handlebars.compile(source);

  rootElement.innerHTML = compiledTemplate(data);
console.log('Rendered', data);
  const links = document.querySelectorAll(".link");
  links.forEach((link) => {
    const rootElement = link.dataset.target;
    const template = link.dataset.template;
    const data = link.dataset.contentKey;
    const key = link.dataset.key;

    link.onclick = () => linkHandler(rootElement, template, data, key);
  });

  
  document
    .querySelectorAll(".link")
    .forEach((el) =>
      el.addEventListener("mousedown", () => el.classList.add("clicked"))
    );
  document
    .querySelectorAll(".link")
    .forEach((el) =>
      el.addEventListener("mouseup", () => el.classList.remove("clicked"))
    );
}

/**
 * Обрабатывает переход по ссылке
 * @param {string} rootElementName Название элемента, в котором будет отрисовываться шаблон
 * @param {string} templateId ID, элемента, содержащего шаблон
 * @param {string} dataPath Путь к данным
 * @param {number} key Ключ элемента внутри массива данных
 */
function linkHandler(rootElementName, templateId, dataPath, key) {
  const rootElement = document.querySelector(`[name=${rootElementName}]`);
  const template = document.querySelector(`script.template#${templateId}`);
  const dataList = dataPath ? inputData[dataPath] : inputData;
  const data = (Array.isArray(dataList) && key) ? dataList.find(el => el.id.toString() === key) : dataList;
  render(rootElement, template, data);
}
