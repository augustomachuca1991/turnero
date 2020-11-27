<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


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

    public $paciente_id,$name,$email,$foto,$telefono,$domicilio,$anio,$profesion,$estado;
    public $openModal = false;
    public $editMode = false;

    public function render()
    {
        return view('livewire.pacientes-table' , [
        	'pacientes' => User::where('name' ,'LIKE' ,"%{$this->search}%")
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
        $this->openModal = true;
    }



    public function store()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $this->empty();
        $this->cancelar();
    }


    
    public function closeModal()
    {
        $this->openModal = false;
        $this->editMode = false;
    }



    public function showModal(User $paciente)
    {
        $this->openModal = !$this->openModal;

    }


    public function editModal(User $paciente)
    {
        $this->openModal = !$this->openModal;
        $this->editMode = !$this->editMode;
        $this->paciente_id = $paciente->id;
        $this->name = $paciente->name;
        $this->email = $paciente->email;
        $this->foto = $paciente->profile_photo_url;
        $this->telefono = '+543794327084';
        $this->domicilio = 'Loreto 5493';
        $this->anio = '28';
        $this->profesion = 'Ingeniero en Infrestructura';
        $this->estado = true;

    }


    public function update()
    {
        $paciente = User::find($this->paciente_id);
        $paciente->update([
            'name' => $this->name,
            'email' => $this->email,
            'profile_photo_path' => $this->foto,
        ]);
        $this->cancelar();

    }


    public function destroy(User $paciente)
    {
        $paciente->delete();
    }





    public function getPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $path = $this->photo->store('profile-photos');
        $this->foto = $path;
    }





    public function empty()
    {
        //limpia las variables
        $this->reset([
            'paciente_id',
            'name',
            'email',
            'foto',
            'telefono',
            'domicilio',
            'anio',
            'profesion',
            'estado'
        ]);
    }
}
