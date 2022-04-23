<section class="short-meter  ">
      <div class="container-fluid py-2">
        <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Sale Product:</h6>
                    <h2 class="text-right animate__animated animate__heartBeat"><i class="fa fa-cart-plus f-right"></i><span><?php getTotalsaleinAmt($conn); ?></span></h2>
                   <!-- <p class="m-b-0">Through Out You:<span class="f-right">3577277227821</span></p>-->
                </div> 
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-another1 order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Cash Sales:</h6>
                    <h2 class="text-right animate__animated animate__heartBeat"><i class="fa fa-cart-plus f-right"></i><span><?php getTotalcashsaleinAmt($conn); ?></span></h2>
                   <!-- <p class="m-b-0">Through Out You:<span class="f-right">3577277227821</span></p>-->
                </div> 
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-another order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Credit Sales:</h6>
                    <h2 class="text-right animate__animated animate__heartBeat"><i class="fa fa-cart-plus f-right"></i><span><?php getTotalcreditsaleinAmt($conn); ?></span></h2>
                   <!-- <p class="m-b-0">Through Out You:<span class="f-right">3577277227821</span></p>-->
                </div> 
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Added Product:</h6>
                    <h2 class="text-right animate__animated animate__flip"><i class="fas fa-layer-group f-right"></i><span><?php getaddedprdnum($conn); ?></span></h2>
               
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Purchase Quantity:</h6>
                    <h2 class="text-right"><i class="fas fa-weight f-right"></i><span><?php gettotalpurchasequantity($conn); ?></span></h2>

                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Purchase Products:</h6>
                    <h2 class="text-right"><i class="fas fa-box-open f-right"></i><span><?php
 gettotalpurchasenum($conn); ?></span></h2>
                   
                </div>
            </div>
        </div>
        
         <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Exp. On Purchase Goods:</h6>
                    <h2 class="text-right animate__animated animate__flip"><i class="fas fa-wallet f-right"></i><span><?php gettotalpurchaseexp($conn); ?></span></h2>
<!--                    <p class="m-b-0">Total Added Product:<span class="f-right">351</span></p>-->
                </div>
            </div>
        </div>
        
       
        
	</div>
</div>
 
    </section>
    <!--this chart section temporary close becauese work not done-->
 <!--   <section class="info-chart">
       <div class="container-fluid my-2">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-12">
             <div class="card wow animate__backInLeft">
               <div class="card-body"> 
                 <canvas id="myChart" width="300" height="300"></canvas>
               </div>
             </div>
           </div>
         
           <div class="col-lg-6 col-md-6 col-12 my-2">
             <div class="card wow animate__backInLeft">
               <div class="card-body">
                 <canvas id="barChart" width="300" height="300"></canvas>
               </div>
             </div>
           </div>

         </div>
       </div>
    </section>-->
       <!--charts js oy for this page-->
<!--     <script src="admin-js/chart.js" type="text/javascript" charset="utf-8"></script>-->