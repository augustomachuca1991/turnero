

<div>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Lista de Pacientes') }}
      </h2>
   </x-slot>
   {{-- Success is as dangerous as failure. --}}
   <!-- modal-->
   @if ($openModal)
   <div class="fixed z-10 inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
         <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
         </div>
         <!-- This element is to trick the browser into centering the modal contents. -->
         <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
         @if($editMode)
         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
               <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                     <!-- Heroicon name: user-edit -->
                     <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                     </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                     <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        Editar Datos {{$name}}
                     </h3>
                     <div class="mt-2">
                        <div class="px-4 py-5 bg-white sm:p-6 rounded border-gray-50 shadow">
                           <div class="grid grid-cols-6 gap-6">
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="full_name" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                 <input wire:model="name" type="text" id="full_name" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                                 <input wire:model="telefono" type="phone" id="phone" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-4">
                                 <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                 <input wire:model="email" type="text" id="email_address" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                                 <select id="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                 </select>
                              </div>
                              <div class="col-span-6">
                                 <label for="domicilio" class="block text-sm font-medium text-gray-700">Domicilio</label>
                                 <input wire:model="domicilio" type="text" id="domicilio" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 inline-block">
                                 <label for="Foto" class="block text-sm font-medium text-gray-700">Foto</label>
                                 <img wire-model="foto" class="my-1 inline-block h-15 w-15 rounded-full overflow-hidden" src="{{$foto}}" alt="...">
                                 <input type="file" class="w-full bg-white border py-2 px-3 border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
               <button wire:click="update" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                  </svg>
                  &nbsp;Guardar Cambios
               </button>
               <button wire:click="closeModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
               Cancelar
               </button>
            </div>
         </div>
         @else
         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
               <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                     <!-- Heroicon name: user-plus -->
                     <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                     </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                     <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        Datos del nuevo paciente
                     </h3>
                     <div class="mt-2">
                        <div class="px-4 py-5 bg-white sm:p-6 rounded border-gray-50 shadow">
                           <div class="grid grid-cols-6 gap-6">
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="full_name" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                 <input wire:model="name" type="text" id="full_name" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                                 <input wire:model="telefono" type="phone" id="phone" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-4">
                                 <label for="email_address" class="block text-sm font-medium text-gray-700">Correo Electronico</label>
                                 <input wire:model="email" type="text" id="email_address" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-3">
                                 <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                                 <select id="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                 </select>
                              </div>
                              <div class="col-span-6">
                                 <label for="domicilio" class="block text-sm font-medium text-gray-700">Domicilio</label>
                                 <input wire:model="domicilio" type="text" id="domicilio" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                              </div>
                              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                 <label for="city" class="block text-sm font-medium text-gray-700">Foto</label>
                                 <span class="mt-2 inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                       <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                 </span>
                                 <button  type="button" class="bg-white border py-2 px-3 border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                 Cambiar
                                 </button>
                              </div>
                              <div class="col-span-6 sm:col-span-3 lg:col-span-4">
                                 <label for="state" class="block text-sm font-medium text-gray-700">Cover photo</label>
                                 <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                       <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                       </svg>
                                       <p class="text-sm text-gray-600">
                                          <button type="file" class="bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                          Upload a file
                                          </button>
                                          or drag and drop
                                       </p>
                                       <p class="text-xs text-gray-500">
                                          PNG, JPG, GIF up to 10MB
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
               <button wire:click="store" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                  </svg>
                  &nbsp;Guardar
               </button>
               <button wire:click="closeModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
               Cancelar
               </button>
            </div>
         </div>
         @endif
      </div>
   </div>
   @endif
   <!--end modal-->
   <main class="mt-5 mx-auto max-w-7xl px-4 sm:mt-6 sm:px-6 md:mt-8 lg:mt-10 lg:px-8 xl:mt-12">
      <div class="sm:text-center lg:text-left">
         <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="roundedshadow">
               <button wire:click="modal" class="modal-open bg-transparent border border-gray-500 hover:border-blue-500 text-gray-500 hover:text-blue-500 font-bold py-2 px-4 rounded-full">
               + Nuevo paciente
               </button>
            </div>
         </div>
      </div>
   </main>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="flex bg-white px-4 py-3 sm:px-6">
                           <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-500" type="text" name="" placeholder="Buscar...">
                           <div class="form-input rounded-md shadow-sm mt-1 ml-6 block">
                              <select wire:model="perPage"  class="bg-white outline-none text-gray-500 text-sm">
                                 <option value="5"> 5 por página</option>
                                 <option value="10"> 10 por página</option>
                                 <option value="15"> 15 por página</option>
                                 <option value="25"> 25 por página</option>
                                 <option value="50"> 50 por página</option>
                                 <option value="100"> 100 por página</option>
                              </select>
                           </div>
                           @if($search !== '')
                           <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block hover:bg-gray-100">
                              <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                              </svg>
                           </button>
                           @endif
                        </div>
                        @if($pacientes->count())
                        <table class="min-w-full divide-y divide-gray-200">
                           <thead>
                              <tr>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Direccíón
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Años
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Telefono
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Profesión
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                 </th>
                                 <th scope="col" class="px-6 py-3 bg-gray-50">
                                    <span class="sr-only">Edit</span>
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($pacientes as $paciente)
                              <tr>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                       <div class="flex-shrink-0 h-10 w-10">
                                          <img class="h-10 w-10 rounded-full" src="{{$paciente->profile_photo_url}}" alt="{{$paciente->name}}">
                                       </div>
                                       <div class="ml-4">
                                          <div class="text-sm font-medium text-gray-900">
                                             {{$paciente->name}}
                                          </div>
                                          <div class="text-sm text-gray-500">
                                             {{$paciente->email}}
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                    <div class="text-sm text-gray-500">Optimization</div>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    26
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    +5493794327084
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Administrativo
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                    </span>
                                 </td>
                                 <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                 	<div class="inline-flex">
                                    <a wire:click="editModal({{$paciente}})" href="#" class="text-yellow-300 hover:text-yellow-500">
                                    	<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    	</svg>
                                	</a>
                                	<a wire:click="showModal({{$paciente}})" href="#" class="text-blue-300 hover:text-blue-500">
                                    	<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    	</svg>
                                	</a>
                                	<a wire:click="destroy({{$paciente}})" href="#" class="text-red-300 hover:text-red-500">
                                    	<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    	</svg>
                                	</a>
                                	</div>
                                 </td>
                              </tr>
                              @endforeach
                              <!-- More rows... -->
                           </tbody>
                        </table>
                        <!---paginations-->
                        <div class="bg-white px-4 py-3 border-gray-200 sm:px-6">
                           {{ $pacientes->links()}}
                        </div>
                        @else
                        <div class="bg-white px-4 py-3 border-gray-200  text-gray-500 sm:px-6">
                           No hay resultado para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

