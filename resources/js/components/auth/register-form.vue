<template>
	<v-row class="justify-center align-center">
		<v-col cols="15" sm="11" md="7">
			<v-card class="elevation-12">
				<v-toolbar color="primary" dark flat>
					<v-toolbar-title>Zarejestruj</v-toolbar-title>
				</v-toolbar>
				<v-card-text class="boksik"> 
					<v-form>
						<v-text-field
							:rules="[rules.required]"
							label="Imię"
							v-model="form.name">
						</v-text-field>
						<v-text-field
							:rules="[rules.required]"
							label="Nazwisko"
							v-model="form.surname">>
						</v-text-field>
						<v-text-field
							:rules="[rules.required, rules.emailRules]"
							label="E-mail"
							v-model="form.email">
						</v-text-field>
						<v-text-field
							:rules="[rules.required, rules.phoneMax12]"
							label="Numer telefonu"
							v-model="form.phone">
						</v-text-field>
						<v-text-field
							:rules="[rules.required]"
							label="Ulica"
							v-model="form.address.street">
						</v-text-field>
						<v-text-field
							:rules="[rules.required]"
							label="Numer domu "
							v-model="form.address.houseNumber">
						</v-text-field>
						<v-text-field
							label="Numer mieszkania"
							v-model="form.address.flatNumber">
						</v-text-field>
						<v-text-field
							:rules="[rules.required]"
							label="Miejscowość"
							v-model="form.address.city">
						</v-text-field>
						<v-text-field
							:rules="[rules.required, rules.postCodeFormat]"
							label="Kod pocztowy"
							v-model="form.address.postCode">
						</v-text-field>
						<v-text-field
							:append-icon="show2 ? 'visibility' : 'visibility_off'"
							:rules="[rules.required, rules.min6]"
							:type="show2 ? 'text' : 'password'"
							@click:append="show2 = !show2"
							label="Hasło"
							v-model="form.password">
						</v-text-field>
						<v-text-field
							:append-icon="show3 ? 'visibility' : 'visibility_off'"
							:rules="[rules.required, rules.min6, rules.passwordRules]"
							:type="show3 ? 'text' : 'password'"
							@click:append="show3 = !show3"
							label="Powtórz hasło"
							v-model="form.repeatPassword">
						</v-text-field>
						<v-btn @click="register" color="primary">
							Zarejestruj
						</v-btn>
					</v-form>
				</v-card-text>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
  export default {
    name: "register-form",
    data() {
      return {
        form: {
          id: '',
          name: '',
          surname: '',
          email: '',
          address: {
            street: '',
            houseNumber: '',
            flatNumber: '',
            postCode: '',
            city: '',
          },
          phone: '',
          password: '',
          repeatPassword: ''
        },
        errors: {
          name: '',
          surname: '',
          email: '',
          address: '',
          phone: '',
        },
        rules: {
          required: value => !!value || "To pole jest wymagane",
          emailRules: v => /^\w+([.-]?\w+)*([+]\w)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Niepoprawny adres email',
          phoneMax12: value => value.length <= 12 || 'Numer telefonu powinien mieć mniej niż 13 znaków',
          postCodeFormat: value => /^\d{2}-\d{3}$/.test(value) || 'Nieprawidłowy format kodu pocztowego',
          min6: v => v.length >= 6 || 'Hasło musi mieć conajmniej 6 znaków',
          passwordRules: value => ((value && !value.localeCompare(this.form.password)) || "Hasła nie są takie same"),

        },
        show2: false,
        show3: false,
      }
    },
    methods: {
      register() {
        let formAddress = this.form.address;
        formAddress = JSON.stringify(formAddress);
        axios.post('/api/user/store-customer', this.form).then(
          response => {
            Vue.toasted.success(response.data.message).goAway(5000);
            setTimeout(function () {
              window.location.href = route('home')
            }, 5000);
          },
          error => {
            if (error.response.status === 422) {
              Vue.toasted.error("Podano niepoprawne dane, spróbuj jeszcze raz").goAway(3000);
            } else {
              Vue.toasted.error(error.response.data).goAway(3000);
            }
          })
      },
    }
  }
</script>

<style scoped>

</style>



