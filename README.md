# SVG Support Module

## Overview

The SVG Support Module allows you to securely upload SVG files to your media library and use them as you would with any other image format in X-Cart 5. This module adds necessary MIME type handling and ensures that SVG files are checked for potential security risks.

## Features

- Support for SVG image uploads.
- Security checks to ensure SVG files are safe.
- Seamless integration with the existing media library.

## Installation

1. **Download the Module:**
   - Ensure you have the `SvgSupport.zip` file containing the module.

2. **Upload the Module:**
   - Upload the `SvgSupport` folder to /modules/Iidev.

3. **Install and Activate the Module:**
   - Click `Install`.
   - Activate the module.

## Usage

Once installed and activated, you can upload SVG files to your media library just like any other image. The module will automatically handle the necessary MIME types and perform security checks to ensure the SVG files are safe.

## Security Checks

The module includes basic checks for potentially harmful elements and attributes in SVG files, such as:

- `<script>` tags
- `<?xml-stylesheet>` declarations
- `<!DOCTYPE>` declarations
- Event handler attributes (e.g., `onclick`)
- `<iframe>`, `<object>`, and `<embed>` tags

