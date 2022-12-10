const inputData = {
    services: [
        {
            id: 1,
            name: 'Service 1',
            parentId: null,
        },
        {
            id: 2,
            name: 'Service 2',
            parentId: null,
        },
        {
            id: 3,
            parentId: 2,
            name: 'Service 2.1'
        },
        {
            id: 4,
            parentId: null,
            name: 'Service 3',
        },
        {
            id: 5,
            name: 'Service 3.1',
            parentId: 4,
        },
        {
            id: 6,
            name: 'Service 3.2',
            parentId: 4,
        },
        {
            id: 7,
            name: 'Service 3.2.1',
            parentId: 6,
        },
        {
            id: 8,
            name: 'Service 4',
            parentId: null,
        },
    ]
}
