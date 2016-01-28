<?php
    /**
     * Created by PhpStorm.
     * User: CQC
     * Date: 2015/12/6
     * Time: 16:57
     */
    use Illuminate\Http\Request;


    if (! function_exists('assoc_to_index')) {
        /**
         * Generate a URL to a named route.
         *
         * @param  string $route
         * @param  string $parameters
         * @return string
         */
        function assoc_to_index(array $array)
        {
            if (! (count($array) >= 0)) {
                return [];
            }
            $keys = array_keys($array);
            $item_keys = array_keys($array[array_keys($array)[0]]);
            $result = [];
            foreach ($item_keys as $item_key) {
                foreach ($keys as $key) {
                    $temp[$key] = $array[$key][$item_key];
                }
                array_push($result, $temp);
            }
            return $result;
        }
    }


    if (! function_exists('make_url_para')) {

        /**
         * Generate url by array
         *
         * @param $url
         * @param array|null $array
         * @return string
         */
        function make_url_para($url, array $array = null)
        {
            $url = url($url);
            if ($array) {
                $url .= '?';
                foreach ($array as $key => $value) {
                    $url .= ($key . '=' . $value);
                }
            }
            return $url;
        }
    }

    if (! function_exists('get_url_para')) {

        /**
         * Get parameters like ?foo=bar
         *
         * @param $url
         * @param array|null $array
         * @return string
         */
        function get_url_para(Request $request, $key = null)
        {
            if ($key) {
                return $request->query->get($key);
            }
            return $request->query->all();
        }
    }


    if (! function_exists('is_serialized')) {

        /**
         * If data is serialized.
         * @param $data
         * @return bool
         */
        function is_serialized($str)
        {
            return ($str == serialize(false) || @unserialize($str) !== false);
        }
    }


    if (! function_exists('get_short')) {
        /**
         * Get short content of a string.
         *
         * @param $str_cut
         * @param int $length
         * @return string
         */
        function get_short($string, $length = 30)
        {
            if (mb_strlen($string, 'utf-8') >= $length) {
                return mb_substr($string, 0, $length, 'utf-8') . '...';
            }
            return $string;
        }

    }


    if (! function_exists('is_json')) {
        /**
         * Judge whether the string is json or not.
         *
         * @param $string
         * @return bool
         */
        function is_json($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
    }