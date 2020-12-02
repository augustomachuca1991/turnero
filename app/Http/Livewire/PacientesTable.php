<?php

namespace App\Http\Livewire;

use App\Models\Paciente;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
//use Illuminate\Support\Facades\Storage;


class PacientesTable extends Component
{
    use WithPagination, WithFileUploads;

    protected $queryString = [
    	'search' =>['except' => ''],
    	'perPage'=>['except' => 5]
    ];

    public $search = '';
    public $perPage = 5;

    public $photo_preview = '';

    public $paciente_id,$dni,$name,$email,$foto,$telefono,$domicilio,$anio,$profesion,$estado;
    public $openModal = false;
    public $editMode = false;
    public $readOnly = false;

    public function render()
    {
        return view('livewire.pacientes-table' , [
        	'pacientes' => Paciente::where('nombre' ,'LIKE' ,"%{$this->search}%")
        						->orWhere('email' ,'LIKE' ,"%{$this->search}%")
                                ->latest()
        						->paginate($this->perPage)

        ]);
    }

    

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
    }




    public function modal()
    {
        $this->empty();
        $this->openModal = true;
    }



    public function updatedPhoto()
    {
        $this->validate([
            'foto' => 'image|max:1024', // 1MB Max
            'photo_preview' => 'image|max:1024', // 1MB Max
        ]);
    }



    public function store()
    {
        $this->validate([
            'dni' => 'required|integer|digits_between:7,8',
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'domicilio' => 'required',
            'anio' => 'required|integer',
            'profesion' => 'required',
        ]);
        $filePath = $this->foto->store('profile-photos', 'public');
        $paciente = new Paciente();
        $paciente->dni = $this->dni;
        $paciente->nombre = $this->name;
        $paciente->email = $this->email;
        $paciente->telefono = $this->telefono;
        $paciente->edad = $this->anio;
        $paciente->ocupacion = $this->profesion;
        $paciente->domicilio = $this->domicilio;
        $paciente->profile_photo_path = $filePath;
        $paciente->estado = true;
        $paciente->save();
        $this->closeModal();
    }


    
    public function closeModal()
    {
        $this->empty();
        $this->openModal = false;
        $this->editMode = false;
        $this->readOnly = false;
    }



    public function showModal(Paciente $paciente)
    {
        $this->openModal = !$this->openModal;
        $this->editMode = !$this->editMode;
        $this->readOnly = !$this->readOnly;
        $this->paciente_id = $paciente->id;
        $this->name = $paciente->nombre;
        $this->dni = $paciente->dni;
        $this->email = $paciente->email;
        $this->foto = $paciente->profile_photo_url;
        $this->telefono = $paciente->telefono;
        $this->domicilio = $paciente->domicilio;
        $this->anio = $paciente->edad;
        $this->profesion = $paciente->ocupacion;
        $this->estado = true;

    }


    public function editModal(Paciente $paciente)
    {
        $this->openModal = !$this->openModal;
        $this->editMode = !$this->editMode;
        $this->paciente_id = $paciente->id;
        $this->name = $paciente->nombre;
        $this->dni = $paciente->dni;
        $this->email = $paciente->email;
        $this->foto = $paciente->profile_photo_url;
        $this->telefono = $paciente->telefono;
        $this->domicilio = $paciente->domicilio;
        $this->anio = $paciente->edad;
        $this->profesion = $paciente->ocupacion;
        $this->estado = true;

    }


    public function update()
    {
        $this->validate([
            'dni' => 'required|integer|digits_between:7,8',
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'anio' => 'required|integer',
            'profesion' => 'required',
            'domicilio' => 'required',
        ]);
        $filePath_edit = $this->photo_preview->store('profile-photos', 'public');
        $paciente_edit = Paciente::find($this->paciente_id);
        $paciente_edit->dni = $this->dni;
        $paciente_edit->nombre = $this->name;
        $paciente_edit->email = $this->email;
        $paciente_edit->telefono = $this->telefono;
        $paciente_edit->edad = $this->anio;
        $paciente_edit->ocupacion = $this->profesion;
        $paciente_edit->domicilio = $this->domicilio;
        $paciente_edit->profile_photo_path = $filePath_edit;
        $paciente_edit->estado = true;
        $paciente_edit->save();
        $this->closeModal();

    }


    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
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
            'photo_preview'
        ]);
    }
}
