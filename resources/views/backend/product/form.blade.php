@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => isset($update) ? ['backend.product.update', $model->id] :'backend.product.store', 'method' => 'post']) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Product</div>
            </div>
            @if (count($errors) > 0)
                <div class="col m12">
                    <div class="card-panel red lighten-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('name', $model->name,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('name', 'Product Name', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('type', ['1'=>'Local','2'=>'Impor'], $model->type) !!}
                                    {!! Form::label('type', 'Tipe') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('price', $model->price,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('price', 'Product Price', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('stock', $model->stock,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('stock', 'Product stock', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('berat', $model->berat,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('berat', 'Berat (kg)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('discount', $model->discount == null ? 0: $model->discount,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('discount', 'Discount (%)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::textarea('description', $model->description,['class'=>'materialize-textarea validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('description', 'Description', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('available', ['1'=>'Enable','0'=>'Disable'], $model->available) !!}
                                    {!! Form::label('available', 'Available') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                {!! Form::submit('Submit',['class'=>'waves-effect waves-light btn']) !!}
            </div>

        </div>
    </main>
    {!! Form::close() !!}
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush