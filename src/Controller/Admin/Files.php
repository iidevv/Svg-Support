<?php

namespace Iidev\SvgSupport\Controller\Admin;

use XCart\Extender\Mapping\Extender;

/**
 * @Extender\Mixin
 */
class Files extends \XLite\Controller\Admin\Files
{
    protected function checkFile($file)
    {
        if (
            $file
            && \XLite\Core\Request::getInstance()->is_image
            && !$file->isImage()
            && !(
                $file instanceof \XLite\Model\TemporaryFile
                && $file->isURL()
            )
            && !$this->isSVG($file)
        ) {
            $file->removeFile();
            $this->sendResponse(null, static::t('File is not an image'));
        }

        if ($this->isSVG($file) && !$this->isSafeSVG($file)) {
            $file->removeFile();
            $this->sendResponse(null, static::t('Unsafe SVG file'));
        }
    }

    protected function isSVG($file)
    {
        return $file && $file->getMime() === 'image/svg+xml';
    }

    protected function isSafeSVG($file)
    {
        $svgContent = file_get_contents($file->getStoragePath());

        // Basic checks for potentially harmful elements and attributes
        $unsafePatterns = [
            '/<script\b[^>]*>(.*?)<\/script>/is',  // Check for <script> tags
            '/<\?xml-stylesheet\b[^>]*>/is',      // Check for XML stylesheets
            '/<!DOCTYPE\b[^>]*>/is',              // Check for DOCTYPE declarations
            '/on\w+=\s*["\']?[^"\']*["\']?/is',   // Check for event handler attributes
            '/<iframe\b[^>]*>(.*?)<\/iframe>/is', // Check for <iframe> tags
            '/<object\b[^>]*>(.*?)<\/object>/is', // Check for <object> tags
            '/<embed\b[^>]*>(.*?)<\/embed>/is',   // Check for <embed> tags
        ];

        // Check for unsafe patterns
        foreach ($unsafePatterns as $pattern) {
            if (preg_match($pattern, $svgContent)) {
                return false;
            }
        }

        return true;
    }
}
