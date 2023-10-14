@extends('layout.layout')


@section('style')
<style>
    .updateTaskButton{
        color:lightgray;
        text-decoration: none;
        font-size:1em;
        transition: all .5s ease;
        cursor:pointer;
        background:transparent;
        border:none;
        outline:none;
        padding:.5em;
    }
    .updateTaskButton:hover
    {
        color:rgb(255, 211, 105) !important;
        transition:all .5s ease;
    }
    .tasksContainer
    {
        display:flex;
        flex-direction: row;
        flex-wrap:wrap;
    }
    .taskStatus
    {
        padding:.7em;
        color:white;
        font-size:.8em;
        position: absolute;
        display:flex;
        flex-direction:row;
        bottom:0;
    }
    .successNotification
    {
        visibility: hidden;
        position:absolute;
        right:5em;
        bottom:5em;
        width:50vh;
        background-color:#4BB543;
        display:flex;
        justify-content: center;
        padding:1em;
        color:white;
        letter-spacing:.1em;
        font-weight:bold;
        border-radius:.5em;
    }
    .pageControl
    {
        margin-top:-8.5em;
        width:140vh;
        margin-bottom:4em;
        border-bottom:.2em solid rgb(34, 40, 49);
        /*border-bottom: .2em solid white;*/
        box-shadow: rgb(34, 40, 49);
        color:white;
        padding:1em;
        display:flex;
        flex-direction: row;
        align-items: center;
    }
    .filterButton
    {
        background:transparent;
        font-size:.9em;
        letter-spacing:.2em;
        color:lightgray;
        padding:1em;
        transition: .2s all ease;
    }
    .filterButton:hover
    {
        transition: .2s all ease;
        color:rgb(255, 211, 105) !important;
    }
    .tasksTable
    {
        width:140vh;
        box-shadow:0px 15px 20px 3px rgb(34, 40, 49);
        background-color: rgb(34, 40, 49);
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
        $('#exampleModal').trigger('focus');
        $('#exampleModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
        })
    })
</script>
@endsection

@section('content')
    <div class="pageControl">
        <div style="margin-right:1.4em;padding:1.2em;border-right:.2em solid rgb(34, 40, 49);">
            @if ($allTasks != 0)
            <div style="font-size:1.3em;">
                {{ $completedTasks }} / {{ $allTasks }}
            </div>
            <div style="font-size:.7em;letter-spacing:.2em;color:lightgray;">
                TASKS COMPLETED
            </div>
            @else
                <div style="font-size:.7em;letter-spacing:.2em;color:lightgray;">
                    NO TASKS <BR> LEFT TO COMPLETE
                </div>
            @endif
        </div>
        <button type="submit" class="updateTaskButton" data-toggle="modal" data-target="#addVideoModal">
            <i style="font-size:1.3em;" class="fa-solid fa-pen-to-square"></i>
        </button>
        <div style="margin-left:auto;">
            <button class="filterButton">
                SORT BY
                <i class="fa-solid fa-sort"></i>
            </button>
        </div>
    </div>
    <div class="tasksContainer" style="margin-top:-3em;">
        <table class="tasksTable">
            <thead>
                <tr>
                    <th>TITLE</th>
                    <th>STATUS</th>
                    <th>DESCRIPTION</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td style="font-weight:bold;">
                        {{ $task->title }}
                    </td>
                    <td>
                        @if(!$task->completed)
                            <div class="text-primary" style="font-size:.7em;letter-spacing:.2em;color:lightgray;">IN PROGRESS</div>
                        @else
                            <div class="text-success" style="font-size:.7em;letter-spacing:.2em;color:lightgray;">FINISHED</div>
                        @endif
                    </td>
                    <td style="max-width:50vh;font-size:.9em;">
                        {{ $task->description }}
                    </td>
                    <td>
                        <div style="display:flex;">
                            @if (!$task->completed)
                                <form method="POST" action="/tasks/complete-task/{{ $task->id }}">
                                    @csrf
                                    <button type="submit" class="updateTaskButton">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                            @endif
                            <form method="POST" action="/tasks/delete-task/{{ $task->id }}">
                                @csrf
                                <button type="submit" class="updateTaskButton">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-left:-9em;" class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/tasks" method="POST">
            @csrf
            <div style="display:flex;align-items:center;margin-top:10vh;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color:rgb(34, 40, 49);width:50em;height:35em;">
                        <div class="modal-body" style="color:white;padding:2em;">
                            <div style="display:flex;flex-direction:column;">
                                <div style="color:lightgray;font-size:1em;letter-spacing:.15em;font-weight:bold;">CREATE A TASK</div>
                                <input name="title" class="mt-8" type="text" placeholder="TITLE" style="border-radius:.3em;outline:none;padding:1em;font-size:.9em;background-color:rgb(57, 62, 70);color:white;letter-spacing:.1em;">
                                <textarea name="description" class="mt-8" type="text" placeholder="DESCRIPTION" style="height:15em;border-radius:.3em;outline:none;padding:1em;font-size:.9em;background-color:rgb(57, 62, 70);color:white;letter-spacing:.1em;white-space:pre-wrap"></textarea>
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
@endsection
