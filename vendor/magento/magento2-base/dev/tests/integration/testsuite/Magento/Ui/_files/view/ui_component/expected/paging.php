<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
return [
    'arguments' => [
        'data' => [
            'name' => 'data',
            'xsi:type' => 'array',
            'item' => [
                'config' => [
                    'name' => 'config',
                    'xsi:type' => 'array',
                    'item' => [
                        'totalTmpl' => [
                            'name' => 'totalTmpl',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'selectProvider' => [
                            'name' => 'selectProvider',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'options' => [
                            'name' => 'options',
                            'xsi:type' => 'array',
                            'item' => [
                                'anySimpleType' => [
                                    'xsi:type' => 'boolean',
                                    'active' => 'false',
                                    'name' => 'anySimpleType',
                                    'value' => 'false',
                                ],
                            ],
                        ],
                        'pageSize' => [
                            'name' => 'pageSize',
                            'xsi:type' => 'number',
                            'value' => '0',
                        ],
                        'sizesConfig' => [
                            'name' => 'sizesConfig',
                            'xsi:type' => 'array',
                            'item' => [
                                'component' => [
                                    'name' => 'component',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                                'name' => [
                                    'name' => 'name',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                                'storageConfig' => [
                                    'name' => 'storageConfig',
                                    'xsi:type' => 'array',
                                    'item' => [
                                        'provider' => [
                                            'name' => 'provider',
                                            'xsi:type' => 'string',
                                            'value' => 'string',
                                        ],
                                        'namespace' => [
                                            'name' => 'namespace',
                                            'xsi:type' => 'string',
                                            'value' => 'string',
                                        ],
                                        'path' => [
                                            'name' => 'path',
                                            'xsi:type' => 'url',
                                            'param' => [
                                                'string' => [
                                                    'name' => 'string',
                                                    'value' => 'string',
                                                ],
                                            ],
                                            'path' => 'string',
                                        ],
                                        'anySimpleType' => [
                                            'name' => 'anySimpleType',
                                            'xsi:type' => 'string',
                                            'value' => 'string',
                                            'active' => 'false',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'provider' => [
                            'name' => 'provider',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'component' => [
                            'name' => 'component',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'template' => [
                            'name' => 'template',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'sortOrder' => [
                            'name' => 'sortOrder',
                            'xsi:type' => 'number',
                            'value' => '0',
                        ],
                        'displayArea' => [
                            'name' => 'displayArea',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'storageConfig' => [
                            'name' => 'storageConfig',
                            'xsi:type' => 'array',
                            'item' => [
                                'provider' => [
                                    'name' => 'provider',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                                'namespace' => [
                                    'name' => 'namespace',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                                'path' => [
                                    'name' => 'path',
                                    'xsi:type' => 'url',
                                    'param' => [
                                        'string' => [
                                            'name' => 'string',
                                            'value' => 'string',
                                        ],
                                    ],
                                    'path' => 'string',
                                ],
                            ],
                        ],
                        'statefull' => [
                            'name' => 'statefull',
                            'xsi:type' => 'array',
                            'item' => [
                                'anySimpleType' => [
                                    'name' => 'anySimpleType',
                                    'xsi:type' => 'boolean',
                                    'value' => 'true',
                                ],
                            ],
                        ],
                        'imports' => [
                            'name' => 'imports',
                            'xsi:type' => 'array',
                            'item' => [
                                'string' => [
                                    'name' => 'string',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                            ],
                        ],
                        'exports' => [
                            'name' => 'exports',
                            'xsi:type' => 'array',
                            'item' => [
                                'string' => [
                                    'name' => 'string',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                            ],
                        ],
                        'links' => [
                            'name' => 'links',
                            'xsi:type' => 'array',
                            'item' => [
                                'string' => [
                                    'name' => 'string',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                            ],
                        ],
                        'listens' => [
                            'name' => 'listens',
                            'xsi:type' => 'array',
                            'item' => [
                                'string' => [
                                    'name' => 'string',
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                            ],
                        ],
                        'ns' => [
                            'name' => 'ns',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'componentType' => [
                            'name' => 'componentType',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                        'dataScope' => [
                            'name' => 'dataScope',
                            'xsi:type' => 'string',
                            'value' => 'string',
                        ],
                    ],
                ],
                'js_config' => [
                    'name' => 'js_config',
                    'xsi:type' => 'array',
                    'item' => [
                        'deps' => [
                            'name' => 'deps',
                            'xsi:type' => 'array',
                            'item' => [
                                0 => [
                                    'name' => 0,
                                    'xsi:type' => 'string',
                                    'value' => 'string',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'children' => [],
    'uiComponentType' => 'paging',
];
