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
					<li><a href="#zaloguj">Zaloguj</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main">
			<!-- Zamawianie -->
			<v-dialog overlay-opacity="0.915" v-model="orderingdialog" max-width="620">
			<v-card>
				<v-card-title class="headline"><h2 class="major">Finalizowanie Zamówienia</h2></v-card-title>
				<v-card-text>
				<article id="zamowienie">
					<v-form v-model="valid" ref="ordering">
						<v-container>
						<div class="field"><h3>Jak możemy się z Tobą skontaktować?</h3></div>		
						<v-row>
							<v-col cols="12" md="6">
							<v-text-field v-model="firstname" :rules="nameRules" :counter="20" label="Imię" required></v-text-field>
							</v-col>

							<v-col cols="12" md="6">
							<v-text-field v-model="email" :rules="nameRules" label="E-Mail" required></v-text-field>
							</v-col>
						</v-row>

						<div class="field"><br><br><h3>Gdzie możemy Cie znaleźć?</h3></div>
						
						<v-row>
							<v-col cols="12" md="4">
							<v-text-field v-model="street" :rules="nameRules" :counter="10" label="Ulica" required></v-text-field>
							</v-col>

							<v-col cols="12" md="4">
							<v-text-field v-model="city" :rules="nameRules" :counter="10" label="Miasto" required></v-text-field>
							</v-col>

							<v-col cols="12" md="4">
							<v-text-field v-model="code" :rules="emailRules" :counter="6" label="Kod Pocztowy" required></v-text-field>
							</v-col>
						</v-row>

						<div class="field"><br><br><h3>Masz dla nas coś jeszcze?</h3></div>	

						<!-- <v-row justify="space-around">
							<v-switch v-model="valid" class="ma-6" label="Wegan" readonly></v-switch>
							<v-switch v-model="lazy" class="ma-6" label="Zapisz Adres"></v-switch>
						</v-row> -->

						<v-col cols="24" md="100">
							<v-textarea label="Uwagi do zamówienia" auto-grow outlined rows="5" row-height="20"></v-textarea>
						</v-col>

						<div class="field"><br><h3>Płatność</h3></div>

						<v-col class="d-flex" cols="24" sm="8">
							<v-select :items="items" label="Metoda Płatności" dense outlined></v-select>
						</v-col>

						<v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Zamów</v-btn>
						<v-btn color="white" outlined class="mr-4" @click="reset" >Reset Form</v-btn>

						</v-container>
					</v-form>
				</article>
				</v-card-text>
			</v-card>
			</v-dialog>

			<!-- Menu -->
			<v-dialog overlay-opacity="0.915" v-model="menudialog" max-width="620">
			<v-card>
				<v-card-title class="headline"><h2 class="major">Menu</h2></v-card-title>
				<v-card-text>
					<article id="menu">
						<div class="container">	 
						<div class="tabliststyle">
							<ul role="tablist centeraction">
								<li><a class="tablinks" onclick="openCity(event, 'Breakfast')">Przekąski</a></li>
								<li><a class="tablinks" onclick="openCity(event, 'dania')" id="defaultMenu">Dania Główne</a></li>
								<li><a class="tablinks" onclick="openCity(event, 'Dinner')">Napoje</a></li>
							</ul>
						</div>		
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade tabcontent" id="Breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
								<div class="single_menu_list">
									<img src="background.jpg" alt="">
									<div class="menu_content">
										<h4>Frytas  <span>8.49zł</span></h4>
										<p>Fryteczki z róznościami zawsze fajnie wchodzą. [Skład: Frytki, Sos Czosnkowy, Ketchup, Hummus]</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade tabcontent" id="dania" role="tabpanel" aria-labelledby="lunch-tab">
								<div class="single_menu_list">
									<img src="background.jpg" alt="">
									<div class="menu_content">
										<h4>Burger Special  <span>17.49zł</span></h4>
										<p>Burger bardzo specjalny, dokładnie taki, jak wszędzie. [Skład: Bułka, Wołowina, Ser Cheddar, Rukola, Pomidor]</p>
									</div>
								</div>
								<div class="single_menu_list">
									<img src="background.jpg" alt="">
									<div class="menu_content">
										<h4>Burger Biedak  <span>9.99zł</span></h4>
										<p>Kucharze go uwielbiają, bo idą na przerwe po zrobieniu. [Skład: Bułka, Szynka]</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade active show tabcontent" id="Dinner" role="tabpanel" aria-labelledby="dinner-tab">
								<div class="single_menu_list">
									<img src="background.jpg" alt="">
									<div class="menu_content">
										<h4>Puszka Coca-Coli  <span>3.99zł</span></h4>
										<p>Zwykła puszka, taka o. 250ml</p>
									</div>
								</div>
								<div class="single_menu_list">
									<img src="/background.jpg" alt="">
									<div class="menu_content">
										<h4>Woda Mineralna  <span>2.99zł</span></h4>
										<p>Podawana z lodem, żeby nie było. 330ml</p>
									</div>
								</div>
							</div>
						</div>
						</div>
					</article>
				</v-card-text>
			</v-card>
			</v-dialog>

			<!-- Rezerwacja -->
			<v-dialog overlay-opacity="0.915" v-model="reservationdialog" max-width="620">
			<v-card>
				<v-card-title class="headline"><h2 class="major">Rezerwacje</h2> </v-card-title>
				<v-card-text>
				<article id="rezerwacja">  
					<v-form v-model="valid" method="post" action="#">
					
						<!-- Nie umiem tych buttonów wyśrodkować, ehhhhh -->      
						<v-container>                                          
							<v-row align-items="center" class="centeraction">
								<v-btn large class="ma-2" outlined color="primary">3 osoby</v-btn>
								<v-btn large class="ma-2" outlined color="primary">4 osoby</v-btn>
								<v-btn large class="ma-2" outlined color="primary">5 osoby</v-btn>
								<v-btn large class="ma-2" outlined color="secondary">6 osób</v-btn>
							</v-row>  

							<v-row>
								<v-col cols="12" md="4">
								<v-text-field v-model="street" :rules="nameRules" :counter="20" label="Imię" required></v-text-field>
								</v-col>

								<v-col cols="12" md="4">
								<v-text-field v-model="city" :rules="nameRules" :counter="12" label="Telefon" required></v-text-field>
								</v-col>

								<!-- 
									Można dać jakiś datetimepicker do fielda poniżej.
									Otworzy fajny pop-upik (okienko) z datą do wybrania.
								-->

								<v-col cols="12" md="4">
								<v-text-field v-model="code" :rules="emailRules" :counter="10" label="Data" required></v-text-field>
								</v-col>
							</v-row>    

							<v-col cols="24" md="100">
								<v-textarea label="Wiadomość" auto-grow outlined rows="5" row-height="20"></v-textarea>
							</v-col>

						</v-container>
					</v-form>
				</article>
				</v-card-text>
			</v-card>
			</v-dialog>

			<!-- Kontakt -->
			<v-dialog overlay-opacity="0.915" v-model="contactdialog" max-width="620">
			<v-card>
				<v-card-title class="headline"><h2 class="major">Kontakt</h2></v-card-title>
				<v-card-text>
				<article id="kontakt">
					<v-form ref="contact" v-model="valid">
						<v-container>
						<v-row>
							<v-col cols="12" md="6">
							<v-text-field v-model="firstname" :rules="nameRules" :counter="20" label="Imię" required></v-text-field>
							</v-col>

							<v-col cols="12" md="6">
							<v-text-field v-model="lastname" :rules="nameRules" :counter="30" label="E-Mail" required></v-text-field>
							</v-col>
						</v-row>

						<v-col cols="24" md="100">
							<v-textarea label="Wiadomość" auto-grow outlined rows="5" row-height="20" required></v-textarea>
						</v-col>

						<v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Validate</v-btn>

						</v-container>
					</v-form>

					<!-- Potrzebny by tu był Font Awesome by użyć ich ikon
					do facebooka i instagrama. -->

					<ul class="icons">
						<li>Znajdź nas również na: </li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>
				</article>
				</v-card-text>
			</v-card>
			</v-dialog>
		</div>
	</v-row>
	</v-col>
</template>

<script>
  export default {
	name: "homepage",
	data: () => ({
	  items: ['Przelew', 'Przy odbiorze'],
	  orderingdialog: false,
	  menudialog: false,
	  reservationdialog: false,
	  contactdialog: false,
	}),
	
	methods: {
      validate () {
        if (this.$refs.ordering.validate()) {
          this.snackbar = true
        }
      },
      reset () {
        this.$refs.ordering.reset()
      },
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