@extends('dashboard.common.master')

@section('title')
    Dashboard - Users
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>

        <p class="mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias enim iusto nemo non quasi quod
            voluptates! Assumenda blanditiis consequuntur expedita fugiat natus quas ratione sit tempora vel? Aut
            blanditiis cum cupiditate dolorum eius est eum, illo inventore ipsam iure obcaecati porro quae quam quia
            quis quos repudiandae similique tenetur, ut veniam veritatis voluptate, voluptatibus. Adipisci autem
            consequuntur deserunt, fugit laudantium maiores natus necessitatibus odio odit officia placeat praesentium
            quaerat quas ratione rerum soluta tempore vel. Accusantium aperiam aspernatur consectetur consequuntur
            cupiditate deleniti doloremque esse explicabo impedit incidunt, nesciunt nihil nobis nulla, odit pariatur
            porro sapiente similique ut veritatis voluptas.
        </p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Current Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php
                            $users = \App\User::all();
                        @endphp
                        @foreach($users as $k => $user)
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection