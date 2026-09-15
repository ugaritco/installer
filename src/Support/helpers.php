<?php

namespace Heritage\Filesystem;

if (! function_exists('Heritage\Filesystem\join_paths')) {
    function join_paths($basePath, ...$paths)
    {
        if (function_exists('Illuminate\Filesystem\join_paths')) {
            return \Illuminate\Filesystem\join_paths($basePath, ...$paths);
        }

        foreach ($paths as $index => $path) {
            if (empty($path) && $path !== '0') {
                unset($paths[$index]);
            } else {
                $paths[$index] = DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR);
            }
        }

        return $basePath.implode('', $paths);
    }
}
