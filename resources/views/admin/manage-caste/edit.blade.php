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
                            {!! Form::model($caste, ['method' => 'PATCH','url' => ['/admin/caste', $caste->id],'files' => true ]) !!}
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="caste_name">Edit Caste </label>
                                    {!! Form::text('caste_name', null, ['placeholder'=>'Edit Caste ','class' => 'form-control']) !!}
                                    @if ($errors->has('caste_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caste_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Edit Caste</button>
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