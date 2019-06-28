<template>
	<div>
		<div class="container-fluid">
			<div class="row">
            <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-primary">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Crypto growth chart</h4>
                </div>
                
              </div>
            </div>
        </div>
			<div class="row">
				<div class="col-sm-6 col-lg-6 table-responsive">
					<div class="card">
						<div class="card-header card-header-success">
							<h3 class="title text-center">Transactions</h3>
						</div>
						<div v-if="transactionLoading" style="padding: 40px;">
							<center><pulse-loader  color="#f9b707"></pulse-loader></center>
						</div>
						<div class="card-body" v-else> 
							<table class="table table-hover">
								<thead class="text-success">
									<th>Type</th>
									<th>Amount</th>
									<th>Ref.</th>
									<th>Status</th>
									<th>Date</th>
								</thead>
								<tbody>
									<tr v-for="trans in transactions.data" :key="trans.id">
										<td><strong>{{trans.trans_type == "deposit" ? 'Deposit' : 'Withdrawal'}}</strong></td>
										<td>${{trans.amount}}</td>
										<td>{{trans.ref}}</td>
										<td>
											<span class="badge badge-warning" v-if="trans.status == 1">Pending</span>
											<span class="badge badge-success" v-if="trans.status == 2" style="background:green;">Completed</span>
											<span class="badge badge-danger" v-if="trans.status == 3">Canceled</span>
										</td>
										<td>{{trans.created_at | getTime}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
				 <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="card">
                    <img src="/img/subscribed_plan.gif" alt="minner image" width="100%" height="400px">
                </div>
            </div>
			</div>
		</div>
	</div>
</template>
<script>
import card from './widgets/cards.vue';
import moment from 'moment';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
	export default{
		components:{
			card,
			PulseLoader
		},
		data(){
			return {
				transactionLoading: true,
				transactions: [],
			}
		},
		mounted(){
			this.getTransactions();
		},
		filters: {
				getTime(arg){
				 return moment(arg).format('Do MM YYYY');
			}
		},
		methods: {
			getTransactions(){
				const user = this.$parent.user;
				this.$http.get('/api/user/dashboard/transactions/'+user).then(res => {
					this.transactions = res.data;
					this.transactionLoading = false;
				}).catch(e => {
					this.getTransactions();
				})
			}
		}
		
	}
</script>