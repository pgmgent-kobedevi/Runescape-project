@extends('admin.layout')

@section('content')
<h1>{{ __('admin.users') }}</h1>
<ul>
    <a class="add button" href="{{ route('admin.register', app()->getLocale())}}">{{__('admin.add')}}</a>
    @foreach($users as $user)
    <div class="user">
        <div class="initial">{{substr($user->name, 0,1)}}</div>
        <div class="infocollection">
            <div class="name">
                <p class="listinfo"><strong>{{$user->name}}</strong><span class="role">@if($user->id == 1) Superuser @endif</span></p>
            </div>
            <div class="userinfo">
                <p class="listinfo"><span class="prefix">Email: </span>{{$user->email}}</p>
                <p class="listinfo"><span class="prefix">{{ __('users.createdAt')}}: </span>{{date('d F Y',  strtotime($user->created_at))}}</p>
            </div>
        </div>
        @if($user->id != 1)
            <div class="buttons">
                <a class="edit button" href="{{ route('homeBanner.edit', [app()->getLocale(), $user->id])}}">{{__('admin.edit')}}</a>
                <a class="delete button" href="{{ route('admin.destroy', ['language' => app()->getLocale(), 'id' => $user->id]) }}">{{__('admin.delete')}}</a>  
            </div>
        @endif
    </div>
    @endforeach
</ul>
@endsection