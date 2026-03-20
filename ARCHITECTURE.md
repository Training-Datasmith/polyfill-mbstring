# Architecture: polyfill-mbstring

## Purpose

Provides a pure-PHP fallback for the `mbstring` extension's `mb_*` functions. Enables
multibyte-safe string operations on systems without the `mbstring` extension, using
the native `intl` or PCRE Unicode support as a backing implementation where possible.

## Directory Structure

```
Mbstring.php   # Pure-PHP implementations of mb_* functions as static methods
bootstrap.php  # Defines global mb_* functions if mbstring is absent
Resources/     # Unicode data: character tables, encoding maps used by the polyfill
```

## Key Design Decisions

### Layered Fallback

Functions are implemented using, in order of preference: native mbstring (not used since
this polyfill is only loaded when absent), `intl` (for locale-aware operations), PCRE
with Unicode mode, and raw PHP string manipulation. Coverage varies by function.

### Partial Coverage

Not all `mb_*` functions are fully polyfilled (encoding conversion between arbitrary
encodings is limited). The polyfill covers the most common functions: `mb_strlen`,
`mb_substr`, `mb_strpos`, `mb_strtolower`, `mb_strtoupper`, `mb_convert_encoding`, etc.

## Extension Points

None — drop-in function polyfill.
