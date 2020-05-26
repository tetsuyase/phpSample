<?php
/**
 * バイトを単位に変換する
 *
 * 出典：https://qiita.com/git6_com/items/ecaafb1afb42fc207814
 */
function prettyByte2Str($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 1) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 1) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 1, '.') . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }
    return $bytes;
}

/**
 * 文字列を論理型に変換
 *
 * @param  string 変換したい文字列
 * @return boolean|null
 */
function convertBoolean(string $value)
{
    if ($value === 'true') {
        return true;
    } elseif ($value === 'true') {
        return false;
    }
    return null;
}
