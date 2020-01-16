<?hh // strict
/*
 *  Copyright (c) 2004-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HH\Lib\Str;

use namespace HH\Lib\{_Private, C, Keyset};

/**
 * Returns the string with the first character capitalized.
 *
 * If the first character is already capitalized or isn't alphabetic, the string
 * will be unchanged.
 *
 * - To capitalize all characters, see `Str\uppercase()`.
 * - To capitalize all words, see `Str\capitalize_words()`.
 */
<<__RxLocal>>
function capitalize(
  string $string,
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \ucfirst($string);
}

/**
 * Returns the string with all words capitalized.
 *
 * Words are delimited by space, tab, newline, carriage return, form-feed, and
 * vertical tab by default, but you can specify custom delimiters.
 *
 * - To capitalize all characters, see `Str\uppercase()`.
 * - To capitalize only the first character, see `Str\capitalize()`.
 */
<<__RxLocal>>
function capitalize_words(
  string $string,
  string $delimiters = " \t\r\n\f\v",
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \ucwords($string, $delimiters);
}

/**
 * Returns a string representation of the given number with grouped thousands.
 *
 * If `$decimals` is provided, the string will contain that many decimal places.
 * The optional `$decimal_point` and `$thousands_separator` arguments define the
 * strings used for decimals and commas, respectively.
 */
<<__Pure>>
function format_number(
  num $number,
  int $decimals = 0,
  string $decimal_point = '.',
  string $thousands_separator = ',',
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \number_format(
    (float) $number,
    $decimals,
    $decimal_point,
    $thousands_separator,
  );
}

/**
 * Returns the string with all alphabetic characters converted to lowercase.
 */
<<__Pure>>
function lowercase(
  string $string,
): string {
  /* HH_FIXME[4200] PHPStdLib HHI is not marked Rx */
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \strtolower($string);
}

/**
 * Returns the string padded to the total length by appending the `$pad_string`
 * to the left.
 *
 * If the length of the input string plus the pad string exceeds the total
 * length, the pad string will be truncated. If the total length is less than or
 * equal to the length of the input string, no padding will occur.
 *
 * To pad the string on the right, see `Str\pad_right()`.
 */
<<__Pure>>
function pad_left(
  string $string,
  int $total_length,
  string $pad_string = ' ',
): string {
  invariant($pad_string !== '', 'Expected non-empty pad string.');
  invariant($total_length >= 0, 'Expected non-negative total length.');
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \str_pad($string, $total_length, $pad_string, \STR_PAD_LEFT);
}

/**
 * Returns the string padded to the total length by appending the `$pad_string`
 * to the right.
 *
 * If the length of the input string plus the pad string exceeds the total
 * length, the pad string will be truncated. If the total length is less than or
 * equal to the length of the input string, no padding will occur.
 *
 * To pad the string on the left, see `Str\pad_left()`.
 */
<<__Pure>>
function pad_right(
  string $string,
  int $total_length,
  string $pad_string = ' ',
): string {
  invariant($pad_string !== '', 'Expected non-empty pad string.');
  invariant($total_length >= 0, 'Expected non-negative total length.');
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \str_pad($string, $total_length, $pad_string, \STR_PAD_RIGHT);
}

/**
 * Returns the input string repeated `$multiplier` times.
 *
 * If the multiplier is 0, the empty string will be returned.
 */
<<__Pure>>
function repeat(
  string $string,
  int $multiplier,
): string {
  invariant($multiplier >= 0, 'Expected non-negative multiplier');
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \str_repeat($string, $multiplier);
}

/**
 * Returns the "haystack" string with all occurrences of `$needle` replaced by
 * `$replacement`.
 *
 * - For a case-insensitive search/replace, see `Str\replace_ci()`.
 * - For multiple case-sensitive searches/replacements, see `Str\replace_every()`.
 * - For multiple case-insensitive searches/replacements, see `Str\replace_every_ci()`.
 */
<<__Pure>>
function replace(
  string $haystack,
  string $needle,
  string $replacement,
): string {
  /* HH_FIXME[4200] Rx calling non-Rx */
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \str_replace($needle, $replacement, $haystack);
}

/**
 * Returns the "haystack" string with all occurrences of `$needle` replaced by
 * `$replacement` (case-insensitive).
 *
 * - For a case-sensitive search/replace, see `Str\replace()`.
 * - For multiple case-sensitive searches/replacements, see `Str\replace_every()`.
 * - For multiple case-insensitive searches/replacements, see `Str\replace_every_ci()`.
 */
<<__Pure>>
function replace_ci(
  string $haystack,
  string $needle,
  string $replacement,
): string {
  /* HH_FIXME[4200] Rx calling non-rx */
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  return \str_ireplace($needle, $replacement, $haystack);
}

/**
 * Returns the "haystack" string with all occurrences of the keys of
 * `$replacements` replaced by the corresponding values.
 *
 * - For a single case-sensitive search/replace, see `Str\replace()`.
 * - For a single case-insensitive search/replace, see `Str\replace_ci()`.
 * - For multiple case-insensitive searches/replacements, see `Str\replace_every_ci()`.
 */
