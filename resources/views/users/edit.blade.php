@extends('dashboard.dashboard')

@section('dashboard-content')
  <h4>Vaš profil</h4><hr>

    <form class="" action="{{ route('admin.updateUser')}}" method="post">
      @csrf
      <input type="text" name="id" value="{{$user->id}}" hidden>
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Ime</label>
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="phone">Telefon</label>
                      <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Adresa</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="new_password">Nova šifra</label>
                    <input type="password" class="form-control" name="new_password" value="">
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="new_password_confirm">Potvrda šifre</label>
                      <input type="password" class="form-control" name="new_password_confirm" value="">
                    </div>
                </div>
                <div class="col-sm-6">
                  <label for="is_admin">Uloga</label>
                  <select class="form-control" name="is_admin">
                    @if($user->is_admin)
                      <option value="{{$user->is_admin}}">ADMIN</option>
                      <option value="0">KORISNIK</option>
                    @else
                      <option value="{{$user->is_admin}}">KORISNIK</option>
                      <option value="1">ADMIN</option>
                    @endif
                  </select>
                </div>
                <div class="col-sm-6">
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                      <input type="Submit" type="button" class="form-control btn btn-primary" value="Sačuvaj Izmene">
                    </div>
                </div>
              </div>

    </form>

@endsection
