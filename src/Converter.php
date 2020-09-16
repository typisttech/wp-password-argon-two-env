<?php

declare(strict_types=1);

namespace TypistTech\WPPasswordArgonTwo\Env;

use Env\Env;

class Converter
{
    public static function run(): void
    {
        self::definePepper();
        self::defineFallbackPeppers();
        self::defineOptions();
    }

    private static function definePepper(): void
    {
        $name = 'WP_PASSWORD_ARGON_TWO_PEPPER';

        $pepper = (string) Env::get($name);

        if (empty($pepper)) {
            throw new InsecureConfigException('Pepper should not be empty');
        }

        define($name, $pepper);
    }

    private static function defineOptions(): void
    {
        $name = 'WP_PASSWORD_ARGON_TWO_OPTIONS';
        $prefix = 'WP_PASSWORD_ARGON_TWO_OPTION';

        $options = [
            'memory_cost' => (int) Env::get($prefix . '_MEMORY_COST'),
            'time_cost' => (int) Env::get($prefix . '_TIME_COST'),
            'threads' => (int) Env::get($prefix . '_THREADS'),
        ];

        $options = array_filter($options);

        define($name, $options);
    }

    private static function defineFallbackPeppers(): void
    {
        $name = 'WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPERS';
        $prefix = 'WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPER_';

        $fallbackPeppers = [];

        $index = 1;
        while (! empty(Env::get($prefix . $index))) {
            $fallbackPeppers[] = (string) Env::get($prefix . $index);
            $index++;
        }

        define($name, $fallbackPeppers);
    }
}
