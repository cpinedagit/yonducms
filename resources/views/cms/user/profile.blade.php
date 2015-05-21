@extends('cms.home')

@section('content')

<div class='main-container__content__title'>
    <h2>My Profile</h2>
    <div class="row">
       <div class="col-sm-11 my-profile">
            {!! HTML::link('cms/user/update','Update Profile', array('class' => 'btn btn-add pull-left')) !!}            
            {!! Form::button('changepass', array('class' => 'btn btn-reset pull-right', 'data-toggle' => 'modal', 'data-target' => '#changepassword')) !!}
                        
       </div>
   </div>
</div>
	
@stop