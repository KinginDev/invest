<template>
	<div>
		<div class="container-fluid">
			<div class="row">
				<div class="card">
					<div class="card-header card-header-success">
						<h3 class="title text-center" style="font-weight: bolder;">Withdrawal</h3>
						<ul class="terms">
							<li>Fill this form to withdraw your funds. Your withdrawal will be transffered to any Credit/Debit Card inputed.</li>
							<li>Please fill in your correct information to have a smooth and easy withdrawal</li>
						</ul>
						
					</div>
				</div>
				<div class="col-sm-2 col-lg-2 col-xs-12"></div>
				<div class=" col-lg-8 col-sm-8">
				<form action="" > 
					
							<div v-if="step ==1">
								<div class="card ">
					<div class="card-body ">
								<!-- Circles which indicates the steps of the form: -->
								<div style="text-align:center;margin-top:40px;">
								  <span class="step active"></span>
								  <span class="step"></span>
								  <span class="step"></span>
								   <span class="step"></span>
								  
								</div>
								<div class="form-group">
                                  <label class="control-label  text-center"  >Amount ($)<span style="color: red;">*</span></label>
                                  <input  name="amount" v-validate="'required'" v-model="cc.amount" type="text" class="form-control"/>
                                  <span class="help-text" style="color: red;" v-show="errors.has('amount')">
                                  	The Amount is required
                                  </span>
                                </div>
							<div class="form-group">
								<button class="btn btn-success pull-right" @click="next(1)" type="button">Next</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Step 2 -->
			
				
							<div v-if="step ==2">
									<div class="card ">
									<div class="card-body ">
								<div style="text-align:center;margin-top:40px;">
								  <span class="step "></span>
								  <span class="step active"></span>
								  <span class="step"></span>
								   <span class="step"></span>
								  
								</div>
								<h3>Card Information</h3>
								<div class="row">
									<div class="form-group col-lg-5">
	                                  <label class="control-label text-center" >Name On Card<span style="color: red;">*</span></label>
	                                  <input  name="name" placeholder="John Doe" v-model="cc.name" type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-7">
	                                  <label class="control-label text-center" >Card no.<span style="color: red;">*</span></label>
	                                  <masked-input  name="card_no" placeholder="4534-3534-3535-3535" v-model="cc.card_no"  mask="1111-1111-1111-1111" type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-6">
	                                  <label class="control-label text-center" >CVV<span style="color: red;">*</span></label>
	                                  <masked-input mask="111"  name="cvv" v-model="cc.cvv" placeholder="123" type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-6">
	                                  <label class="control-label text-center" >Expiry Date<span style="color: red;">*</span></label>
	                                  <masked-input mask="11/11"  name="exp_date" v-model="cc.exp_date" placeholder="12/13" type="text" class="form-control"/>
	                                </div>
								</div>
								
                                <hr/>
                                <h3>Billing Information</h3>
                                <div class="row">
									<div class="form-group col-lg-12">
	                                  <label class="control-label text-center" >Street<span style="color: red;">*</span></label>
	                                  <input  name="city" placeholder="2423 East Rd." v-model="cc.street" type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-4">
	                                  <label class="control-label text-center" >City<span style="color: red;">*</span></label>
	                                  <input  name="city" placeholder="Coloumbus" v-model="cc.city" type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-4">
	                                  <label class="control-label text-center" >State<span style="color: red;">*</span></label>
	                                  <input  name="state" placeholder="OH" v-model="cc.state"  type="text" class="form-control"/>
	                                </div>
	                                <div class="form-group col-lg-4">
	                                  <label class="control-label text-center" >Country<span style="color: red;">*</span></label>
	                                  <input  name="country" v-model="cc.country" placeholder="US" disabled="" value="US" type="text" class="form-control"/>
	                                </div>
									 <div class="form-group col-lg-6">
	                                  <label class="control-label text-center" >Zipcode<span style="color: red;">*</span></label>
	                                  <masked-input mask="111111" name="zipcode" v-model="cc.zipcode" placeholder="43012" type="text" class="form-control"/>
	                                </div>
	                                 <div class="form-group col-lg-4">
	                                  <label class="control-label text-center" >Phone<span style="color: red;">*</span></label>
	                                  <masked-input mask="\+\1 (111) 111-1111" name="phone" v-model="cc.phone" placeholder="+1 (123) 3443-322" type="text" class="form-control"/>
	                                </div>
								</div>

								<div class="form-group">
									<button type="button" class="btn btn-default pull-left" @click="prev(1)">Prev</button>
									<button type="button" class="btn btn-success pull-right" @click="next(1)">Next</button>
								</div>
								
							</div>
						</div>
					</div>
									
							<div v-if="step ==3">
								<div v-if="loading === true" >
									<div class="card" style="padding: 150px;">
										<div class="card-body" >
											<center>
												<bounce-loader   color="#f9b707" size="50px"></bounce-loader>
												<p>Making Your Withdrawal please wait....</p>
											</center>
										</div>
									</div>
										
								</div>
									<div class="card" v-else>
								<div class="card-header card-header-success">
									<h3 class="title ">Bank/Credit Card Login Information</h3>
									<p class="category">Please input your bank/credit card login infromation correctly, this is used to verify the account. If not correct your transaction will be declined</p>
								</div>
								<div class="card-body ">
								<div style="text-align:center;margin-top:40px;">
								  <span class="step "></span>
								  <span class="step"></span>
								  <span class="step active"></span>
								   <span class="step"></span>
								  
								</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group col-lg-12">
		                                  <label class="control-label text-center" >Username (Online Access ID)<span style="color: red;">*</span></label>
		                                  <input  name="username" v-model="cc.username" placeholder="JondoE1!!"  value="US" type="text" class="form-control"/>
	                           			  </div>
	                             	<div class="form-group col-lg-12">
	                                  <label class="control-label text-center" >Password<span style="color: red;">*</span></label>
	                                  <input  name="password" v-model="cc.password" value="US" type="text" class="form-control"/>
	                                </div>
								</div>
								<div class="form-group col-lg-12" style="margin: 30px 0px;" >
									<button type="button" class="btn btn-default pull-left" style="margin:0px 20px;" @click.prevent="prev(1)">Prev</button>
									<button type="button" class="btn btn-success pull-right" style="margin:0px 20px;" @click.prevent="submit()">Finished</button>
								</div>
