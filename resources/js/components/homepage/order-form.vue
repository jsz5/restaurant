<template>
	<v-card>
		<v-card-title class="headline"><h2 class="major">Finalizowanie Zamówienia</h2></v-card-title>
		<v-card-text>
		<article id="zamowienie">
			<v-form v-model="valid" ref="ordering">
				<v-container>
				<div class="field"><h3>Jak możemy się z Tobą skontaktować?</h3></div>		
				<v-row>
					<v-col cols="12" md="6">
						<v-text-field v-model="name" :rules="nameRules" label="Imię" required></v-text-field>
					</v-col>

					<v-col cols="12" md="6">
						<v-text-field v-model="email" :rules="nameRules" label="E-Mail" required></v-text-field>
					</v-col>
				</v-row>

				<div class="field"><br><br><h3>Gdzie możemy Cie znaleźć?</h3></div>
				<v-row>
					<v-col cols="12" md="4">
						<v-text-field v-model="street" label="Ulica" required></v-text-field>
					</v-col>

					<v-col cols="12" md="4">
						<v-text-field v-model="city" label="Miasto" required></v-text-field>
					</v-col>

					<v-col cols="12" md="4">
						<v-text-field v-model="code" :counter="6" label="Kod Pocztowy" required></v-text-field>
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
					<v-select :items="paymentMethods" label="Metoda Płatności" dense outlined></v-select>
				</v-col>

				<v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Zamów</v-btn>
				<v-btn outlined class="mr-4" @click="reset">Wyczyść</v-btn>

				</v-container>
			</v-form>
		</article>
		</v-card-text>
	</v-card>
</template>

<script>
export default {
	name: "order-form",
	data(){return {
		valid: true,
		name: "",
		nameRules: [
			v => !!v || 'Musisz podać imię',
			v => (v && v.length <= 20) || 'Za dużo liter',
		],
		email: "",
		emailRules: [
			v => !!v || 'Musisz podać e-mail',
			v => /.+@.+\..+/.test(v) || 'Niepoprawny adres',
		],
		street: "",
		city: "",
		code: "",
		paymentMethods: ['Przelew', 'Przy odbiorze'],
	}},

	methods: {
		validate () {
			if (this.$refs.ordering.validate()) {
				this.snackbar = true
			}
		},
		reset () {
			this.$refs.ordering.reset()
		},
	}
}
</script>

<style scoped></style>