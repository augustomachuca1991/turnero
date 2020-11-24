<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-hover table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Direccion</th>
                            <th>País</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tr>
                        <td>Normann</td>
                        <td>Ohrmann</td>
                        <td>69</td>
                        <td>Trainstation 12</td>
                        <td>US</td>
                        <td class="text-center">
                            <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-open"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                    
                    <tr class="table-warning">
                        <td>Harald</td>
                        <td>Herrmann</td>
                        <td>30</td>
                        <td>Medrano 1346</td>
                        <td>Argentina</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                     <tr class="table-danger">
                        <td>John</td>
                        <td>Hames</td>
                        <td>3</td>
                        <td>Street 10</td>
                        <td>US</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>John</td>
                        <td>Hames</td>
                        <td>13</td>
                        <td>House 11a</td>
                        <td>China</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                    <tr class="info">
                        <td>Marash</td>
                        <td>IMKiddingMaisBalalMasifo</td>
                        <td>56</td>
                        <td>Hill 11</td>
                        <td>India</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Normann</td>
                        <td>Ohrmann</td>
                        <td>69</td>
                        <td>Trainstation 12</td>
                        <td>US</td>
                        <td class="text-center">
                            <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-open"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                    
                    <tr class="table-warning">
                        <td>Harald</td>
                        <td>Herrmann</td>
                        <td>30</td>
                        <td>Medrano 1346</td>
                        <td>Argentina</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                     <tr class="table-danger">
                        <td>John</td>
                        <td>Hames</td>
                        <td>3</td>
                        <td>Street 10</td>
                        <td>US</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>John</td>
                        <td>Hames</td>
                        <td>13</td>
                        <td>House 11a</td>
                        <td>China</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                    <tr class="info">
                        <td>Marash</td>
                        <td>IMKiddingMaisBalalMasifo</td>
                        <td>56</td>
                        <td>Hill 11</td>
                        <td>India</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Normann</td>
                        <td>Ohrmann</td>
                        <td>69</td>
                        <td>Trainstation 12</td>
                        <td>US</td>
                        <td class="text-center">
                            <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-open"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                    
                    <tr class="table-warning">
                        <td>Harald</td>
                        <td>Herrmann</td>
                        <td>30</td>
                        <td>Medrano 1346</td>
                        <td>Argentina</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                     <tr class="table-danger">
                        <td>John</td>
                        <td>Hames</td>
                        <td>3</td>
                        <td>Street 10</td>
                        <td>US</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>John</td>
                        <td>Hames</td>
                        <td>13</td>
                        <td>House 11a</td>
                        <td>China</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                    
                    <tr class="info">
                        <td>Marash</td>
                        <td>IMKiddingMaisBalalMasifo</td>
                        <td>56</td>
                        <td>Hill 11</td>
                        <td>India</td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-open"></span>
                            <span class="glyphicon glyphicon-edit"></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<style type="text/css">
    @media (max-width:768px) {
      /* removing table display */
      .table, .table thead, .table th, .table tbody, .table tr, .table td {
            display: block;
        }

        .table {
            overflow: hidden;
            position: relative;
        }
      
      /* place the header on the left */
        .table thead {
            width: 50%;
        }
      
      
        .table thead ~ /* make tbody absolute if there is a thead */
        tbody { /* place the body on the right and make it scrollable */
            position: absolute;
            top: 0px;
            left: 50%;
            bottom: 0px;
            width: 50%;
            overflow-y: auto;
            overflow-x: hidden; 
        }

      /* remove unnecessary borders */
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td,
    .table > tbody > tr:last-child {
            border: none;
        }
      
      /* add borders for every "row" */
        .table > tbody > tr {
            border-bottom: 1px solid #DDD;
        }

      
      /* ensure fields have a one line height or cut them else */
        .table > tbody > tr > td,
        .table > thead > tr > th {
            text-align: left;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
    }
</style>