<template>
	
	  <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container" >
		                <div class="card wizard-card" data-color="green" id="wizard">
		                	<div v-if="formLoading" style="padding-top: 150px;">
		                		<center><bounce-loader size="50px"></bounce-loader>
		                			<p style="font-weight: 500;">Activating Your Account Please Wait...</p>
		                		</center>
		                	</div>
		                    <form action="" method="" v-else enctype="mu">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Build Your Profile
		                        	</h3>
									<h5>Thank you for choosing Cryptoinvestments, you have to verify your account before using our service.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">About</a></li>
			                            <li><a href="#account" data-toggle="tab">Contact</a></li>
			                            <li><a href="#address" data-toggle="tab">Verification</a></li>
			                               <li><a href="#card" data-toggle="tab">Card Information</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Please fill all this with your information</h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture" @change="onFileChanged">
		                                        	</div>
		                                        	<h6>Choose Picture</h6>
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label">First Name<span style="color: red;">*</span></label>
			                                          <input  name="firstname" v-model="firstname" type="text" class="form-control"/>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
													  <label class="control-label">Last Name <span style="color: red;">*</span></label>
													  <input name="lastname" v-model="lastname"  type="text" class="form-control">
													</div>
												</div>
		                                	</div>
		                                	<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-">
			                                            <label class="control-label">Email <span style="color: red;">*</span></label>
			                                            <input name="email" v-model="email"  type="email" class="form-control">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="account">
		                                <h4 class="info-text"> Contact Information </h4>
		                                <div class="row">
		                                	<div class="col-sm-7 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Street Name</label>
	                                    			<input type="text" v-model="street_name"  class="form-control">
	                                        	</div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Street Number</label>
		                                            <input type="text" v-model="street_number"  class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">City</label>
		                                            <input type="text" v-model="city"  class="form-control">
		                                        </div>
		                                    </div>
		                                     <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">State</label>
		                                            <input type="text" v-model="state"  class="form-control">
		                                        </div>
		                                    </div>
		                                     <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Country</label>
		                                            <input type="text" v-model="country"  class="form-control" value="US" disabled>
		                                        </div>
		                                    </div>
		                                     <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Zipcode</label>
		                                            <masked-input mask="11111" type="text" v-model="zipcode"  class="form-control"/>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Verification Information  </h4>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">SSN (Social Security Number)</label>
	                                    			<masked-input mask="111-11-1111" type="text" v-model="ssn" class="form-control"/>
	                                        	</div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group label-floating">
		                                            <label>DOB (Date of Birth)</label>
		                                            <masked-input mask="11/11/1111" type="text" v-model="dob" placeholder="DD/MM/YYYY" class="form-control" value=""/>
		                                        </div>
		                                    </div>
		                                     <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">MNM (Mother's Madien Name)</label>
		                                            <input type="text" v-model="mnm" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Phone</label>
		                                            <masked-input type="text" mask="\+\1 (111) 111-1111" v-model="phone" class="form-control"/>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                              <div class="tab-pane" id="card">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Card  Information  </h4>
		                                    </div>
		                                    <div class="col-md-6">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Name on Card </label>
	                                    			<input type="text" v-model="name_on_card" class="form-control"/>
	                                        	</div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group label-floating">
		                                            <label>Card Number </label>
		                                            <masked-input mask="1111-1111-1111-1111" type="text" v-model="card_no"  class="form-control" value=""/>
		                                        </div>
		                                    </div>
		                                     <div class="col-md-4 ">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label"></label>
		                                            <input type="text" v-model="exp_date" mask="11/1111" class="form-control" placeholder="DD/YYY">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-4">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">CVV </label>
		                                            <masked-input type="text" mask="111" v-model="cvv" class="form-control"/>
		                                        </div>
		                                    </div>
		                                     <div class="col-md-4">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Zipcode </label>
		                                            <masked-input type="text" mask="11111" v-model="zipcode_c" class="form-control" />
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Street </label>
		                                            <input type="text" v-model="street_c" class="form-control" />
		                                        </div>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">City </label>
		                                            <input type="text" v-model="city_c" class="form-control" />
		                                        </div>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">State </label>
		                                            <input type="text" v-model="state_c" class="form-control" />
		                                        </div>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Country </label>
		                                            <input type="text" v-model="country_c" class="form-control" />
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' @click="next()" />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' @click.prevent="activateUser()" />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->
</template>
<script>
import MaskedInput from 'vue-masked-input';
import BounceLoader from 'vue-spinner/src/BounceLoader.vue';
	export default{
		components: {
			MaskedInput,
			BounceLoader,
		}, 
		props: {
			id : {
				type: String,
				required: true
			}
		},
		data(){
			return {
				street_number: '',
				firstname: '',
				lastname: '',
				email: '',
				state: '',
				city: '',
				zipcode: '',
				street_name: '',
				country: '',
				ssn: '',
				dob: '',
				phone: '', 
				mnm: '',
				formLoading: false,
				image: '',
				name_on_card: '',
				card_no:'',
				cvv: '',
				exp_date: '',
				state_c: '',
				city_c: '',
				zipcode_c: '',
				street_c: '',
				country_c: '',
			}
		},
		created(){
			this.getEmail();
		},
		methods: {
			getEmail(){
				this.$http.get('/api/user/activate/get/email/'+this.id).then( res => {
					this.email = res.data;
				}).catch( e => {
					console.log(e)
				})
			},
			next(){

			},
			activateUser(){
				this.formLoading = true
				this.$http.post('/api/activate/users/'+this.id, this.$data).then( res => {
					setTimeout(() => {
						this.formLoading = false;

					},5000);
					return location.replace('/dashboard');
				})
				.catch(e => {
					console.log(e)
					alert('Sorry Some of your Information seems to be incorrect, Please Refill The form');
					return location.reload();
				})
			},
			onFileChanged (event) {
				const formData = new FormData()
				formData.append('image', this.image)
			    this.image = event.target.files[0]
			    this.$http.post('/api/user/activate/upload/image/'+this.id, formData).then(res => {
			    	alert('Profile Picture upload successful')
			    })
			  },
		}
	}
</script>