<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => null,
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => null,
            'dev_requirement' => false,
        ),
        'dg/dibi' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'dibi/dibi' => array(
            'pretty_version' => 'v5.0.2',
            'version' => '5.0.2.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../dibi/dibi',
            'aliases' => array(),
            'reference' => '97053089e05eadab4c368ad37619adf411b2847e',
            'dev_requirement' => false,
        ),
    ),
);
