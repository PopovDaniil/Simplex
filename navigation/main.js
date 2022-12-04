const blocks = [
    {
        templateName: 'card',
        dataKey: 'services',
        recursive: true,
    },
]

document.addEventListener('DOMContentLoaded', () => {
    const templates = document.querySelectorAll('script.template');
    if (templates.length === 0) {
        console.warn('Page does not have templates')
    }

    const renderPlaces = document.querySelectorAll('.render');
    if (renderPlaces.length === 0) {
        console.warn('Page does not have render places');
    }

    renderPlaces.forEach(
        (element) => {
            const name = element.getAttribute('name');
            if (!name) {
                console.error(`Render place must have a 'name' attribute`);
                return;
            }

            const template = Array.from(templates)
                .find((temp) => temp.id === name)
            if (!template) {
                console.error(`No template for block '${name}'`);
                return;
            }

            const block = blocks.find((block) => block.templateName === name)
            if (!block) {
                console.error(`No handler for block '${name}'`);
                return;
            }

            const data = inputData[block.dataKey]
            if (!data) {
                console.warn(`No data with key ${block.dataKey}`);
            }
            const recursive = block.recursive

            render(element, template, data, recursive)
        }
    )
})

/**
 * Отрисовывает шаблон, подставляя в него данные
 * @param {HTMLElement} element Элемент, в котором будет отрисовываться шаблон
 * @param {HTMLElement} template Элемент, содержащий шаблон
 * @param {Record<string, any>} data Данные, которые будут вставлены в шаблон
 * @param {boolean} recursive Рекурсивная отрисовка
 * @param {Record<string, any> | undefined} parent указание на родителя (для рекурсивной отрисовки)
 */
function render(element, template, data, recursive, parent) {
    const source = template.innerHTML
    const content = Handlebars.compile(source)(data);
    element.innerHTML = content;

    console.log('Rendered', data);
    if (recursive) {
        Array.from(element.children).forEach((e) => {
            const key = e.dataset.key
            if (!key) {
                console.error('Elements must have a unique \'data-key\' attribute');
            }

            const nestedData = data[key]
            const parent = data;
            const children = nestedData.children ?? []
            if (children.length === 0) { return; }

            e.style.cursor = 'pointer';
            console.log('Event handler added on', e);
            console.log('Parent', parent, 'children', children);
            e.addEventListener('click', () => render(element, template, children, recursive, parent))
        })

        if (parent) {
            const toRoot = document.querySelector('.toRoot');
            toRoot.style.cursor = 'pointer';
            toRoot.addEventListener('click', () => render(element, template, parent, recursive))
        }
    }
}
