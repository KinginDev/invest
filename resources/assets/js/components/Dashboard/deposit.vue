<template>
	<div>
			<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-warning">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                    	<p style="font-weight: bolder; font-size: 20px;">Deposit</p>
                    	<p >This is where you deposit funds into your wallet. If you have any problem depositing you can contact the admin</p>
                    </span>
                  </div>
			</div>
				<div class="col-lg-2"></div>
				<div class="col-lg-8 col-lg-offset-2">
					<form action="" @submit.prevent="createDeposit()">
						<div v-if="step ==1">
							<div class="card">
								<div class="card-body">
									<!-- Circles which indicates the steps of the form: -->
										<div style="text-align:center;margin-top:40px;">
										  <span class="step active"></span>
										  <span class="step"></span>
										</div>
										<div class="form-group col-lg-12">
											<label for="" class="bmd-label-floating">Amount</label>
											<input type="text" v-model="deposit.amount" name="amount" v-validate="'required'" class="form-control" >
											<span class="help-text" style="color: red;" v-if="errors.has('amount')">
												You have to deposit an amount
											</span>
										</div>
										<div class="form-group col-lg-12">
											<label for="" class="bmd-label-floating">Select Plan</label>
											<select name="plan" id="" v-validate="'required'" v-model="deposit.plan" class="form-control">
												<option value="starters">Starters  ($100 - $500)</option>
												<option value="silver">Silver ($200 - $5,000)</option>
												<option value="gold" >Gold ($500 - 10,000)</option>
												<option value="platnium" >Platnium ($1,000 - 100,000)</option>
												</select>
											<span class="help-text" style="color: red;" v-if="errors.has('plan')">
												You have to pick a plan
											</span>
										</div>
										<div class="form-group col-lg-12" >

											<label for="" class="bmd-label-floating">Select Coin Type</label>
											<select name="coin" v-validate="'required'" v-model="deposit.coin" id="" class="form-control">
												<option value="BTC">Bitcoin</option>
												<option value="ETH">Etherum</option>
												<option value="LTE">Litecoin</option>
											</select>
											<span class="help-text" style="color: red;" v-if="errors.has('coin')">
												You have to pick a coin you want to invest in
											</span>
										</div>
										<div class="form-group">
												<button type="button" class="btn btn-success btn-block" @click.prevent="next(1)">Next</button>
										</div>
								</div>
							</div>
						</div>
						<!-- step 2 -->
						<div v-if="step == 2">

							<div v-if="loading" >
								<div class="card">
									<div class="card-body">
										<center><bounce-loader  color="#f9b707" style="20px"></bounce-loader>
											<p style="lead">Making Your Deposit... </p>
										</center>
										</div>
									</div>
								</div>
									
							<div class="card" v-else>
								<div class="card-header card-header-success">
									Preview Options
								</div>
								<div class="card-body">
										<!-- Circles which indicates the steps of the form: -->
												<div style="text-align:center;margin-top:40px;">
												  <span class="step "></span>
												  <span class="step finish"></span>
												</div>
									<ul class="list-item-group">
										<li class="list-item"><strong>Transaction Type: </strong>Deposit</li>
										<li class="list-item"><strong>Transaction Amount: </strong>{{deposit.amount}}</li>
										<li class="list-item"><strong>Plan: </strong>{{deposit.plan}}</li>
										<li class="list-item"><strong>Coin Type: </strong>{{deposit.coin}}</li>
									</ul>
									<div class="form-group">
											<center><button type="button" class="btn btn-success" @click.prevent="prev(1)">Prev</button>
											<button type="button" class="btn btn-success" @click.prevent="submit(1)">Submit</button></center>
											
										</div>
								</div>
							</div>
						</div>
						<div v-else-if="step === 3">
							<div class="card">
								<div class="card-body">
						<div slot="body" style="text-align: center;">
                            <h3 class="title">You have sucessfully deposited your account with ${{deposit.amount}}</h3>
                            <h4 class="category">Pay the amount of BTC specified below to the wallet generated for you, Payment Processed Automatically</h4>
                            <input type="text" style="border: 1px solid #eee; background: #eee; padding: 0px 5px;" class="form-control" value="15Fw88dsvfv2oXRsECWkA7xrn2V65dck1n" >

                            <h4>You can buy Bitcoin from Any of these sites, just paste your wallet id and the amount you want to Buy (Should be same as the amount you deposited). if you have any problems/questions email 
                            <a href="mailto:help@Cryptoinvestments.com">help@Cryptoinvestments.com</a></h4>
                            <ul class="list-item-group">
                              <li class="list-item">
                                <a target="_blank" href="https://payments.changelly.com/">Changelly.com</a></li>
                                 <li class="list-item"><a target="_blank" href="https://coinsource.com/">Coinsource.com</a></li>
                                 <li class="list-item">  <a target="_blank" href="https://paxful.com">Paxful.com</a>
                              </li>

                            </ul>
                        </div>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import BounceLoader from 'vue-spinner/src/BounceLoader.vue';
import {eventBus} from '../../app.js';
	export default{
		props: {
			id: {
				type: String,
				//required: true,
			}
		},
		data(){
			return {
				step: 1,
				deposit:{
					amount: '',
					plan: '',
					coin: '',
				},
				loading: false,
			}
		},
		components: {
		 BounceLoader
		},
		methods: {
			next(step){
				if(this.step === 1) {
					this.$validator.validateAll().then(res => {
						if(res){
							return this.step  += step;
						}
					})
				 }else{
           return this.step += num;
        	}
			
			},
			prev(step){
				return this.step -= step;
			},
			submit(){
				this.loading = true;
				 const user = this.$parent.user;
				this.$http.post('/api/user/deposit/'+user, this.deposit).then( res => {
					console.log(res)
					this.step = 3;
					this.loading = false;
					eventBus.$emit('reloadTransactionCount', true)
				}).catch(e => {
					//do something here
					console.log(e)
				})
			}
		}
	}
</script>
<style scoped>
		/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

ul.list-group{
    width: 100%;
   
   
    padding: 10px;
}
ul li.list-item{
    list-style-type: none;
    border: 1px solid #eee;
    padding: 10px;
    font-size: 14px;
    width: 100%;
    margin:10px 0px !important;
    
}
ul li.list-item > span{
    font-weight: bolder !important;
    font-size: 14px !important;
}
ul li.list-item:hover{
    background: #eee;
    
}
.buttons{
    display: flex;
    justify-content: center;
}
.buttons > button {
    flex-direction: column ;
}
</style>