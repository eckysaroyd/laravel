@extends('layouts.app')
@section('content')
    <h1>Creative SignUp Form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="#" method="post">
                <input class="text email" type="email" name="email" placeholder="Email" required="">
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="Login">
            </form>
            <p>Don't have an Account? <a href="#"> Register Now!</a></p>
        </div>
    </div>
    <!-- copyright -->
    <div class="Bootstartcopy-agile">
        <p>All rights reserved | Design by <a href="{{ route('register')}}" target="_blank">Bootstart</a></p>
    </div>
    <!-- //copyright -->
    <ul class="Bootstart-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
@endsection
