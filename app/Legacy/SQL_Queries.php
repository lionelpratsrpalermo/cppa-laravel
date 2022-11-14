<?php

namespace App\Legacy;

use Illuminate\Support\Facades\DB;
use Html2Text\Html2Text;

class SQL_queries
{
    function findLastMatch($fieldToFind = '')
    {
        if ($fieldToFind != '') {
            $lastMatch = DB::table('partido')
                ->select($fieldToFind)
                ->orderBy('id', 'desc')
                ->limit(1)
                ->get();
        } else {
            $lastMatch = DB::table('partido')
                ->select('*')
                ->orderBy('id', 'desc')
                ->limit(1)
                ->get();
        }
        return $lastMatch;
    }
}
