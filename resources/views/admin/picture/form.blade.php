<div class="form-group{{ $errors->has('winner_picture') ? 'has-error' : ''}}">
    {!! Form::label('winner_picture', 'Winner Picture', ['class' => 'control-label']) !!}
    {!! Form::file('winner_picture', ['class' => 'form-control-file']) !!}
    {!! $errors->first('winner_picture', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Upload', ['class' => 'btn btn-primary']) !!}
</div>
