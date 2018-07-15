@extends('admin.layout.home')

@section('title') Admin Caste Edit @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit Caste</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($subcaste, ['method' => 'PATCH','url' => ['/admin/sub-caste', $subcaste->id],'files' => true ]) !!}
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('caste_id') ? ' has-error' : '' }}">
                                    <label for="caste_id">Edit Caste Name</label>
                                    {!! Form::select('caste_id', $casteArray, null, ['class' => 'form-control','placeholder'=>'Select Caste']) !!}
                                    {!! $errors->first('caste_id', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group{{ $errors->has('subcaste_name') ? ' has-error' : '' }}">
                                    <label for="subcaste_name">Edit Sub Caste </label>
                                    {!! Form::text('subcaste_name', null, ['placeholder'=>'Edit Caste ','class' => 'form-control']) !!}
                                    @if ($errors->has('subcaste_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subcaste_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Edit Sub Caste</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection