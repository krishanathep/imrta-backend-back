<?php

namespace App\Repositories;

use App\Models\Shoppinglist;

class UserRepository extends BaseRepository {

    public static function myyShoppingList()
    {
        $my_shopping_list = Shoppinglist::where('user_id', auth()->user()->id);

        return $my_shopping_list;
    }

}
