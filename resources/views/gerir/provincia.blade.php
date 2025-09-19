<x-app-layout>
    @section('center')
    <main class="main-content">


        <div class="crud-controls">
            <button class="add-btn" id="add-province-btn"><i class="fas fa-plus"></i> Adicionar Província</button>
        </div>

        <div class="content-table-container">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Província</th>
                        <th>Data de registo</th>
                    </tr>
                </thead>
                <tbody id="provinces-tbody1">
                    @foreach($provincias as $lista)
                    <tr>
                        <td>{{$lista->id}}</td>
                        <td>{{$lista->name}}</td>
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

        <div id="crud-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-title">Registar Província</h4>
                    <span class="close-btn">&times;</span>
                </div>
                <form id="crud-form" action="{{route('provincia.store')}}" method="POST">
                    @csrf
                    <input type="hidden" id="province-id">
                    <div class="form-group">
                        <label for="name">Nome da Província:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <button type="submit" id="submit-btn" class="submit-btn">Salvar</button>
                </form>
            </div>
        </div>



     

    </main>

    @endsection

</x-app-layout>

   <!-- Modal 
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        -->