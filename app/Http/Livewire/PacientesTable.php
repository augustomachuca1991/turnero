<?php

namespace App\Http\Livewire;

use App\Models\Paciente;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class PacientesTable extends Component
{
    use WithPagination, WithFileUploads;

    protected $queryString = [
    	'search' =>['except' => ''],
    	'perPage'=>['except' => 5]
    ];

    public $search = '';
    public $perPage = '5';

    public $photo;

    public $paciente_id,$dni,$name,$email,$foto,$telefono,$domicilio,$anio,$profesion,$estado;
    public $openModal = false;
    public $editMode = false;

    public function render()
    {
        return view('livewire.pacientes-table' , [
        	'pacientes' => Paciente::where('nombre' ,'LIKE' ,"%{$this->search}%")
        						->orWhere('email' ,'LIKE' ,"%{$this->search}%")
        						->paginate($this->perPage)
        ]);
    }

    

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }




    public function modal()
    {
        $this->empty();
        $this->foto = Storage::url('foto-pacientes\default-user.jpg');
        $this->openModal = true;
    }



    public function store()
    {
        $this->validate([
            'foto' => 'image|max:1024', // 1MB Max
        ]);
        $this->foto->store('foto-pacientes');
        Paciente::create([
            'dni' => '36269830',
            'nombre' => $this->name,
            'email' => $this->email,
            'foto_path' => $this->foto,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
            'edad' => $this->anio,
            'ocupacion' => $this->profesion,
            'edad' => $this->anio,
            'estado' => true,
        ]);
        $this->empty();
        $this->closeModal();
    }


    
    public function closeModal()
    {
        $this->openModal = false;
        $this->editMode = false;
        $this->empty();
    }



    public function showModal(Paciente $paciente)
    {
        $this->openModal = !$this->openModal;

    }


    public function editModal(Paciente $paciente)
    {
        $this->openModal = !$this->openModal;
        $this->editMode = !$this->editMode;
        $this->paciente_id = $paciente->id;
        $this->name = $paciente->nombre;
        $this->email = $paciente->email;
        $this->foto = $paciente->foto_path;
        $this->telefono = $paciente->telefono;
        $this->domicilio = $paciente->domicilio;
        $this->anio = $paciente->edad;
        $this->profesion = $paciente->ocupacion;
        $this->estado = true;

    }


    public function update()
    {
        $paciente = Paciente::find($this->paciente_id);
        $paciente->update([
            'dni' => '36269830',
            'nombre' => $this->name,
            'email' => $this->email,
            'foto_path' => $this->foto,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
            'ocupacion' => $this->profesion,
            'edad' => $this->anio,
            'estado' => $this->estado,
            'edad' => $this->anio,
        ]);
        $this->empty();
        $this->closeModal();

    }


    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
    }





    public function getPhoto()
    {
        $this->validate([
            'foto' => 'image|max:1024', // 1MB Max
        ]);

        $path = $this->foto->store('foto-pacientes');
        $this->foto = $path;
    }





    public function empty()
    {
        //limpia las variables
        $this->reset([
            'dni',
            'paciente_id',
            'name',
            'email',
            'foto',
            'telefono',
            'domicilio',
            'anio',
            'profesion',
            'estado',
        ]);
    }
}
