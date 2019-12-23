@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row py-5">
    <div class="col-lg-10 offset-lg-1">
        <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
          <div class="contact_info_image"><img src="img/icon/smartphone-call.svg" alt=""></div>
            <div class="contact_info_content">
              <h5>Telefon</h5>
              <div class="contact_info_text">+381 60 123 4567</div>
            </div>
        </div>

        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
          <div class="contact_info_image"><img src="img/icon/email.svg" alt=""></div>
            <div class="contact_info_content">
              <h5>Mail</h5>
              <div class="contact_info_text">mr-music@mail.com</div>
            </div>
        </div>

        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
          <div class="contact_info_image"><img src="img/icon/placeholder.svg" alt=""></div>
            <div class="contact_info_content">
              <h5>Adresa</h5>
              <div class="contact_info_text">Bulevar Dobrog Zvuka 9, Beograd</div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-white">

  <div class="container">
    <div class="row py-5 ">
      <div class="col-lg-10 offset-lg-1">
        <h2 class="pb-3">Kontaktirajte nas</h2>

        {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-md-4">
              {{ Form::bsText('Ime', '', ['placeholder' => 'Vaše ime']) }}
            </div>
            <div class="col-md-4">
              {{ Form::bsText('Email', '', ['placeholder' => 'Vaš e-mail']) }}
            </div>
            <div class="col-md-4">
              {{ Form::bsText('Telefon', '', ['placeholder' => '0xx/xxx-xxx(x)']) }}
            </div>
          </div>
          <div class="row px-3">
            {{ Form::bsTextArea('Poruka', '', array_merge(['class' => 'form-control'],['placeholder' => 'Vaša poruka'],['rows' => 5])) }}
          </div>
          <div class="row pb-3 px-3">
            {{ Form::submit('Pošalji', ['class' => 'btn btn-primary']) }}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
