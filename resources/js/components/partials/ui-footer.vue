<template>
	<v-footer class="footer">
		<v-spacer></v-spacer>
		<div>&copy; 2019SmartRestaurant</div>
		<v-spacer></v-spacer>
	</v-footer>
</template>

<script>
  export default {
    name: "ui-footer"
  }
</script>

<style scoped>
	.footer{
		position: fixed;
		bottom: 0;
		width: 100%;
		color: black;
		font-weight:bold;
		background-color: #F2B25D;
		opacity: 0.75
	}

</style>