<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoslasticaResurs;
use App\Models\Poslastica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoslasticaController extends BaseController
{
    public function index()
    {
        $poslastice = Poslastica::all();
        return $this->uspesnoOdgovor(PoslasticaResurs::collection($poslastice), 'Vracene su sve poslastice.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'recept' => 'required',
            'vrstaId' => 'required',
            'ukusId' => 'required'
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $poslastica = Poslastica::create($input);

        return $this->uspesnoOdgovor(new PoslasticaResurs($poslastica), 'Nova poslastica je kreirana.');
    }


    public function show($id)
    {
        $poslastica = Poslastica::find($id);
        if (is_null($poslastica)) {
            return $this->greskaOdgovor('Poslastica sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new PoslasticaResurs($poslastica), 'Poslastica sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $poslastica = Poslastica::find($id);
        if (is_null($poslastica)) {
            return $this->greskaOdgovor('Poslastica sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'recept' => 'required',
            'vrstaId' => 'required',
            'ukusId' => 'required'
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $poslastica->naziv = $input['naziv'];
        $poslastica->recept = $input['recept'];
        $poslastica->vrstaId = $input['vrstaId'];
        $poslastica->ukusId = $input['ukusId'];
        $poslastica->save();

        return $this->uspesnoOdgovor(new PoslasticaResurs($poslastica), 'Poslastica je azurirana.');
    }

    public function destroy($id)
    {
        $poslastica = Poslastica::find($id);
        if (is_null($poslastica)) {
            return $this->greskaOdgovor('Poslastica sa zadatim id-em ne postoji.');
        }

        $poslastica->delete();
        return $this->uspesnoOdgovor([], 'Poslastica je obrisana.');
    }
}
