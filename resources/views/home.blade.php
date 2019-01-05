@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <section>
              <?php $users = App\User::get(); ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span style="padding-right: 10px;width: 100px;display: inline-block;">نام</span>
                            <span style="padding-right: 10px;width: 250px;display: inline-block;">ایمیل</span>
                            <span>وضعیت</span>
                        </li>
                        @foreach ($users as $user)
                       <li class="list-group-item">
                           <span style="padding-right: 10px;width: 100px;display: inline-block;">{{$user->name}}</span>
                            <span style="padding-right: 10px;width: 250px;display: inline-block;">{{$user->email}}</span>
                            
                            <span>@if($user->isOnLine()) <span style="color:green">online</span>   @else <span style="color:red">ofline</span> @endif</span>
                       </li>
                        @endforeach
                    </ul>

          </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
