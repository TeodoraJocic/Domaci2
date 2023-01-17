<?php

namespace App\Http\Controllers;

use App\Http\Resources\VrstaResurs;
use App\Models\Vrsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VrstaController extends BaseController
{
    public function index()
    {
        $vrste = Vrsta::all();
        return $this->uspesnoOdgovor(VrstaResurs::collection($vrste), 'Vracene su sve vrste.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vrsta' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $vrsta = Vrsta::create($input);

        return $this->uspesnoOdgovor(new VrstaResurs($vrsta), 'Nova vrsta je kreirna.');
    }


    public function show($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greskaOdgovor('Vrsta sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new VrstaResurs($vrsta), 'Vrsta sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greskaOdgovor('Vrsta sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vrsta' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $vrsta->vrsta = $input['vrsta'];
        $vrsta->save();

        return $this->uspesnoOdgovor(new VrstaResurs($vrsta), 'Vrsta je azurirana.');
    }

    public function destroy($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greskaOdgovor('Vrsta sa zadatim id-em ne postoji.');
        }

        $vrsta->delete();
        return $this->uspesnoOdgovor([], 'Vrsta je obrisana.');
    }
}
