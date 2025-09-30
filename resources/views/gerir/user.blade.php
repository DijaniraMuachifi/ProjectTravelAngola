<x-app-layout>

    @section('center')
    <main class="main-content">


        <div class="crud-controls">
            <button class="add-btn" id="add-province-btn"><i class="fas fa-plus"></i>List Users</button>
        </div>

        <div class="content-table-container">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>UserName</th>
                        <th>Type User</th>
                        <th>Date Create</th>
                    </tr>
                </thead>
                <tbody id="provinces-tbody1">
                    @foreach($users as $lista)
                    <tr>
                        <td>{{$lista->id}}</td>
                        <td>{{$lista->name}}</td>
                        <td>{{$lista->email}}</td>
                        <td>   
                            @if($lista->isAdmin)
                               <li>Administrador</li>
                               @endif
                            @if($lista->isCliente)
                               <li>Cliente</li>
                            @endif
                        </td>
                        <td>{{$lista->created_at}}</td>

                        <!-- <td class="action-btns">
                        <button class="edit-btn" data-id="${province.id}"><i class="fas fa-edit"></i></button>
                        <button class="delete-btn" data-id="${province.id}"><i class="fas fa-trash-alt"></i></button>-->
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>


    </main>

    @endsection

</x-app-layout>