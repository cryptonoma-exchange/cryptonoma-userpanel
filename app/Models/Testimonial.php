<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'bitcoinx_testimonial';

      
    public static function edit($id)
    {
        $faq = Testimonial::where('id',$id)->first(); 

        return $faq;
    }
}
