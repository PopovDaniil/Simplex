const blocks = [
  {
    templateName: "card",
    dataKey: "services",
    recursive: true,
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
      console.error(`No handler for block '${name}'`);
      return;
    }

    let data = inputData[block.dataKey];
    if (!data) {
      console.warn(`No data with key ${block.dataKey}`);
    }
    if (block.transform) {
      data = block.transform(data);
    }
    const recursive = block.recursive;

    if (recursive) {
      recursiveRender(element, template, data, null);
    }
  });
}

document.addEventListener("DOMContentLoaded", main);

/**
 * Отрисовывает шаблон, рекурсивно подставляя в него данные из дерева
 * @param {HTMLElement} rootElement DOM-элемент, в котором будет отрисовываться шаблон
 * @param {HTMLElement} template DOM-элемент, содержащий шаблон
 * @param {PlainElement[]} list Дерево с данными
 */
function recursiveRender(rootElement, template, list, parentId) {
  const source = template.innerHTML;
  const compiledTemplate = Handlebars.compile(source);

  const data = list.filter((el) => el.parentId === parentId);
  rootElement.innerHTML = compiledTemplate(data);

  console.log("Rendering", list);
  Array.from(rootElement.children).forEach((childElement) => {
    /** @type {string} */
    const key = childElement.dataset.key;
    if (!key) {
      console.error("Elements must have a unique 'data-key' attribute");
    }
    console.log(`Processing element #${key} parent #${parentId}`);

    const currentElement = list.find((node) => node.id === Number(key));
    console.log("current", currentElement);

    const children = list.filter((el) => el.parentId === currentElement.id)
    const parent = list.find((el) => el.id === currentElement.parentId)
    console.log('children', children);
    console.log('parent', parent);

    if (children.length > 0) {
      childElement.classList.add('clickable');
      childElement.addEventListener("click", () => {
        recursiveRender(
          rootElement,
          template,
          list,
          currentElement.id
        );
      });
    }

    if (parent) {
      const upButton = document.querySelector('.upButton');
      upButton.classList.add('clickable');
      upButton.addEventListener('click', () => recursiveRender(
        rootElement,
        template,
        list,
        parent.parentId
      ))
    }
  });
}
