<?php

namespace Ugarit\Installer\Console\Support;

class Filesystem
{
    /**
     * Determine if a file or directory exists.
     *
     * @param  string  $path
     * @return bool
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * Delete the file at a given path.
     *
     * @param  string|array<string>  $paths
     * @return bool
     */
    public function delete(string|array $paths): bool
    {
        $paths = is_array($paths) ? $paths : func_get_args();
        $success = true;

        foreach ($paths as $path) {
            try {
                if (@unlink($path)) {
                    clearstatcache(false, $path);
                } else {
                    $success = false;
                }
            } catch (\Throwable) {
                $success = false;
            }
        }

        return $success;
    }
}
