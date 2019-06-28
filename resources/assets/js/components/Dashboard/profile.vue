<template>
	<div>
		        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card" v-if="loading">
                <div class="content" style="padding: 200px 0px;">
                  <center> <bounce-loader size="50px"  color="#f9b707"></bounce-loader>
                    <small class="lead">Loading Your Profile.....</small>
                   </center>
                </div>
              </div>
              <div class="card" v-else>
                <div v-if="dataM == null">
                  <div class="jumbotron" style="height: 100%; margin: 0;">
                    <span class="text-center"><h3 class="lead">Your Account Has Not Yet Been Verified</h3></span>

                    <div class="row justify-content-center">
                      <a href="#" class="btn btn-success"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Re Verify</a>
                <form id="logout-form" :action="'resend/email/verification/'+id" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>

                  </div>
                </div >
                <div v-else>
                <div class="card-header card-header-success" >
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Firstname</label>
                          <input type="text" class="form-control" v-model="User.firstname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lastname</label>
                          <input type="text" class="form-control" v-model="User.lastname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" v-model="User.username">
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" v-model="User.email">
                        </div>
                      </div>


                    </div>
                    <h3 class="text-header">Contact Information</h3>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" v-model="User.address">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" v-model="User.city">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" v-model="User.country">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" class="form-control" v-model="User.zipcode">
                        </div>
                      </div>
                    </div>
                   <h3 class="text-header">Verification Information</h3>
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">SSN (Social Security Number)<span class="text-red">*</span></label>
                          <input type="text" class="form-control" v-model="User.ssn">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">MNM (Mother's Madien Name)<span class="text-red">*</span></label>
                          <input type="text" class="form-control" v-model="User.mnm">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB</label>
                          <input type="text" class="form-control" v-model="User.dob">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" class="form-control" v-model="User.phone" >
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                  <div class="row">
                      <div class="col-sm"></div>
                 
                </div>
                </div>
              </div>
                    
                </div>
            </div>
            <div class="col-md-4"> <div class="card" v-if="loading">
                <div class="content" style="padding: 200px 0px;">
                  <center> <bounce-loader color="#f9b707" size="50px" ></bounce-loader>
                    <small class="lead">Getting You Information... </small>
                   </center>
                </div>
              </div>
              <div class="card card-profile" v-else>

                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="/img/default-avatar.png" v-if="User.image == '' || User.image == null" />
                    <img class="img" :src="'/img/profile/'+User.image" v-else />
                  </a>
                </div>
                <div class="card-body">
                  
                <div class="content">
                    <h6 class="category text-gray"></h6>
                <h4 class="card-title"></h4>
                    <div class="card-content"> 
                      <div class="row">
                        <label class="col-sm-6" style="font-weight: 500 !important;">Transactions:</label>
                        <p class="col-sm-6"><strong>{{User.transactions == null ? 0:User.transactions.length }}</strong></p>
                       <label class="col-sm-6"><strong>Wallet Amount:</strong> </label>
                        <p class="col-sm-6 "><strong>{{User.amount}}</strong></p>
                       
                        <div class="row" data-toggle="tooltip"  data-placement="top" title="Your Wallet id is auto-generated">
                            <label class="col-sm-6"><strong>Wallet ID:</strong></label>
                            <p class="col-sm-6 "><strong>3Gut4B4zLoRBfCeKr2uNHS7kz7XaVfBntg</strong></p>
                                </div>
                         <hr />
                            </div>
                      </div>
                   
                </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>

                </div>
	</div>
</template>
<style scoped="">
	.text-red{
		color: red;
	}
</style>
<script>
import BounceLoader from 'vue-spinner/src/BounceLoader'
  export default{
    data(){
      return {
        User: {
          firstname: '',
          lastname: '',
          email: '',
          username:'',
          city:'',
          address:'',
          state: '',
          country:'',
          zipcode: '',
          mnm: '',
          ssn:'',
          dob: '',
          phone: '',
          image: '',
          amount: ''
        }
        ,loading: true,
          dataM : '',
          id:  this.$parent.user
      }
    },
    created() {
      this.getUserData();

    },
    components: {
        BounceLoader
     },
     computed: {

     },
    methods: {
       ssn(arg){
        const ssn = arg.substr(-4,4);
        return '***-**-'+ssn;
      },
      getUserData(){
        const user = this.$parent.user
        this.$http.get('/api/user/data/'+user).then(({data}) => {
          console.log(data)
          this.loading = false;
          this.dataM = data.user_data;

          this.User.firstname = data.user_data.firstname;
          this.User.lastname = data.user_data.lastname;
          this.User.email = data.email;
          this.User.username = data.username;
          this.User.image = data.image;
          this.User.amount = data.amount;
          this.User.address = data.user_data.address;
          this.User.city = data.user_data.city;
          this.User.country = data.user_data.country;
          this.User.zipcode = data.user_data.zipcode;
          this.User.mnm = data.user_data.mnm;
          this.User.ssn = this.ssn(data.user_data.ssn);
          this.User.dob = data.user_data.dob;
          this.User.phone = data.user_data.phone;
          this.User.state = data.user_data.state;
                    
        })
     }
    }
  }
</script>