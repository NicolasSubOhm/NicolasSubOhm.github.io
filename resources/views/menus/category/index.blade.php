@extends('adminlte::page')

{{--@section('title', 'SubOhmPOS')--}}

@section('content_header')
    <h1 class="m-0 text-dark">Categorías</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col py-2">
                        <x-adminlte-button label="Categoría" theme="primary" icon="fas fa-plus"/>
                    </div>
                    <div class="col-12">
                    {{-- Setup data for datatables --}}
                    @php
                        $heads = [
                            'ID',
                            'Categoría',
                            ['label' => 'Sub-Categorías', 'width' => 30],
                            ['label' => 'Actions', 'no-export' => true],
                        ];

                        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>';
                        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                          <i class="fa fa-lg fa-fw fa-trash"></i>
                                      </button>';
                        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                           <i class="fa fa-lg fa-fw fa-eye"></i>
                                       </button>';

                        $config = [
                            'order' => [[1, 'asc']],
                            'columns' => [null, null, null, ['orderable' => false]],
                        ];

                        $categoriesData = array();

                        foreach ($categories as $category) {
                            $categoriesData[] = [
                                $category->category_id,
                                $category->category_name,
                                $category->category_name,
                                $btnEdit.$btnDelete.$btnDetails,
                            ];
                        }

                        $config['data'] = $categoriesData;

                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                                          striped hoverable bordered compressed/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
