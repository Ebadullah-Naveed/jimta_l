<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class howtomem extends Controller
{
    public function howtomem()
    {
        return view("howtomem");
    }



    public function serviceagent()
    {
        return view("howtoregisterservice");
    }


    public function about()
    {
        return view("about");
    }


    public function jimtaecosystem()
    {
        return view("jimtaecosystem");
    }


    public function jimtacoin()
    {
        return view("jimtacoin");
    }
    public function pvpoint()
    {
        return view("pvpoint");
    }
    public function jimtacoinsdesc()
    {
        return view("jimtacoinsdesc");
    }

    public function shoppingpoints()
    {
        return view("shoppingpoints");
    }


    public function bonuspoint()
    {
        return view("bonuspoint");
    }

    public function referralsystem()
    {
        return view("referralsystem");
    }

    public function servicecenterc()
    {
        return view("servicecenterc");
    }


    public function faq()
    {
        return view("faq");
    }
    public function terms()
    {
        return view("terms");
    }






    public function realstate()
    {
        return view("realstate");
    }
    public function training()
    {
        return view("training");
    }
    public function transport()
    {
        return view("transport");
    }
    public function hotelreservation()
    {
        return view("hotelreservation");
    }

















    public function thecnicalsupport()
    {
        return view("thecnicalsupport");
    }
    public function returnexchange()
    {
        return view("returnexchange");
    }
    public function privacy()
    {
        return view("privacy");
    }
    public function paymentmethod()
    {
        return view("paymentmethod");
    }
}
