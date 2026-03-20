<?php

declare(strict_types=1);

/**
 * Example: Multibyte string operations with polyfill-mbstring.
 *
 * Install:
 *   composer require symfony/polyfill-mbstring
 *
 * The mb_* functions handle multibyte characters correctly, unlike their str_* counterparts.
 */

// Count Unicode characters, not bytes
$str = "Héllo Wörld";
echo mb_strlen($str);         // 11 (characters)
echo strlen($str);            // 14 (bytes — different because of UTF-8 encoding)

// Uppercase/lowercase preserving multibyte characters
echo mb_strtoupper("héllo"); // HÉLLO
echo mb_strtolower("HÉLLO"); // héllo

// Substring by character position
echo mb_substr("naïve", 0, 3); // naï (not "naÃ" as strlen would give)

// Find character position
$pos = mb_strpos("naïve", "ï"); // 2

// Convert encoding
$utf8 = mb_convert_encoding($str, 'UTF-8', 'ISO-8859-1');
