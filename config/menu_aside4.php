<?php
// Aside menu

//SIN ROLES NI USUARIOS
return [

    'items' => [
        // Control
        [
            'title' => 'Control de acceso a aulas',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/control',
            'new-tab' => false,
        ],

        [
            'section' => 'Procesos',
        ],
        [
            'title' => 'Contratos',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
        ],
        [
            'title' => 'Pagos',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'page'=>'/pago',
            'root' => true,
        ],
        [
            'section' => 'Registros',
        ],
        [
            'title' => 'Asistencia',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
        ],
        [
            'title' => 'Alumnos',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'page' => '/alumno',
            'root' => true,
        ],
        [
            'title' => 'Cobros',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'page' => '/cobro',
            'root' => true,
        ],
        [
            'title' => 'Plan',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => '/plan',
            'bullet' => 'line',
            'root' => true,
        ],
        [
            'title' => 'Grupos',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => '/grupo',
            'bullet' => 'line',
            'root' => true,
        ],
        [
            'title' => 'Cursos',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => '/curso',
            'bullet' => 'line',
            'root' => true,
        ],

    ]
];
