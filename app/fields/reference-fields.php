<?php

namespace App;

add_action('acf/init', function () {
    acf_add_local_field_group([
        'key' => 'group_reference_fields',
        'title' => 'Referenzdetails',
        'fields' => [
            [
                'key' => 'field_project_name',
                'label' => 'Projektname',
                'name' => 'project_name',
                'type' => 'text',
            ],
            [
                'key' => 'field_project_location',
                'label' => 'Projektort',
                'name' => 'project_location',
                'type' => 'text',
            ],
            [
                'key' => 'field_project_year',
                'label' => 'Ausführungszeitraum',
                'name' => 'project_year',
                'type' => 'text',
            ],
            [
                'key' => 'field_construction_type',
                'label' => 'Bauweise',
                'name' => 'construction_type',
                'type' => 'textarea',
            ],
            [
                'key' => 'field_wood_types',
                'label' => 'Verarbeitete Holzarten',
                'name' => 'wood_types',
                'type' => 'textarea',
            ],
            [
                'key' => 'field_eco_timber_services',
                'label' => 'Eco-Timber-Leistungen',
                'name' => 'eco_timber_services',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Leistung hinzufügen',
                'sub_fields' => [
                    [
                        'key' => 'field_service_type',
                        'label' => 'Typ',
                        'name' => 'service_type',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_service_desc',
                        'label' => 'Beschreibung',
                        'name' => 'service_desc',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'key' => 'field_contractor',
                'label' => 'Ausführende Firma',
                'name' => 'contractor',
                'type' => 'text',
            ],
            [
                'key' => 'field_planning_office',
                'label' => 'Holzplanung',
                'name' => 'planning_office',
                'type' => 'text',
            ],
            [
                'key' => 'field_architecture',
                'label' => 'Architektur',
                'name' => 'architecture',
                'type' => 'text',
            ],
            [
                'key' => 'field_gallery',
                'label' => 'Galerie',
                'name' => 'gallery',
                'type' => 'gallery',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'reference',
                ],
            ],
        ],
    ]);
});
