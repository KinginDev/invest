<template>
	<div>
		<div class="sidebar" data-color="green" data-background-color="white" data-image="/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
         <img src="new-homepage/new-logo.png" />
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <router-link :to="{name: 'index'}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
         </router-link>
           <router-link :to="{name: 'transactions'}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link">
              <i class="material-icons">history</i>
              <p> Histroy</p>
            </a>
          </router-link>
            <router-link :to="{name: 'deposit', params: { id}}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">account_balance_wallet</i>
              <p>Deposit</p>
            </a>
          </router-link>
          <router-link :to="{name: 'withdrawal', params: { id: 123 }}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">payment</i>
              <p>Withdrawal</p>
            </a>
         </router-link>
          <router-link :to="{name: 'profile'}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">account_circle</i>
              <p>Profile</p>
            </a>
         </router-link>
             <router-link :to="{name: 'security'}" exact active-class="active" tag="li" class="nav-item" >
            <a class="nav-link">
              <i class="material-icons">security</i>
              <p>Security</p>
            </a>
         </router-link>
           <li class="nav-item ">
            <a class="nav-link" @click.prevent="logOut()" href="#">
              <i class="material-icons">lock</i>
              <p>Logout</p>
            </a>
          </li>

          
        </ul>
      </div>
    </div>
	</div>
</template>
<script>
	export default{
    props:{
      id:{
        type:String,
        required: true
      }
    },
		name: 'sidebar',
    props: {
      userId:{
        required: true,
        type: String,
      }
    },
		data(){
			return{
        id:''
			}
		},
    methods:{
      logOut(){
       return location.replace('/auth/logout');
      }

    }
	}
</script>