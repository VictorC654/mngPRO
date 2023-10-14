@extends('layout.layout')

@section('style')

    <style>
        .videoTable {
            box-shadow:0px 15px 20px 3px rgb(34, 40, 49);
            background-color: rgb(34, 40, 49);
            width:125vh;
            border-radius:.5em;
        }
        thead {
            border-bottom:.15em solid white;
        }
        th {
            color:rgb(255, 211, 105);
            font-size:1.5em;
            padding:.65em;
        }
        td {
            color:white;
            padding:1.1em;
            border-bottom:.15em solid rgb(57, 62, 70);
        }
        .addButton {
            border:none;
            background:transparent;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#exampleModal').trigger('focus')
        })
    </script>
@endsection

@section('content')

{{--    <div class="sortContainer">--}}
{{--            <p style="font-size:1.5em;color:white;padding:.5em;">Sort by</p>--}}
{{--            <div style="margin-left:auto;padding:1em;color:white;">--}}
{{--                <button style="font-size:1.3em;" class="addButton text-primary">Date <i class="fa-solid fa-arrow-up"></i></button>--}}
{{--            </div>--}}
{{--    </div>--}}
    <div style="display:flex;flex-direction: row;">
    <table class="videoTable">
        <thead>
            <tr>
{{--                <th>#</th>--}}
                <th>Theme</th>
                <th><i class="fa-solid fa-user"></i></th>
                <th><i class="fa-solid fa-dollar-sign material-icons mr-2"></i></th>
                <th><i class="fa-regular fa-calendar material-icons mr-2"></i></th>
                <th><i class="fa-solid fa-clock material-icons mr-2"></i></th>
                <th>
                    <button class="addButton text-success" data-toggle="modal" data-target="#addVideoModal">
                        <i class="fa-solid fa-plus mr-1"></i> Add
                    </button>
                </th>
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
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div>
        {{ $videos->links() }}
    </div>
    <!-- Add Video Modal -->
    <div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" style="background-color:rgb(57, 62, 70);border: .15em solid rgb(255, 211, 105);color:rgb(255, 211, 105);" class="btn btn-success">Add</button>
                  </div>
                </div>
              </div>
          </div>
      </div>
        </form>
    </div>
@endsection
