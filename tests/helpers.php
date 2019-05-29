<?php

namespace NorseBlue\Xmlify\Tests;

use NorseBlue\Xmlify\Tests\Exceptions\AssetPathNotFoundException;

if (!function_exists('asset_file_get_contents')) {
    /**
     * Get the contents of an asset file.
     *
     * @param string $file File path relative to the test asset folder
     *
     * @return string
     */
    function asset_file_get_contents(string $file): string
    {
        $path = asset_path($file);

        if (!file_exists($path)) {
            throw new AssetPathNotFoundException($path);
        }

        return file_get_contents($path);
    }
}

if (!function_exists('fixture_path')) {
    /**
     * Get the path to the test fixture appended with the given path.
     *
     * @param string $path
     *
     * @return string
     */
    function asset_path(string $path = ''): string
    {
        return test_path('Fixtures') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('test_path')) {
    /**
     * Get the test path appended with the given path.
     *
     * @param string $path
     *
     * @return string
     */
    function test_path($path = ''): string
    {
        return __DIR__ . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
