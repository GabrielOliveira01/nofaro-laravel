<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashs extends Model
{
    protected $table = 'hashs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'input_string',
        'key_found',
        'generated_hash',
        'generated_hash',
        'number_attempts',
    ];

    public static function getHashs($filters)
    {

        /**
         * declare limits
         */
        $offset = 0;
        $limit = 10;
        $number_attempts = '';
        $order = 'desc';

        if(isset($filters['offset'])) {
            $offset = $filters['offset'];
        }

        if(isset($filters['limit'])) {
            $limit = $filters['limit'];
        }

        if(isset($filters['order'])) {
            $order = $filters['order'];
        }

        if(isset($filters['number_attempts'])) {
            $number_attempts = $filters['number_attempts'];
        }

        /**
         * init query
         */

        $hash = self::select(
            'id',
            'input_string',
            'generated_hash',
            'created_at'
        );

        $total = $hash->orderBy('id', $order);
        
        $count_total = $total->get()->count();
        
        $hash->offset($offset)->limit($limit)->orderBy('id', $order)->where('number_attempts', '<=', $number_attempts);

        $count = $hash->get()->count();

        return [
            'total' => $count_total,
            'count' => $count,
            'data' => $hash->get()
        ];

    }
}
