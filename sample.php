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
 * 文字列のtrueとfalseを論理型に変換
 *
 * クエリーパラメーターで送られてきた文字列のtrueとfalseを
 * 論理型に変換したい時に使う
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

/**
 * スネークケースをローワーキャメルケースに変換する
 *
 * @param  string 変換したい文字列
 * @return string
 */
function convertSnakeCaseToLowerCamelCase($snake_case)
{
    $convert_list = str_split($snake_case);

    // 大文字変換フラグ
    $uppercase_flg = false;

    // ローワーキャメルケースに変換
    foreach ($convert_list as $key => $value){
        if($uppercase_flg === true){
            $convert_list[$key] = strtoupper($convert_list[$key]);

            // 次の文字列は、変換の必要がないため
            $uppercase_flg = false;
        }

        if($value === '_'){
            // 「-」の次の文字列は大文字にする必要があるので、フラグをtrueにする
            $uppercase_flg = true;

            // 「-」は不要なので削除
            unset($convert_list[$key]);
        }
    };
    return implode($convert_list);
}