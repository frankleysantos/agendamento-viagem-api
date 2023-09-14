<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class IbgeController extends Controller
{
    public function states()
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        return $response->collect();
    }

    public function cities($state_id)
    {
        $response = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$state_id}/municipios");
        return $response->collect();
    }

    public function storeState() 
    {
        $states = $this->states();

        $state = $states->map(function ($state) {
            return [
                "id" => $state['id'],
                "name" => $state['nome'],
                "uf" => $state['sigla'],
            ];
        });

        $response = States::insert($state->toArray());
        return response()->json($response);
    }

    public function storeCities()
    {
        $states = $this->states();
        foreach ($states as $state) {
            $cities = $this->cities($state['id'])->map(function ($citie) use ($state){
                return [
                    "id" => $citie['id'],
                    "name" => $citie['nome'],
                    "state_id" => $state['id'],
                ];
            });
            Cities::insert($cities->toArray());
        }

        return response()->json('Cidades inseridas com sucesso');
    }
}
