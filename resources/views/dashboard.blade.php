<x-app-layout>
     @section('center')

     <div class="section-header">
                <h3>General Summary</h3>
            </div>
            
            <div class="stats-cards">
                <div class="card">
                    <h4>Total Province</h4>
                    <p class="stat-number">{{$cprov}}</p>
                </div>
                <div class="card">
                    <h4>New Users</h4>
                    <p class="stat-number">{{$cuser}}</p>
                </div>
                <div class="card">
                    <h4>Hotels Registers</h4>
                    <p class="stat-number">56</p>
                </div>
                
            </div>

            <div class="charts-section">
                <div class="chart-container">
                    <h4>Reservas per Month</h4>
                    <canvas id="monthlyBookingsChart"></canvas>
                </div>
                <div class="chart-container">
                    <h4>Most visited Attractions</h4>
                    <canvas id="topAttractionsChart"></canvas>
                </div>
            </div>


     @endsection
</x-app-layout>
