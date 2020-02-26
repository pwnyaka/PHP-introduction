<?php
define("ALPHABET", [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
]);

function translate($str) {
    $result = '';
    for ($i = 0; $i <= mb_strlen($str); $i++) {
        if (mb_strtolower(mb_substr($str, $i, 1)) !== mb_substr($str, $i, 1)) {
            if (ALPHABET[mb_strtolower(mb_substr($str, $i, 1))] === null) {
                $result .= mb_substr($str, $i, 1);
            } else {
                $result .= mb_strtoupper(ALPHABET[mb_strtolower(mb_substr($str, $i, 1))]);
            }
        } else {
            if (ALPHABET[mb_substr($str, $i, 1)] === null) {
                $result .= mb_substr($str, $i, 1);
            } else {
                $result .= ALPHABET[mb_substr($str, $i, 1)];
            }
        }

    }
    return change_space($result);
}

function change_space($str) {
    return str_replace(" ", "_", $str) . "<br>";
}

echo translate("ПрИвеТ мИр!");
echo translate("Как Ваши дела?!");
echo translate("Очень длинная и сложная строка, объединяемая в URL-подобный вид");