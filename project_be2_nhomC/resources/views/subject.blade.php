@extends('layout')

@section('title','Page Title')
    @section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>subject_id</th>
                    <th>subject_name</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
        <?php //dd($subject); ?>
                @foreach($subject as $subjects)
                <tr>
                    <td>{!! $subjects->subject_id !!}</td>
                    <td>{!! $subjects->subject_name !!}</td>
                    <td>{!! $subjects->status !!}</td>
                    <td>
                        <!-- Delete -->
                        <a href="{{ route('subjects.delete',$subjects->subject_id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection