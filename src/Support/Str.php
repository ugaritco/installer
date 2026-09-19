<?php

namespace Ugarit\Installer\Console\Support;

class Str
{
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|iterable<string>  $needles
     * @return bool
     */
    public static function startsWith(string $haystack, string|iterable $needles): bool
    {
        if (! is_iterable($needles)) {
            $needles = [$needles];
        }

        foreach ($needles as $needle) {
            if ((string) $needle !== '' && str_starts_with($haystack, (string) $needle)) {
                return true;
            }
        }

        return false;
    }
}
