<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price_image') ? 'has-error' : ''}}">
    {!! Form::label('price_image', 'Price Image', ['class' => 'control-label']) !!}
    {!! Form::file('price_image', ['class' => 'form-control-file']) !!}
    {!! $errors->first('price_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('ads_image') ? 'has-error' : ''}}">
    {!! Form::label('ads_image', 'Ads Image', ['class' => 'control-label']) !!}
    {!! Form::file('ads_image', ['class' => 'form-control-file']) !!}
    {!! $errors->first('ads_image', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group{{ $errors->has('total_joined') ? 'has-error' : ''}}">
    {!! Form::label('total_joined', 'Total Joined', ['class' => 'control-label']) !!}<br />
    {!! Form::text('total_joined', 0, ['disabled'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} / 300
    {!! $errors->first('total_joined', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('winner_id') ? 'has-error' : ''}}">
    {!! Form::label('winner_id', 'Winner Id', ['class' => 'control-label']) !!}<br />
    {!! Form::text('winner_id', 0, ['disabled'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('winner_id', '<p class="help-block">:message</p>') !!}
</div> -->


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
