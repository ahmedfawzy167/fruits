<?php

use App\Models\Cart;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

if (!function_exists('get_default_lang')) {
    function get_default_lang()
    {
        return Config::get('app.local');
    }
}

if (!function_exists('dotted_string')) {
    function dotted_string(string $name): string
    {
        if ($name === '') {
            return $name;
        }

        $base = str_replace(['[', ']'], ['.', ''], $name);
        if ($base[strlen($base) - 1] === '.') {
            return substr($base, 0, -1);
        }

        return $base;
    }
}

if (!function_exists('get_current_lang')) {
    function get_current_lang(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('uploadMedia')) {
    function uploadMedia($name, $files, ?Model $model, $clearMedia = true)
    {
        if ($clearMedia) {
            $model?->clearMediaCollection($name);
        }
        if (is_array($files)) {
            foreach ($files as $file) {
                if ($file instanceof UploadedFile) {
                    $model->addMedia($file)->toMediaCollection($name);
                }
            }
        }
        if ($files instanceof UploadedFile) {
            $model->addMedia($files)->toMediaCollection($name);
        }
    }
}

if (!function_exists('load_mem')) {
    function load_mem($select = null, $mem_hide = null)
    {
        $members = Member::get();
        $mem_arr = [];
        foreach ($members as $member) {
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            if ($select !== null && $select === $member->id) {
                $list_arr['state'] = [
                    'opened'   => true,
                    'selected' => true,
                    'disabled' => false,

                ];
            }
            if ($mem_hide !== null && $mem_hide === $member->id) {
                $list_arr['state'] = [
                    'opened'   => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden'   => true,
                ];
            }
            $list_arr['id'] = $member->id;
            $list_arr['parent'] = $member->parent_id !== null ? $member->parent_id : '#';
            $list_arr['text'] = $member->name;
            array_push($mem_arr, $list_arr);
        }

        return json_encode($mem_arr, JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('get_parent')) {
    function get_parent($parent_id)
    {
        $mem = Member::find($parent_id);
        if ($mem->parent_id !== null && $mem->parent_id > 0) {
            return get_parent($mem->parent_id) . ',' . $parent_id;
        }

        return $parent_id;
    }
}

if (!function_exists('getSetting')) {
    function getSetting()
    {
        return Setting::first();
    }
}

if (!function_exists('setting')) {
    function setting($key)
    {
        return data_get(Setting::first(), $key);
    }
}

if (!function_exists('priceAfterCom')) {
    function priceAfterCom($price): float|int
    {
        $setting = getSetting()->zakat + getSetting()->tax + getSetting()->site_commission;

        return (1 + $setting / 100) * $price;
    }
}

if (!function_exists('priceBeforeCom')) {
    function priceBeforeCom($price): float|int
    {
        $setting = getSetting()->zakat + getSetting()->tax + getSetting()->site_commission;

        return $price / (1 + $setting / 100);
    }
}

// Active Guard Function
if (!function_exists('activeGuard')) {
    function activeGuard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}





function settings()
{
    $setting = Setting::first();
    return $setting;
}
function cartGet()
{
    if (Auth::check()) {
     $cartGet = Cart::where('user_id', Auth::user()->id)->count();
    return $cartGet;
    }
}

function wishlistGet()
{
    if (Auth::check()) {
    $wishlistGet = Wishlist::where('user_id', Auth::user()->id)->count();
    return $wishlistGet;
    }
}
