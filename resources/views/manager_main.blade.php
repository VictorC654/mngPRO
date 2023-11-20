    @extends('layout.layout')
    @section('content')
    <div style="
        box-shadow:0px 15px 20px 3px rgb(34, 40, 49);
    display:block;width:80em;height:30em;background-color:rgb(34, 40, 49);border-radius:25px;padding:3em;">
        <div style="display:flex;font-size:2em;color:white;">
            What does
            <div class="bg-warning" style="color:whitesmoke;font-size:.7em;margin: -.2em .5em 0 .5em;letter-spacing:.1em;padding:.5em;font-weight:bold;border-radius:.5em;">mngPRO</div>
            do?
        </div>
            <p class="mt-2" style="color:lightgray;font-size:1em;">
                    <b>mngPRO</b> is a personal project that I am developing for my brother , so he can more easily
                    track his work and analyze his profits, amount of work and more.<br>
            </p>
        <p style="color:lightgray;font-size:1em;">
            So far, I have added a couple functionalities: <br>
           <b> - The Manage Videos page, </b> where a user can add , delete records of videos , add clients, manage and see client statistics.<br>
            <b>- The Tasks page, </b> a simple task managing page, where you can update tasks as you complete them.
        </p>
    </div>
    @endsection
