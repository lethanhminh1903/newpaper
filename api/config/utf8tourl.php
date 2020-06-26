<?php
function utf8tourl($string)
{
    $exp2 = explode(" ", $string);
    $newString = "";
    $sizeOf = sizeof($exp2);
    foreach ($exp2 as $key => $value)
    {
        $exp = str_split(slug($value));
        foreach ($exp as $c)
        {
            if ($c == "�")
            {

            }
            else if ($c == " ")
            {
                $newString .= "-";
            }
            else
            {
                $newString .= slug($c);
            }
        }
        $newString .= "-";
    }
    return substr($newString, 0, strlen($newString) - 1);
}
function slug($string, $options = array())
{
    //Bản đồ chuyển ngữ
    $slugTransliterationMap = array(
        'á' => 'a',
        'à' => 'a',
        'ả' => 'a',
        'ã' => 'a',
        'ạ' => 'a',
        'â' => 'a',
        'ă' => 'a',
        'Á' => 'A',
        'À' => 'A',
        'Ả' => 'A',
        'Ã' => 'A',
        'Ạ' => 'A',
        'Â' => 'A',
        'Ă' => 'A',
        'ấ' => 'a',
        'ầ' => 'a',
        'ẩ' => 'a',
        'ẫ' => 'a',
        'ậ' => 'a',
        'Ấ' => 'A',
        'Ầ' => 'A',
        'Ẩ' => 'A',
        'Ẫ' => 'A',
        'Ậ' => 'A',
        'ắ' => 'a',
        'ằ' => 'a',
        'ẳ' => 'a',
        'ẵ' => 'a',
        'ặ' => 'a',
        'Ắ' => 'A',
        'Ằ' => 'A',
        'Ẳ' => 'A',
        'Ẵ' => 'A',
        'Ặ' => 'A',
        'đ' => 'd',
        'Đ' => 'D',
        'é' => 'e',
        'è' => 'e',
        'ẻ' => 'e',
        'ẽ' => 'e',
        'ẹ' => 'e',
        'ê' => 'e',
        'É' => 'E',
        'È' => 'E',
        'Ẻ' => 'E',
        'Ẽ' => 'E',
        'Ẹ' => 'E',
        'Ê' => 'E',
        'ế' => 'e',
        'ề' => 'e',
        'ể' => 'e',
        'ễ' => 'e',
        'ệ' => 'e',
        'Ế' => 'E',
        'Ề' => 'E',
        'Ể' => 'E',
        'Ễ' => 'E',
        'Ệ' => 'E',
        'í' => 'i',
        'ì' => 'i',
        'ỉ' => 'i',
        'ĩ' => 'i',
        'ị' => 'i',
        'Í' => 'I',
        'Ì' => 'I',
        'Ỉ' => 'I',
        'Ĩ' => 'I',
        'Ị' => 'I',
        'ó' => 'o',
        'ò' => 'o',
        'ỏ' => 'o',
        'õ' => 'o',
        'ọ' => 'o',
        'ô' => 'o',
        'ơ' => 'o',
        'Ó' => 'O',
        'Ò' => 'O',
        'Ỏ' => 'O',
        'Õ' => 'O',
        'Ọ' => 'O',
        'Ô' => 'O',
        'Ơ' => 'O',
        'ố' => 'o',
        'ồ' => 'o',
        'ổ' => 'o',
        'ỗ' => 'o',
        'ộ' => 'o',
        'Ố' => 'O',
        'Ồ' => 'O',
        'Ổ' => 'O',
        'Ỗ' => 'O',
        'Ộ' => 'O',
        'ớ' => 'o',
        'ờ' => 'o',
        'ở' => 'o',
        'ỡ' => 'o',
        'ợ' => 'o',
        'Ớ' => 'O',
        'Ờ' => 'O',
        'Ở' => 'O',
        'Ỡ' => 'O',
        'Ợ' => 'O',
        'ú' => 'u',
        'ù' => 'u',
        'ủ' => 'u',
        'ũ' => 'u',
        'ụ' => 'u',
        'ư' => 'u',
        'Ú' => 'U',
        'Ù' => 'U',
        'Ủ' => 'U',
        'Ũ' => 'U',
        'Ụ' => 'U',
        'Ư' => 'U',
        'ứ' => 'u',
        'ừ' => 'u',
        'ử' => 'u',
        'ữ' => 'u',
        'ự' => 'u',
        'Ứ' => 'U',
        'Ừ' => 'U',
        'Ử' => 'U',
        'Ữ' => 'U',
        'Ự' => 'U',
        'ý' => 'y',
        'ỳ' => 'y',
        'ỷ' => 'y',
        'ỹ' => 'y',
        'ỵ' => 'y',
        'Ý' => 'Y',
        'Ỳ' => 'Y',
        'Ỷ' => 'Y',
        'Ỹ' => 'Y',
        'Ỵ' => 'Y',
        'd' => 'd',
        'đ' => 'd',
        'D' => 'd',
        'Đ' => 'd',
        '?' => '',
        '.' => '',
    );

    //Ghép cài đặt do người dùng yêu cầu với cài đặt mặc định của hàm
    $options = array_merge(array(
        'delimiter' => '-',
        'transliterate' => true,
        'replacements' => array() ,
        'lowercase' => true,
        'encoding' => 'UTF-8'
    ) , $options);

    //Chuyển ngữ các ký tự theo bản đồ chuyển ngữ
    if ($options['transliterate'])
    {
        $string = str_replace(array_keys($slugTransliterationMap) , $slugTransliterationMap, $string);
    }

    //Nếu có bản đồ chuyển ngữ do người dùng cung cấp thì thực hiện chuyển ngữ
    if (is_array($options['replacements']) && !empty($options['replacements']))
    {
        $string = str_replace(array_keys($options['replacements']) , $options['replacements'], $string);
    }

    //Thay thế các ký tự không phải ký tự latin
    $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $string);

    //Chỉ giữ lại một ký tự phân cách giữa 2 từ
    $string = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', trim($string, $options['delimiter']));

    //Chuyển sang chữ thường nếu có yêu cầu
    if ($options['lowercase'])
    {
        $string = mb_strtolower($string, $options['encoding']);
    }

    //Trả kết quả
    return $string;
}
?>