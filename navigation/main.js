const blocks = [
    {
        templateName: 'card',
        dataKey: 'services',
        // handler: (template) => template,
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

            const source = template.innerHTML
            const content = Handlebars.compile(source)(data);
            if (!content) {
                console.warn(`Template '${name}' does not generate anything`);
            }

            element.innerHTML = content;

            if (element.classList.contains('openChildren')) {
                Array.from(element.children).forEach((e) => {
                    const key = e.dataset.key
                    if (!key) {
                        console.error('Elements must have a unique \'data-key\' attribute');
                    }

                    e.addEventListener('click', () => {
                        const nestedData = data[key]
                        const children = nestedData.children

                        const source = template.innerHTML
                        const content = Handlebars.compile(source)(children);
                        if (!content) {
                            console.warn(`Template '${name}' does not generate anything`);
                        }

                        element.innerHTML = content;
                    })

                })
            }
        }
    )
})
