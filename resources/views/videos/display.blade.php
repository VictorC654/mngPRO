@extends('layout.layout')

@section('style')

    <style>
        .pageControl
        {
            margin-top:-10em;
            width:140vh;
            margin-bottom:4em;
            border-bottom:.2em solid rgb(34, 40, 49);
            box-shadow: rgb(34, 40, 49);
            color:white;
            padding:.7em;
            display:flex;
            flex-direction: row;
            align-items: center;
        }
        .videoTable {
            box-shadow:0px 15px 20px 3px rgb(34, 40, 49);
            background-color: rgb(34, 40, 49);
            width:140vh;
            border-radius:.5em;
        }
        .videoTable thead {
            border-bottom:.15em solid rgb(255, 211, 105);
        }
        .videoTable th {
            font-size:1.5em;
            color:white;
            padding:.65em;
        }
        .videoTable td {
            color:white;
            padding:1.1em;
            border-bottom:.15em solid rgb(57, 62, 70);
        }
        .manageClientsTable
        {
            background-color:transparent;
            width:70vh;
            border:none;
        }
        .manageClientsTable th
        {
            font-size:.9em;
            font-weight:bold;
            color:white;
            border-bottom:.15em solid rgb(255, 211, 105);
            padding:.9em;
        }
        .manageClientsTable td
        {
            border-bottom:.15em solid rgb(57, 62, 70);
            padding:1em;
        }
        .deleteButton
        {
            display:flex;
            justify-content: center;
            background:RGB(238,114,114);
            color:lightgray;
            padding:.6em;
            border-radius:.8em;
            transition:.5s all ease;
            width:3.5em;
        }
        .deleteButton:hover
        {
            color:white;
            background:#DC4C64;
            transition:.5s all ease;
        }
        .updateTaskButton
        {
            color:white;
            text-decoration: none;
            font-size:1.1em;
            padding:1em;
            transition: all .5s ease;
            cursor:pointer;
            background:rgb(34, 40, 49);
            border:none;
            outline:none;
            border-radius:1em;
        }
        .updateTaskButton:hover
        {
            color:rgb(255, 211, 105) !important;
            transition:all .5s ease;
        }
        .addButton
        {
            background-color:rgb(57, 62, 70);
            color:white;
            padding:.8em;
            margin-left:-.5em;
            width:6em;
            border-bottom-right-radius: .5em .5em;
            transition:.5s all ease;
            border-top-right-radius: .5em .5em;
        }
        .addButton:hover
        {
            background:white;
            color:black;
            transition:.5s all ease;
        }
        .cancelButton
        {
            transition:.5s all ease;
            background-color:rgb(57, 62, 70);
            color:white;
            padding:.8em;
            margin-left:-.5em;
            width:6em;
            border-bottom-left-radius: .5em .5em;
            border-top-left-radius: .5em .5em;
        }
        .cancelButton:hover
        {
            background:#DC4C64 !important;
            color:white;
            transition:.5s all ease;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $('#addVideoModal').on('shown.bs.modal', function () {
            $('#addVideoModal').trigger('focus')
        });
        $('#addClientModal').on('shown.bs.modal', function () {
            $('#addClientModal').trigger('focus')
        });
        $('#manageClientsModal').on('shown.bs.modal', function () {
            $('#manageClientsModal').trigger('focus')
        })
    </script>
@endsection

@section('content')
    <div class="pageControl">
        <button type="submit" class="updateTaskButton" data-toggle="modal" data-target="#addVideoModal">
            <i style="font-size:1.3em;" class="fa-solid fa-pen-to-square"></i><span style="font-size:.9em;margin-left:.5em;">Register a record</span>
        </button>
        @if($numberOfClients !== 0)
        <button style="margin-left:1em;" type="submit" class="updateTaskButton" data-toggle="modal" data-target="#manageClientsModal ">
            <i style="font-size:1.3em;" class="fa-solid fa-users-line"></i><span style="font-size:.9em;margin-left:.5em;">Manage clients</span>
        </button>
        @endif
        <button style="margin-left:1em;" type="submit" class="updateTaskButton" data-toggle="modal" data-target="#addClientModal">
            <i style="font-size:1.3em;" class="fa-solid fa-user-plus"></i><span style="font-size:.9em;margin-left:.5em;">Add a client</span>
        </button>
        <div style="padding:1em;margin-left:auto;display:flex;flex-direction:row;">
            @if($numberOfClients !== 0)
                <div class="" style="min-width:10em;margin-right:1em;justify-content:center;background-color: rgb(34, 40, 49);border-radius:1em;padding:1em;color:lightgray;display:flex;flex-direction:row;align-items:center;">
                    <b style="font-size:.8em !important;margin-right:.3em;">{{ $numberOfClients }}</b>
                    <span style="font-size:.8em;">
                    @if($numberOfClients === 1)
                            CLIENT
                        @else
                            CLIENTS
                        @endif
                </span>
                </div>
            @endif
            @if($totalVideos !== 0)
            <div style="min-width:10em;margin-right:1em;display:flex;justify-content:center;background-color: rgb(34, 40, 49);border-radius:1em;padding:1em;color:lightgray;flex-direction:row;align-items:center;">
                <b style="font-size:.8em !important;margin-right:.3em;">{{ $totalVideos }}</b>
                <span style="font-size:.8em;">
                    @if($totalVideos === 1)
                    VIDEO
                    @else
                    VIDEOS
                    @endif
                </span>
            </div>
                    <div class="bg-success" style="padding:1em;display:flex;justify-content:center;min-width:10em;border-radius:1em;color:lightgray;flex-direction:row;align-items:center;">
                        <b style="font-size:.8em;margin-right:.3em;">{{ $totalProfit }}MDL</b>  <span style="font-size:.8em;">INCOME</span>
                    </div>
            @else
                <div style="min-width:10em;background-color: rgb(34, 40, 49);border-radius:1em;padding:1em;color:lightgray;display:flex;flex-direction:row;justify-content: center;">
                   <span style="font-size:.9em;">NO RECORDS</span>
                </div>
            @endif
        </div>
    </div>
    <div style="display:flex;flex-direction: row;margin-top:-3em;">
    @if($totalVideos !== 0)
            <table class="videoTable">
                <thead>
                <tr>
                    {{--                <th>#</th>--}}
                    <th style="font-size:1.2em;letter-spacing:.1em;">THEME</th>
                    <th><i class="fa-solid fa-user"></i></th>
                    <th><i class="fa-solid fa-dollar-sign material-icons mr-2"></i></th>
                    <th><i class="fa-regular fa-calendar material-icons mr-2"></i></th>
                    <th><i class="fa-solid fa-clock material-icons mr-2"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td><b>{{ $video->theme }}</b></td>
                        <td>{{ $video->client }}</td>
                        <td style="color:#85BB65;"><b>+{{ $video->profit }}MDL</b></td>
                        <td>{{ $video->created_at }}</td>
                        <td>{{ ($video->duration_in_minutes) }}MIN</td>
                        <td>
                            <form method="POST" action="/videos/delete-video/{{ $video->id }}">
                                @csrf
                                <button class="deleteButton"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
        <div style="padding:1em;color:white;font-size:2em;border-radius:1em;font-style:italic;color:lightgray;">
            Unfortunately, you do not have any records at the moment.
        </div>
        @endif
    </div>
    <div style="margin-top:2em;">
        {{ $videos->links() }}
    </div>
    <!-- Add Client Modal -->
    <div style="margin-left:-9em;"  class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-hidden="true">
        <form action="/clients/add-client" method="POST">
            @csrf
        <div style="display:flex;align-items:center;margin-top:25vh;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color:rgb(34, 40, 49);width:50em;height:17em;">
                    <div class="modal-body" style="color:white;padding:2em;">
                        <div style="display:flex;flex-direction:column;">
                            <div class="yellow-font-color" style="font-size:1.5em;font-weight:bold;">Add a client</div>
                            <input name="clientName" class="mt-8" type="text" placeholder="Client's name" style="border-radius:.3em;outline:none;padding:1em;font-size:1em;background-color:rgb(57, 62, 70);color:white;">
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none;">
                        <button class="cancelButton" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="addButton">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Manage Clients Modal -->
    <div style="margin-left:-9em;"  class="modal fade" id="manageClientsModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div style="display:flex;align-items:center;margin-top:1vh;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color:rgb(34, 40, 49);width:50em;min-height:20em;">
                        <div class="modal-body" style="color:white;padding:2em;">
                            <div style="display:flex;flex-direction:column;">
                                <div class="yellow-font-color" style="font-size:1.5em;font-weight:bold;">Manage Clients</div>
                                <div style="display:flex;justify-content: center;margin-top:1.5em;">
                                        <table class="manageClientsTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Number of Videos</th>
                                                    <th>Profit</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($clients as $client)
                                            <tr>
                                                <td><b>{{ $client->name }}</b></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <form method="POST" action="/clients/delete-client/{{ $client->id }}">
                                                        @csrf
                                                        <button type="submit" class="deleteButton">
                                                            <i class="fa-solid fa-user-minus"></i>
                                                        </button></form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border:none;">
                            <button class="cancelButton" style="border-radius:.5em !important;" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Add Video Modal -->
    <div style="margin-left:-9em;" class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="addVideoModalLabel" aria-hidden="true">
        <form action="/videos" method="POST">
            @csrf
      <div style="display:flex;align-items:center;margin-top:10vh;">
          <div class="modal-dialog" role="document">
              <div class="modal-content" style="background-color:rgb(34, 40, 49);width:50em;height:35em;">
                  <div class="modal-body" style="color:white;padding:2em;">
                      <div style="display:flex;flex-direction:column;">
                          <div class="yellow-font-color" style="font-size:1.5em;font-weight:bold;">Register a record</div>
                            <input name="theme" class="mt-8" type="text" placeholder="Theme" style="border-radius:.3em;outline:none;padding:1em;font-size:1em;background-color:rgb(57, 62, 70);color:white;">
                                 <select name="client_id" class="mt-3" style="margin-bottom:-15px;padding:1em;background-color:rgb(57, 62, 70);outline:none;color:white;border-radius:.3em;">
                                    <option selected>Select client</option>
                                     @foreach($clients as $client)
                                      <option value="{{ $client->id }}">{{ $client->name }}</option>
                                      @endforeach
                                 </select>
                             <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text mt-3" style="padding:1em;margin-right:-3px;background-color:rgb(57, 62, 70);border:none;color:lightgray;font-weight:bold;letter-spacing:.05em">MDL</span>
                                </div>
                                 <input name="profit" type="number" class="mt-3 form-control"
                                     style="border:none;border-left:.2em solid rgb(34, 40, 49) !important;outline:none;padding:1em;font-size:1em;background-color:rgb(57, 62, 70);color:white;box-shadow: none;appearance: none;">
                                </div>
                          <input name="duration_in_minutes" class="mt-3" type="number" placeholder="Time in minutes" style="border-radius:.3em;outline:none;padding:1em;font-size:1em;background-color:rgb(57, 62, 70);color:white;">
                      </div>
                  </div>
                              <div class="modal-footer" style="border:none;">
                                  <button class="cancelButton" data-dismiss="modal">
                                      Cancel
                                  </button>
                                  <button type="submit" class="addButton">
                                      Add
                                  </button>
                           </div>
                      </div>
                  </div>
             </div>
        </form>
    </div>
@endsection
