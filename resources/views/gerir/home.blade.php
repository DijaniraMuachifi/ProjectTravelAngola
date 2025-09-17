<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/painel.css')}}">
</head>
<body>
      <div class="row">
           <div class="col-2" id="menu-left">
                     <ul>
                         <li class="home"><a href="/">Home</a></li>
                        
                       
                        <li class="dropdown"><a href="">Province</a>
                                 <!-- <ul class="dropdown-menu">
                                      <li class="store"><a href="">Registar</a></li>
                                      <li><a href="">Listar</a></li>
                                  </ul>-->
                           </li>
                          <li><a href="">User</a></li>
                          <li class="definicao"><a href="">Definição</a></li>

                     </ul>
           </div>
           <div class="col-10" id="conteudo">
               <div class="row" id="top">
                   <div class="col-3 ml-3" id="card">
                        <h1>{{$pcount}}</h1>
                        <span>Province</span>
                   </div>
                    <div class="col-4" id="card">
                        <h1>0</h1>
                        <span>Hotel</span>
                   </div> <div class="col-4" id="card">
                        <h1>0</h1>
                        <span>Route</span>
                   </div>

               </div>
           
               <div class="row mt-4">
                
                        <div class="col-6" id="routa">
                               
                               <form action="{{route('provincia.store')}}" method="post">
                                  @csrf
                                <h4>CADASTRO DE PROVINCIA</h4>
                                       <div class="form-group">
                                            
                                            <input type="text" name="name" id="" required 
                                            placeholder="Informe o nome da provinçia" class="form-control"><br>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                       </div>
                               </form>
                        </div>
                        <div class="col-6" id="hotel">
                               <h5>Provincias Registada</h5>
                               <table class="table">
                                  <thead><th>Name</th><th>Data de Registo</th></thead>
                                  <tbody>
                                    @foreach($provincias as $lista)
                                      <tr>
                                        <td>
                                          {{$lista->name}}
                                        </td>
                                        <td>
                                          {{$lista->created_at}}
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                               </table>
                        </div>
               </div>
           </div>
           
      </div>
</body>
</html>