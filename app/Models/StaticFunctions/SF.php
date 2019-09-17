<?php

namespace App\Models\StaticFunctions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SF
{
    public static function getPartUrlForLocalButtons($path, $request){

        $segments = explode('/', $path);
        $get_request = '';

        if(count($request) > 0){
            $get_request = '?';
            $request_array = [];

            foreach ($request as $key => $value){
                $request_array[] = $key.'='.$value;
            }
            $get_request .= implode('&', $request_array);
        }

        if(count($segments) == 1){
            return ''.$get_request;
        }

        $last_segments =  array_values(array_filter($segments, function ($v) {
            return $v != '' && $v != 'ru' && $v != 'ua';
        }));

        $asset_path = implode('/', $last_segments);

        return $asset_path.$get_request;
    }

    // функция для транслитерации
    private static function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            '?' => '',
        );
        return strtr($string, $converter);
    }

    public static function str2url($str) {
        // переводим в транслит
        $str = self::rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "_"
        $str = preg_replace('~[^a-z0-9]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

}
