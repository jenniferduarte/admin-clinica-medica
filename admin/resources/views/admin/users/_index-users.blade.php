<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }} </td>
                    <td>{{ $user->name }} </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->cpf }} </td>
                    <td>{{ $user->phone }} </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


