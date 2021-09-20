@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">แก้ไขข้อมูลสมาชิก</h3>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Member</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin-members.update', $members->id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">บัญชีผู้ใช้</label>
                                <input type="text" name="email" class='form-control' placeholder='Enter your email'
                                    value="{{ $members->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="sel1">คำนำหน้า</label>
                                <select class="form-control" id="sel1" name="User_prefix_id">
                                    @foreach ($prefix as $item)
                                        <option value="{{ $item->prefix_id  }}"
                                            {{ $item->prefix_id == $members->User_prefix_id ? 'selected' : '' }}>
                                            {{ $item->prefix_name_th }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">ชื่อผู้ใช้</label>
                                <input type="text" name="name" class='form-control'
                                    placeholder='Enter your first name' value="{{ $members->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">นามสกุล</label>
                                <input type="text" name="User_LName" class='form-control' placeholder='Enter your last name'
                                    value="{{ $members->User_LName }}">
                            </div>
                            <div class="form-group">
                                <label for="sel1">แผนก</label>
                                <select class="form-control" id="sel1" name="User_DepartmentID">
                                    @foreach ($department as $item)
                                        <option value="{{ $item->department_id }}"
                                            {{ $item->department_id == $members->User_DepartmentID ? 'selected' : '' }}>
                                            {{ $item->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">ตำแหน่ง</label>
                                    <input type="text" name="user_position" class='form-control'
                                        placeholder='Enter your position' value="{{ $members->user_position }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sel1">สาขา</label>
                                <select class="form-control" id="sel1" name="User_GroupID">
                                    @foreach ($groupuser as $item)
                                        <option value="{{ $item->user_group_id }}"
                                            {{ $item->user_group_id == $members->User_GroupID ? 'selected' : '' }}>
                                            {{ $item->user_group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">เบอร์โทร</label>
                                <input type="text" name="User_Mobile" class='form-control' placeholder='Enter your mobile'
                                    value="{{ $members->User_Mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="sel1">สถานะ</label>
                                <select class="form-control" id="sel1" name="User_Status">
                                        <option value="1" {{ $members->User_Status == 1 ? 'selected' : '' }}>Enable</option>
                                        <option value="0" {{ $members->User_Status == 0 ? 'selected' : '' }}>Disable</option>
$members
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('admin-members.index') }}" class='btn btn-secondary'><i
                                        class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                                <button type='submit' class='btn btn-primary'> <i class="far fa-check-circle"></i>
                                    Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
