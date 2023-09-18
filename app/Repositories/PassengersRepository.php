<?php 
namespace App\Repositories;

use App\Models\Passengers;

class PassengersRepository
{
    public function storeOrUpdate($request)
    {
        try {
            $cpfNumber = preg_replace('/[^0-9]/', '', $request->cpf);
            $passenger = Passengers::updateOrCreate(
                ['id' => $request->id],
                [
                    'name'      => $request->name,
                    'telephone' => $request->telephone,
                    'email'     => $request->email,
                    'cpf'       => $cpfNumber,
                ]
            );
    
            return $passenger;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function getPassengers()
    {
        $passengers = Passengers::all();
        return $passengers;
    }

    public function getPassenger($id)
    {
        $passenger = Passengers::where('id', $id)->first();
        return $passenger;
    }

    public function deletePassenger($id)
    {
        $passenger = Passengers::where('id', $id)->delete();
        return $passenger;
    }
}