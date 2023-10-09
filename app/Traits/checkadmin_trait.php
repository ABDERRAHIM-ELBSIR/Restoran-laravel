<?php

namespace App\Traits;
trait checkAdmin_trait
{
    public function checkadmin(){
        if (auth()->user()->is_admin == 1) {
            // return response;
            return redirect('/');
        }
    }
}