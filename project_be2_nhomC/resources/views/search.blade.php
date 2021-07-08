@extends('dashboard')
    @section('content')
    <form style="padding-left:70%;" class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="search">
            <input style="border-radius:5px;" type="text" value="" name="key" placeholder="Nhập từ khóa...">
            <button style="border-radius:5px; background:green;"type="submit" id="searchsubmit">Tìm kiếm</button>
</form>
    <div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
    
    <div class="col-lg-12">
    <div class="beta-subject-list">
    
    <div class="beta-subjects-detail">
    <p style="padding-left:71%;"class="pull-left">Tìm thấy {{count($subject)}} môn học</p>
    <div class="clearfix"></div></div></div>
  
    </div>
    <div class="table-responsive ">
        <table  style="margin: 0 100px" class="table">
            <thead>
                <tr>
                    <th>subject_id</th>
                    <th>subject_name</th>
                    <th>status</th>
                    <th>update</th>
                    <th>delete</th>
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
                        <a href="{{ route('subjects.edit',$subjects->subject_id) }}" class="btn btn-sm btn-primary">Update</a>
                    </td>
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
