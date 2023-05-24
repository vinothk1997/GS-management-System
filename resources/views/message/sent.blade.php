@extends('layouts.master')
@section('title', 'messages')
@section('content')
    <a class="btn btn-success" href="{{ route('message.index') }}">Inbox messages</a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#compose">
        Compose
    </button>
    <div>
        <h3>Sent Messages</h3>
    </div>
    <div class="accordion" id="accordionExample">
        @foreach ($messages as $message)
            @if ($message->sent_deleted == true)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ $message->message_id }}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $message->getToName->first_name }}
                            {{ $message->getToName->last_name }}-{{ $message->subject }}-{{$message->date}}</button>
                    </h2>
                    <div id="{{ $message->message_id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="float-right">
                                <a class="btn btn-sm bg-danger"
                                    href="{{ route('message.sentDeleted', $message->message_id) }}">Delete</a>
                            </div>

                            <br>
                            <p class="lh-sm">
                                <b>
                                   To: {{ $message->getToName->first_name }}
                                </b>
                                <p>
                                    {{ $message->message }}
                                </p>
                                <b>Date - {{ $message->time }} | Time - {{ $message->date }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <!-- Modal -->
    <div class="modal fade " id="compose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Compose Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="text" class="form-control" value="{{ $user['user_id'] }}" name="from"
                                id="msg_from" placeholder="{{ $user['user_id'] }}" readonly>
                        </div>
                        <select class="form-select" name="to" aria-label="Default select example">
                            <option selected id="msg_to">Open this select menu</option>
                            @if (isset($staffs) && isset($familyHeads))
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->staff_id }}">
                                        {{ $staff->first_name }}:-{{ $staff->user->getDesignation() }}
                                    </option>
                                @endforeach
                                @foreach ($familyHeads as $familyHead)
                                    <option value="{{ $familyHead->family_id }}">
                                        {{ $familyHead->first_name }}:-{{ $familyHead->user->getDesignation() }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->staff_id }}">
                                        {{ $staff->first_name }}:-{{ $staff->user->getDesignation() }}</option>
                                @endforeach
                            @endif

                        </select>
                        <div class="form-group">
                            <label for="from">Subject</label>
                            <input type="text" class="form-control" name="subject" id="msg_subject"
                                placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="from">Message</label>
                            <textarea class="form-control" name="body" id="msg_body" rows="4">Write Something!</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
    </div>
@endsection
