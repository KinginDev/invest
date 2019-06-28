<template>
	<div>
	 <div class="container-fluid">
         	<div class="row">
			<div :class="card.layout"  v-for="card in cards" :key="card.name">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">{{card.icon}}</i>
                  </div>
                  <p class="card-category">{{card.category}}</p>
                  <h3 class="card-title">{{card.title}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">{{card.lilIcon}}</i> <router-link :to="card.link">{{card.lilText}}</router-link>
                  </div>
                </div>
              </div>
           </div>
	</div>
</div>
		
	</div>
</template>
<script>
	export default{
		props:{
			cards:{
				type: Array,
				required: true
			}
			
		}
	}
</script>