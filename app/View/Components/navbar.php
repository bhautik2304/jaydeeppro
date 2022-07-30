<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\cart;
class navbar extends Component
{
    public $style;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($style)
    {
        //
        $this->style=$style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (session()->get('login')==true) {
            # code...
            $cartdata=[
                "product"=>cart::where("userid",session()->get('user')['id'])
                               ->with('menu')
                               ->get(),
                "cart_totale"=>cart::where("userid",session()->get('user')['id'])->sum('totale_price'),
            ];
        }else {
            # code...
            $cartdata=[
                "product"=>[],
                "cart_totale"=>0,
            ];
        }
        return view('components.navbar',["cartdata"=>$cartdata]);
    }
}
