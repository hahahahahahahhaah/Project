<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show()
    {
        $lokasiList = [
            'perumahan graha arradea' => 'Perumahan Graha Arradea',
            'perumahan arta bina' => 'Perumahan Arta Bina',
            'perumahan bogor alam asri' => 'Perumahan Bogor Alam Asri',
            'perumahan bumi kartika dramaga raya' => 'Perumahan Bumi Kartika Dramaga Raya',
            'perumahan the manzil' => 'Perumahan The Manzil',
            'perumahan salak view' => 'Perumahan Salak View',
            'ciherang kaum' => 'Ciherang Kaum',
            'ciherang stamplas' => 'Ciherang Stamplas',
            'ciherang hegarsari' => 'Ciherang Hegarsari',
            'margajaya' => 'Margajaya',
            'sukawening' => 'Sukawening',
            'laladon' => 'Laladon',
        ];

        return view('form.lokasi', compact('lokasiList'));
    }


    public function store(Request $request)
    {
        $lokasiID = $request->input('lokasi_pemasangan');
        $lokasiList = [
            'perumahan graha arradea' => 'Perumahan Graha Arradea',
            'perumahan arta bina' => 'Perumahan Arta Bina',
            'perumahan bogor alam asri' => 'Perumahan Bogor Alam Asri',
            'perumahan bumi kartika dramaga raya' => 'Perumahan Bumi Kartika Dramaga Raya',
            'perumahan the manzil' => 'Perumahan The Manzil',
            'perumahan salak view' => 'Perumahan Salak View',
            'ciherang kaum' => 'Ciherang Kaum',
            'ciherang stamplas' => 'Ciherang Stamplas',
            'ciherang hegarsari' => 'Ciherang Hegarsari',
            'margajaya' => 'Margajaya',
            'sukawening' => 'Sukawening',
            'laladon' => 'Laladon',
        ];

        if (array_key_exists($lokasiID, $lokasiList)) {
            session(['lokasi_pemasangan' => $lokasiList[$lokasiID]]);
        }

        return redirect()->route('datadiri');
    }
}
