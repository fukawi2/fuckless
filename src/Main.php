<?php

/*
 * Copyright (c) 2022 Phillip Smith. All rights reserved.
 * This work is licensed under the terms of the MIT license.
 */

declare(strict_types=1);
namespace Fukawi2\Fuckless;

class Fuckless {

  const badWords = [
    'arse',
    'arsehole',
    'asshole',
    'cunt',
    'fuck',
  ];

  /*
   * Search a string for listed bad words.
   * Currently does not search for word boundaries, so will find bad words embedded in other words
   * This is both a bug and a feature: we don't have to list every variant of "fuck", "fuckwit" etc
   * but we may accidentally match words like "anal" in "analysis".
   */
  public static function hasBadWords(string $text) {
    if (!$text)
      return null;

    $regex = "(" . implode("|",array_map("preg_quote", self::badWords)) . ")i";
    if (preg_match($regex, $text, $foundMatches)) {
      # Oh noes, bad words!
      return $foundMatches;
    }

    return false;
  }

  public static function censorText(string $text) {
    if (!$text)
        return $text;

    // TODO
  }

}
