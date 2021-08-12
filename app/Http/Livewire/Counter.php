<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class Counter extends Component
{
    public $trackCode;

    public $resData;

    private function isNull($data)
    {
        return $data === null ? true : false;
    }

    public function fetch_from_api()
    {
        if($this->isNull($this->trackCode))
        {
            return session()->flash('message', 'You need to provide a valid track code');
        }

        $client = new Client();

        $res = $client->post('https://correios.contrateumdev.com.br/api/rastreio', [
            'json' => [
                'code' => $this->trackCode,
                'type' => "LS"
            ]
        ]);

        $jsonData = json_decode($res->getBody()->getContents());
        $this->resData = $jsonData->objeto;

        if(strpos($this->resData['0']->categoria, "ERRO") === false)
        {
            $this->resData = $jsonData->objeto;
        }   
        else
        {
            $this->resData = null;
            return session()->flash('message', 'Track code not correct or invalid! Please retry');
        }    
    }

    public function render()
    {
        return view('livewire.counter');
    }
}