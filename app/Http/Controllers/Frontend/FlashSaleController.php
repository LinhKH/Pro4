<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::orderBy('created_at', 'DESC')->first();
        $flashSaleItems = FlashSaleItem::where('status', 1)->where('show_at_home', 1)->orderBy('id', 'ASC')->pluck('product_id')->toArray();
        // return view('frontend.pages.flash-sale', compact('flashSaleDate', 'flashSaleItems'));
        return Inertia::render('Home/FlashSale', compact('flashSaleDate', 'flashSaleItems'));
    }
}
