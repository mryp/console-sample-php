<?php
/**
 * サービス全体で使用する便利関数
 */
class AppUtil
{
    /**
     * SJISファイルをUTF8に変換してファイルをオープンする
     * 使用後は fclose() でクローズすること
     */
    public static function fopenConvertUtf8($csvFilePath)
    {
        $buffer = mb_convert_encoding(file_get_contents($csvFilePath), "UTF-8", "sjis-win");
        $fp = tmpfile();
        fwrite($fp, $buffer);
        rewind($fp);
        
        return $fp;
    }
}
