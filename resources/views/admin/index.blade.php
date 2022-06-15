@extends('templates/ins/master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1>Admin</h1>
            <p>Number of users: <span class="badge">{{ $n_users  }}</span></p>
            <p>Number of clients: <span class="badge">{{ $n_clients  }}</span></p>
            <p>Number of projects: <span class="badge">{{ $n_projects  }}</span></p>
            <p>Number of tasks: <span class="badge">{{ $n_tasks  }}</span></p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th><button v-on:click="showUserAddForm()" style="position: relative; z-index: 10" class="btn btn-primary pull-right"><span class="ion-plus-circled"></span> New User</button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><button v-on:click="showUserAddForm()" style="position: relative; z-index: 10" class="btn btn-success pull-right"><span class="ion"></span> Edit User</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop()