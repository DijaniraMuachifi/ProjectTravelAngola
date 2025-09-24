<x-app-layout>
     @section('center')

     <div class="section-header">
                <h3>Resumo Geral</h3>
            </div>
            
            <div class="stats-cards">
                <div class="card">
                    <h4>Total de Province</h4>
                    <p class="stat-number">{{$cprov}}</p>
                </div>
                <div class="card">
                    <h4>Novos Utilizadores</h4>
                    <p class="stat-number">{{$cuser}}</p>
                </div>
                <div class="card">
                    <h4>Hotéis Registados</h4>
                    <p class="stat-number">56</p>
                </div>
                
            </div>

            <div class="charts-section">
                <div class="chart-container">
                    <h4>Reservas por Mês</h4>
                    <canvas id="monthlyBookingsChart"></canvas>
                </div>
                <div class="chart-container">
                    <h4>Atrações mais Visitadas</h4>
                    <canvas id="topAttractionsChart"></canvas>
                </div>
            </div>


     @endsection
</x-app-layout>
