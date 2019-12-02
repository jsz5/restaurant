<template>
	<v-col class="wrapper">
	<v-row class="wrapper">
		<!-- Header -->
		<header id="header">
		
			<!-- Przykładowe logo jako cytrynka z FA:
			<div class="logo"><i class="icon fa-lemon"></i></div>-->
			
			<div class="content">
				<div class="inner">
					<h1>SmartRestraunt</h1>
					<p>No generalnie u nas smacznie, pysznie jest i tanio itd., wiadomo</p>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="#zamowienie" @click.stop="orderingdialog = true">Zamów</a></li>
					<li><a href="#menu" @click.stop="menudialog = true">Menu</a></li>
					<li><a href="#rezerwacja" @click.stop="reservationdialog = true">Rezeruj</a></li>
					<li><a href="#kontakt" @click.stop="contactdialog = true">Kontakt</a></li>
					<li><a href="/login">Zaloguj</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main">
			<!-- Zamawianie -->
			<v-dialog overlay-opacity="0.915" v-model="orderingdialog" max-width="620">
				<order-form></order-form>
			</v-dialog>

			<!-- Menu -->
			<v-dialog overlay-opacity="0.915" v-model="menudialog">
				<menu-form></menu-form>
				<!-- <user-menu></user-menu> -->
			</v-dialog>

			<!-- Rezerwacja -->
			<v-dialog overlay-opacity="0.915" v-model="reservationdialog" max-width="620">
				<reservation-form></reservation-form>
			</v-dialog>

			<!-- Kontakt -->
			<v-dialog overlay-opacity="0.915" v-model="contactdialog" max-width="620">
				<contact-form></contact-form>
			</v-dialog>

		</div>
	</v-row>
	</v-col>
</template>

<script>
  export default {
	name: "homepage",
	data: () => ({
	  orderingdialog: false,
	  menudialog: false,
	  reservationdialog: false,
	  contactdialog: false,
	}),
	
	methods: {

    },
  }


</script>

<style scoped>
	h1{
		font-size: 8rem;
	}
	.homepage_title{
		height: 100%;
	}
</style>