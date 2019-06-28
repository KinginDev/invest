import Vue from'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import index from './components/Dashboard/index';
import transactions from './components/Dashboard/transactions'
import deposit from './components/Dashboard/deposit'
import profile from './components/Dashboard/profile'
import withdrawal from './components/Dashboard/withdrawal'
import security from './components/Dashboard/security'

export const router = new VueRouter({
	routes: [
		{
			path: '/',
			name: 'index',
			component: index

		},
		{
			path: '/transactions',
			name: 'transactions',
			component: transactions
		},
		{
			path: '/deposit/',
			name: 'deposit',
			component : deposit,
			  
		},
		{
			path: '/profile',
			name: 'profile',
			component: profile
		},
		{
			path: '/withdrawal',
			name: 'withdrawal',
			component: withdrawal
		},
		{
			path: '/security',
			name: 'security',
			component: security
		}

			
	]
})