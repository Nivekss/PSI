@extends('templates/ins/master')

@section('content')

<div id="user">
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
                    <th><button v-on:click="showCreateForm()" style="position: relative; z-index: 10" class="btn btn-primary pull-right"><span class="ion-plus-circled"></span> New User</button></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        <button v-on:click="removeUser()" style="float: right" class="btn btn-danger"><span class="ion-minus-circled"></span> Delete</button>
                        <button v-on:click="showUserEditForm({{$user}})" style="margin: 0 10px; float: right" class="btn btn-success"><span class="ion"></span> Edit</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- HIDDEN --}}
	<div class="popup-form new-user">
		<header>
			<p class="pull-left">New User</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
				<span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
				<span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="user.email" placeholder="Email" type="text" class="form-control first">
				<input v-model="user.password" placeholder="Password" type="text" class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(user, true)" class="btn btn-primary pull-right">Create User</a>
			<div class="clearfix"></div>
		</footer>
	</div>

    <div class="popup-form edit-user">
		<header>
			<p class="pull-left">Edit User</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
				<span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
				<span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="user.email" placeholder="Email" type="text" class="form-control first">
				<input v-model="user.password" placeholder="Password" type="text" class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="edit(user, true)" class="btn btn-primary pull-right">Edit User</a>
			<div class="clearfix"></div>
		</footer>
	</div>
</div>
     <script src="{{ asset('assets/js/controllers/user.js') }}"></script>


@stop()