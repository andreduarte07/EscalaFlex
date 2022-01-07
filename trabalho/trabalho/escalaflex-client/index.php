
<?php require_once "../trabalho/header.php"; ?>

<main class='container'>
    <section class="row">
        <div class='col-md-4 col-12'>
            <div class='border m-1 d-flex justify-content-between flex-wrap p-1'>
                <h6 class='text-secondary col-12'>Total Views</h6>
                <div class= col-5>
                    <span class='d-block'>246K</span>
                    <span class='d-block text-danger'><i class="fas fa-long-arrow-alt-down"></i>13.8%</span>
                </div>
                <div class='col-7'>
                    <canvas class="chart-bar w-100 h-100"></canvas>
                </div>
            </div>
        </div>
        
        <div class='col-md-4 col-12'>
            <div class='border m-1 d-flex justify-content-between flex-wrap p-1'>
                <h6 class='text-secondary col-12'>Products Sold</h6>
                <div class= col-5>
                    <span class='d-block'>2453</span>
                    <span class='d-block text-success'><i class="fas fa-long-arrow-alt-up"></i>13.8%</span>
                </div>
                <div class='col-7'>
                    <canvas class="chart-bar w-100 h-100"></canvas>
                </div>
            </div>
        </div>
        
        <div class='col-md-4 col-12'>
            <div class='border m-1 d-flex justify-content-between flex-wrap p-1'>
                <h6 class='text-secondary col-12'>Total Earnings</h6>
                <div class= col-5>
                    <span class='d-block'>39K</span>
                    <span class='d-block text-danger'><i class="fas fa-long-arrow-alt-down"></i>13.8%</span>
                </div>
                <div class='col-7'>
                    <canvas class="chart-bar w-100 h-100"></canvas>
                </div>
            </div>
        </div>
        
    </section>
    
    <section class="row mt-5">
        <div class="col-md-4 col-12">
            <h5 class="text-secondary">Quick Details</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="quick-detail-badge-purple mr-3 rounded-circle">
                            <i class="fas fa-user-plus p-1"></i>
                        </div>
                        <span>290 New Costumers</span>
                    </div>
                    <span class="text-secondary">Last 24 Hours</span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="quick-detail-badge-green mr-3 rounded-circle">
                            <i class="fas fa-sync-alt p-1"></i>
                        </div>
                        <span>490 Orders</span>
                    </div>
                    <span class="text-secondary">Awaiting Process</span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="quick-detail-badge-gray mr-3 rounded-circle">
                            <i class="fas fa-user-plus p-1"></i>
                        </div>
                        <span>120 Orders</span>
                    </div>
                    <span class="text-secondary">On Hold</span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="quick-detail-badge-yellow mr-3 rounded-circle">
                            <i class="fas fa-user-plus p-1"></i>
                        </div>
                        <span>490 Orders</span>
                    </div>
                    <span class="text-secondary">Low in Stock</span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="quick-detail-badge-red mr-3 rounded-circle">
                            <i class="fas fa-user-plus p-1"></i>
                        </div>
                        <span>42 Items</span>
                    </div>
                    <span class="text-secondary">Out of Stock</span>
                </li>
                
            </ul>
        </div>

        <div class="col-md-8 col-12">
            <h5 class="text-secondary">
                Sales Distribution
            </h5>
            <select class="float-right ">
                <option value="">Europe</option>
            </select>
            <canvas class="chart-doughnut w-100 h-100"></canvas>
        </div>
    </section>
    
    
</main>

<script src="resources/js/validacao.js"></script>

<?php include "footer.php"; ?>