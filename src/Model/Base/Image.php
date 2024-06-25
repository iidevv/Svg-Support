<?php

namespace Iidev\SvgSupport\Model\Base;

use XCart\Extender\Mapping\Extender;
/**
 * @Extender\Mixin
 */
class Image extends \XLite\Model\Base\Image
{
    protected static $types = [
        'image/jpeg'          => 'jpeg',
        'image/jpg'           => 'jpg',
        'image/gif'           => 'gif',
        'image/xpm'           => 'xpm',
        'image/gd'            => 'gd',
        'image/gd2'           => 'gd2',
        'image/wbmp'          => 'bmp',
        'image/bmp'           => 'bmp',
        'image/x-ms-bmp'      => 'bmp',
        'image/x-windows-bmp' => 'bmp',
        'image/png'           => 'png',
        'image/webp'          => 'webp',
        'image/svg+xml'       => 'svg'
    ];

    protected static $extendedTypes = [
        'application/ico'          => 'ico',
        'image/ico'                => 'ico',
        'image/icon'               => 'ico',
        'image/vnd.microsoft.icon' => 'ico',
        'image/x-ico'              => 'ico',
        'image/x-icon'             => 'ico',
        'text/ico'                 => 'ico',
        'image/svg+xml'            => 'svg'
    ];
}