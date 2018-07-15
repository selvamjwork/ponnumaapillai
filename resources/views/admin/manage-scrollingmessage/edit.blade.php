@extends('admin.layout.home')

@section('title') Admin Scrolling Message Edit @endsection

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
                            <h3 class="card-title">Edit Scrolling Message</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($scrollingmessage, ['method' => 'PATCH','url' => ['/admin/scrollingmessage', $scrollingmessage->id],'files' => true ]) !!}
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('scrolling_message') ? ' has-error' : '' }}">
                                    <label for="scrolling_message">Edit Scrolling Message </label>
                                    {!! Form::text('scrolling_message', null, ['placeholder'=>'Edit Scrolling Message ','class' => 'form-control']) !!}
                                    @if ($errors->has('scrolling_message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('scrolling_message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Edit Scrolling Message</button>
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