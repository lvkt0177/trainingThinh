@extends('layouts.template')

@section('title','Account')

@section('CSS')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')



    <div class="profile-container">
        <div class="profile-header">
            <div class="left">
                <img src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="Profile Image" class="avatar">
                <div class="info">
                    <div class="name">{{$user->first_name}} {{$user->last_name}}</div>
                    <div class="username">{{$user->role}}</div>
                </div>
            </div>
            <a href="{{route('training.profile.edit')}}" class="-edit text-decoration-none"><i class="fas fa-edit"></i> Edit Profile</a>
        </div>

        <div class="profile-info">
            <div class="section">
                <h3>Personal Information</h3>
                <div class="item"><span>Full Name:</span> {{$user->first_name}} {{$user->last_name}}</div>
                <div class="item"><span>Email:</span> {{$user->email}}</div>
                <div class="item"><span>Phone:</span> +123 456 789</div>
                <div class="item"><span>Address:</span> {{$user->address}}</div>
            </div>
        </div>

        <div class="profile-footer">
            <button class="btn"><i class="fas fa-lock"></i> Change Password</button>

            <a href="{{route('training.posts.profile.trash')}}" class="btn"><i class="fa fa-trash" aria-hidden="true"></i> Posts Delete</a>
        </div>
    </div>


@endsection