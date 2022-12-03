const inputData = {
    services: [
            {
                name: 'Service 1',
                children: [],
            },
            {
                name: 'Service 2',
                children: [
                    {
                        name: 'Service 2.1'
                    },
                ],
            },
            {
                name: 'Service 3',
                children: [
                    {
                        name: 'Service 3.1'
                    },
                    {
                        name: 'Service 3.2',
                        children: [
                            {
                                name: 'Service 3.2.1'
                            }
                        ]
                    },
                ]
            },
        ]
}
