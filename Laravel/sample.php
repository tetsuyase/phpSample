<?php
/**
 * テーブルのカラムリストを取得
 *
 * @param  string  $table_name  カラムリストを取得したいテーブル名
 * @return string
 */
function getColumnList($table_name){
    $columns = \Schema::getColumnListing($table_name);
    return implode($columns, "\n");
}


/**
 * クエリーをログに出力する
 *
 */
\DB::listen(function ($query) {
    \Log::info("Query Time:{$query->time}s] $query->sql");
});
