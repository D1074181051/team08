<div class="form-group">
    {!! Form::Label('p_name', '古物名稱:') !!}
    {!! Form::text('p_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('dynasty_ID', '朝代:') !!}
    {!! Form::select('dynasty_ID', $dynastys, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('location', '收藏地(所在地):') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('long', '長(以公尺為標準):') !!}
    {!! Form::text('long', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('width', '寬(以公尺為標準):') !!}
    {!! Form::text('width', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