<<__Pure>>
function replace_every(
  string $haystack,
  KeyedContainer<string, string> $replacements,
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  /* HH_FIXME[4200] Rx calling non-rx */
  return \str_replace(
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    \array_keys($replacements),
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    \array_values($replacements),
    $haystack,
  );
}

/**
 * Returns the "haystack" string with all occurrences of the keys of
 * `$replacements` replaced by the corresponding values (case-insensitive).
 *
 * - For a single case-sensitive search/replace, see `Str\replace()`.
 * - For a single case-insensitive search/replace, see `Str\replace_ci()`.
 * - For multiple case-sensitive searches/replacements, see `Str\replace_every()`.
 */
<<__Pure>>
function replace_every_ci(
  string $haystack,
  KeyedContainer<string, string> $replacements,
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  /* HH_FIXME[4200] Rx calling non-rx */
  return \str_ireplace(
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    \array_keys($replacements),
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    \array_values($replacements),
    $haystack,
  );
}

/**
 * Returns the "haystack" string with all occurrences of the keys of
 * `$replacements` replaced by the corresponding values.
 *
 * Once a substring has been replaced, its new value will not be searched
 * again.
 *
 * - For having new values searched again, see `Str\replace_every()`.
 */
<<__Rx>>
function replace_every_nonrecursive(
  string $haystack,
  KeyedContainer<string, string> $replacements,
): string {
  invariant(
    !C\contains_key($replacements, ''),
    'Expected non-empty keys only.',
  );

  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  /* HH_FIXME[4200] Rx calling non-rx */
  return \strtr($haystack, $replacements);
}

/**
 * Returns the "haystack" string with all occurrences of the keys of
 * `$replacements` replaced by the corresponding values (case-insensitive).
 *
 * Once a substring has been replaced, its new value will not be searched
 * again.
 *
 * - For having new values searched again, see `Str\replace_every_ci()`.
 */
<<__Rx>>
function replace_every_nonrecursive_ci(
  string $haystack,
  KeyedContainer<string, string> $replacements,
): string {
  invariant(
    !C\contains_key($replacements, ''),
    'Expected non-empty keys only.',
  );

  $haystack_lc = lowercase($haystack);

  $keys_lc = keyset[];
  $replacements_lc = dict[];
  foreach ($replacements as $key => $value) {
    $key_lc = lowercase($key);
    if (!C\contains($keys_lc, $key_lc)) {
      $keys_lc[] = $key_lc;
      $replacements_lc[$key_lc] = $value;
    }
  }

  $key_lengths = Keyset\map($keys_lc, ($key) ==> length($key))
    |> Keyset\sort($$, ($key1, $key2) ==> -($key1 <=> $key2));

  $output = '';
  for ($pos = 0; $pos < length($haystack); ) {
    $found_match_at_pos = false;
    foreach ($key_lengths as $key_length) {
      $possible_match = slice($haystack_lc, $pos, $key_length);
      $replacement = $replacements_lc[$possible_match] ?? null;
      if ($replacement is nonnull) {
        $found_match_at_pos = true;
        $output .= $replacement;
        $pos += $key_length;
        break;
      }
    }

    if (!$found_match_at_pos) {
      $output .= $haystack[$pos];
      $pos++;
    }
  }

  return $output;
}

function reverse(string $string): string {
  for ($lo = 0, $hi = namespace\length($string) - 1; $lo < $hi; $lo++, $hi--) {
    $temp = $string[$lo];
    $string[$lo] = $string[$hi];
    $string[$hi] = $temp;
  }
  return $string;
}

/**
 * Return the string with a slice specified by the offset/length replaced by the
 * given replacement string.
 *
 * If the length is omitted or exceeds the upper bound of the string, the
 * remainder of the string will be replaced. If the length is zero, the
 * replacement will be inserted at the offset.
 *
 * Previously known in PHP as `substr_replace`.
 */
<<__Pure>>
function splice(
  string $string,
  string $replacement,
  int $offset,
  ?int $length = null,
): string {
  invariant($length === null || $length >= 0, 'Expected non-negative length.');
  $offset = _Private\validate_offset($offset, length($string));
  return $length === null
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    ? \substr_replace($string, $replacement, $offset)
    /* HH_FIXME[2049] calling stdlib directly */
    /* HH_FIXME[4107] calling stdlib directly */
    : \substr_replace($string, $replacement, $offset, $length);
}

/**
 * Returns the given string as an integer, or null if the string isn't numeric.
 */
<<__Pure>>
function to_int(
  string $string,
): ?int {
  if ((string)(int)$string === $string) {
    return (int)$string;
  }
  return null;
}

/**
 * Returns the string with all alphabetic characters converted to uppercase.
 */
<<__Pure>>
function uppercase(
  string $string,
): string {
  /* HH_FIXME[2049] calling stdlib directly */
  /* HH_FIXME[4107] calling stdlib directly */
  /* HH_FIXME[4200] Rx calling non-rx */
  return \strtoupper($string);
}
