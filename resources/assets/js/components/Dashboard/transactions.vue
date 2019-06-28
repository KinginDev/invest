<template>
	<div>
		<div class="container-fluid">
			<div class="row">
				<div class="card">
						<div class="card-header card-header-success">
							<h3 class="title text-center">Transactions</h3>
							<p class="category">You can view all your transactions here.</p>
						</div>
						<div v-if="transactionLoading" style="padding: 40px;">
							<center><pulse-loader color="#f9b707"></pulse-loader></center>
						</div>
						<div class="card-body" v-else> 
							<table class="table table-hover">
								<thead class="text-success">
									<th>Type</th>
									<th>Amount</th>
									<th>Ref. No.</th>
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
											<span class="badge badge-success" style="background: green;" v-if="trans.status == 2">Completed</span>
											<span class="badge badge-danger" v-if="trans.status == 3">Canceled</span>
										</td>
										<td>{{trans.created_at | getTime}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
	</div>
</template>
<script>
import card from './widgets/cards.vue';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import moment from 'moment';
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
				this.$http.get('/api/user/dashboard/transactions/all/'+user).then(res => {
					this.transactions = res;
					this.transactionLoading = false;
					console.log(res)
				}).catch(e => {
					this.getTransactions();
				})
			}
		}
		
	}
</script>