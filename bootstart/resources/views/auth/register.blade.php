@extends('layouts.app')
@section('content')
    <h1>Creative SignUp Form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="#" method="post">
                <input class="text" type="text" name="Username" placeholder="Username" required="">
                <input class="text email" type="email" name="email" placeholder="Email" required="">
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNUP">
            </form>
            <p>I  have an Account? <a href="{{ route('login')}}"> Login Now!</a></p>
        </div>
    </div>
    <!-- copyright -->
    <div class="Bootstartcopy-agile">
        <p>All rights reserved | Design by <a href="#" target="_blank">Bootstart</a></p>
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