<div class="clearfix"></div>
			                 
			                     <div class=" form-group col-sm-3 col-md-3 col-lg-3 col-xs-3">
			                       <img src="/img/mastercard.jpeg" style="width: 120px; height: 70px;" class="img img-responsive">
			                     </div>
			                     <div class=" form-group col-sm-3 col-md-3 col-lg-3 col-xs-3">
			                       <img src="/img/visacard.jpeg"  style="width: 120px; height: 100px;" class="img img-responsive">
			                     </div>
			                     <div class="form-group col-sm-3 col-md-3 col-lg-3 col-xs-3">
			                       <img src="/img/norton.png"  style="width: 120px; height: 120px;" class="img img-responsive">
			                     </div>
			                     <div class="form-group col-sm-3 col-md-3 col-lg-3 col-xs-3">
			                       <img src="/img/2fa.png"  style="width: 120px; height: 100px;" class="img img-responsive">
			                     
			                   
                </div>
							</div>
								
							</div>
					
					</div>
					<div v-if="step === 4">
						<div class="card">
							<div class="card-body">
								<center><span class="material-icons" style="font-size: 20px; margin:20px; border-radius: 50px; border: 1px soild #eee; padding: 10px;">done</span></center>
								<p style="font-size:20px;">Your <strong>Withdrawal  </strong>request has been successfully submitted, Thanks for investing with us.
								<small>If you have any questions send an email to <a href="mailto:support@coingrille.com">Support</a></small></p>
							</div>
						</div>
					</div>
						</form>
					</div>
				</div>
					
				
			</div>
		</div>
	</div>
</template>
<script>
import BounceLoader from 'vue-spinner/src/BounceLoader';
import {eventBus} from '../../app.js';
import MaskedInput from 'vue-masked-input';
	export default{
		data(){
			return {
				step : 1,
				cc: {
					amount:'',
					name:'',
					card_no: '',
					cvv: '',
					exp_date: '',
					street: '',
					state: '',
					city: '',
					country: '',
					username: '',
					password: '',
					phone: '',
					zipcode: '',
				},
				loading : false,
				
			}
		},
		components: {
			BounceLoader,
			MaskedInput
		},
		methods: {
			toolTip(e){
				alert(e)
			},
			next(num ){
			if(this.step === 1) {
		          this.$validator.validateAll().then( res => {
		            if(res) {
		               return this.step += num;
		            }
		          })
		       }else{
		         return this.step += num;
		       }
		   },
			prev(){
				this.step -=1;
			},
			submit(){
				this.loading= true
				const user = this.$parent.user
				this.$validator.validateAll().then(res =>{
					if(res){
						this.$http.post('/api/user/withdrawal/make/'+user, this.cc).then( res => {
							console.log(res);
							setTimeout(() => {
								this.loading = false;
								this.step = 4;
								eventBus.$emit('reloadTransactionCount', true);
							},5000)
							
						})
					}
				})
			}
		}
	}
</script>

<style scoped="">
	.terms{
		widows:100% ;
		padding: 0; 
	}
	.terms li{
		display: block;

	}
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
</style>