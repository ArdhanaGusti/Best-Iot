        <div class="row justify-content-around" wire:poll.1000ms>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Temperature (°C)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->temperature_c }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-temperature-low text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Humidity (%)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->humidity }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sun fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Temperature (°F)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->temperature_f }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-temperature-high fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>