<template>
	<v-row
		class="justify-center align-center"
	>
		<v-col
			cols="12"
			sm="8"
			md="4"
		>
			<v-card class="elevation-12">
				<v-toolbar
					color="primary"
					dark
					flat
				>
					<v-toolbar-title>Logowanie</v-toolbar-title>
				</v-toolbar>
				<v-card-text>
					<v-form>
						<v-text-field
							:rules="[rules.required, rules.emailRules]"
							label="E-mail"
							prepend-icon="person"
							v-model="form.email">
						</v-text-field>

						<v-text-field
							id="password"
							label="Hasło"
							name="password"
							prepend-icon="lock"
							type="password"
							:append-icon="showPassword ? 'visibility' : 'visibility_off'"
							:type="showPassword ? 'text' : 'password'"
							:rules="[rules.required]"
							@click:append="showPassword = !showPassword"
							v-on:keyup.enter="login"
							v-model="form.password">
							>
						</v-text-field>
						<v-btn
							text
							small
							class="btn-forgot-password"
							@click="forgetPassword()">
							Nie pamiętam hasła
						</v-btn>
						<v-btn
							text
							small
							class="btn-forgot-password"
							@click="register()">
							Zarejestruj się
						</v-btn>
					</v-form>
				</v-card-text>
				<v-card-actions>
					<v-spacer/>
					<v-btn :loading="isLoading" color="primary" @click="login">Zaloguj</v-btn>
				</v-card-actions>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
  export default {
    name: "login-form",
    data() {
      return {
        showPassword: false,
        form: {
          email: "",
          password: "",
        },
        snackbarShow: false,
        text: "",
        isLoading: false,
        rules: {
          required: value => !!value || "To pole jest wymagane",
          emailRules: v =>
            /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
            "Niepoprawny adres email",
        },
      }
    },
    methods: {
      login() {
        this.isLoading = true
        axios.post('/login', {
          'email': this.form.email,
          'password': this.form.password,
        })
          .then((response) => {
            Vue.toasted.success("Zostałeś pomyślnie zalogowany do systemu").goAway(5000);
            setTimeout(function () {
              window.location.href = "/"
            }, 3000);
          })
          .catch(error => {
            if (error.response.status === 422) {
              Vue.toasted.error("Podano niepoprawne dane, spróbuj jeszcze raz").goAway(3000);
            } else {
              Vue.toasted.error(error.response.data).goAway(3000);
            }
          })
          .finally(() => {
              this.isLoading = false
            }
          );
      },
      register() {
        window.location.href = route('register');
      },
      forgetPassword() {
        window.location.href = route('password.request')
      },
    }
  }
</script>

<style scoped>

</style>