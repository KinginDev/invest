<template>
	<div>
		<div class="wrapper ">
			<sidebar :userId="user"></sidebar>	
       <div class="main-panel">
      <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
             <router-link :to="{name: 'index'}" tag="li" class="nav-item" >
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
             </router-link>
             <router-link :to="{name: 'profile'}" tag="li" class="nav-item" >
                <a class="nav-link">
                  <i class="material-icons">account_circle</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
             </router-link>
            </ul>
          </div>
        </div>
      </nav>
      <div class="header-head text-center">
          <div class="container-fluid ">
          
            <div class="header-name lead">Welcome, {{name}}</div>

                  </div>
        </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
               <div class="container-fluid">
          <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-6">
                  <div v-if="walletLoading" class="card" style="height: 120px;">
                    <div class="card-body">
                       <center><bounce-loader  color="#f9b707" size="30px" style="margin: 30px;"></bounce-loader>
                       </center>
                    </div>
                    </div>
                     <div v-else >
                   <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">attach_money</i>
                        </div>
                        <p class="card-category">Total Earnings</p>
                        <h3 class="card-title">{{amount.data}}</h3>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">done</i> <router-link to="/#">View all</router-link>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div v-if="walletLoading" class="card" style="height: 120px;">
                    <div class="card-body">
                       <center><bounce-loader  color="#f9b707" size="30px" style="margin: 30px;"></bounce-loader>
                       </center>
                    </div>
                    </div>
                     <div v-else >
                   <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">credit_card</i>
                        </div>
                        <p class="card-category">Wallet</p>
                        <h3 class="card-title">{{amount.data}}</h3>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">done</i> <router-link to="/#">View all</router-link>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6">
                   <div v-if="transactionLoading" class="card" style="height: 120px;">
                    <div class="card-body">
                       <center><bounce-loader  color="#f9b707" size="30px" style="margin: 30px;"></bounce-loader>
                       </center>
                    </div>
                    </div>
                    <div v-else >
                      <div class="card card-stats">
                      <div class="card-header card-header-success card-header-icon" >
                          <div class="card-icon">
                            <i class="material-icons">assignment</i>
                          </div>
                          <p class="card-category">Transactions</p>
                          <h3 class="card-title">{{transaction_count.data}}</h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">done</i> <router-link to="/#">View all</router-link>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
  </div>
</div>
    

     </div>
          <router-view></router-view>
        </div>
      </div>
     
    </div>
			</div>

</template>

<script>
import sidebar from './Dashboard/sidebar'
import card from './Dashboard/widgets/cards.vue';
import BounceLoader from 'vue-spinner/src/BounceLoader.vue';
import {eventBus} from '../app.js';

	export default{
		components: {
			sidebar,
      card,
      BounceLoader
		},
    props: {
      user:{
        type: String,
        required: true,
      },
      name: {
        type:String,
        required: true,
      }
    },
    data(){
      return {
       transactionLoading: true,
       transaction_count: '',
       walletLoading: true,
       amount: '',
      }
    },
    mounted(){
      this.getTransactions();
      this.getAmount()
      eventBus.$on('reloadTransactionCount', () => {
        this.getTransactions();
      })
    },
    methods: {
      getTransactions(){
        this.$http.get('/api/user/dashboard/transactions/count/'+this.user).then(res => {
          this.transaction_count = res;
          this.transactionLoading = false;
        });
      },
      getAmount(){
        this.$http.get('/api/user/dashboard/amount/'+this.user).then(res => {
          this.amount = res;
          this.walletLoading = false;
        });
      }
    }

	}
</script>
