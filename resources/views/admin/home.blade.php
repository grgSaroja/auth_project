
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-5 mb-3 clearfix">
                                        <h2 class="pull-left">Admin </h2>
                                    </div>
                
                                    <table style="border: 2px solid black; height: 200px; width: 500px;" class="table table-bordered table-striped " id="table_id">
                                        <thead style="border: 2px solid black;" >
                                            <tr >
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($datas as $data)
                                        
                                            <tr style="border: 1px solid black;" >
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                
                                            </tr>
                                        @endforeach
                                        </tbody >
                                       
                
                                    </table>
                                
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>