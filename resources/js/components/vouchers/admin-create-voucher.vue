<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
	<v-row class="justify-center align-center">
		<v-col cols="14" lg="7" ma-2 md="10" sm="12" xl="6">
			<v-card class="transparent_form">
				<v-toolbar color="primary" dark flat>
					<v-toolbar-title>Generowanie kuponu</v-toolbar-title>
				</v-toolbar>
				<v-card-text class="boksik">
					<v-form ref="form">
						<v-text-field :rules="[rules.required, rules.numeric]" label="Wysokość zniżki" v-bind:error-messages="errors.name"
													v-model="form.discount" outlined suffix="%"
						/>
					</v-form>
          <v-btn @click="generateVoucher" class="yellow_form_button" color="secondary" v-bind:loading="loading">
            Wygeneruj kupon
          </v-btn>
					</v-card-text>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
  import {notification, notificationError} from "../../Notifications";

  export default {
    name: "admin-create-voucher",
    data() {
      return {
        loading: false,
        rules: {
          required: value => !!value || "To pole jest wymagane",
          numeric: value => /^(\d+|\d+\.)$/.test(value) || 'Nieprawidłowy format zniżki'
        },
        dishCategory: [],
        form: {
          discount: '',
        },
        errors: {
          discount: [],
        },
				discount: ''
      };
    },
    methods: {
      generateVoucher() {
        if (this.$refs.form.validate()) {
          this.loading = true;
          this.discount = this.form.discount/100
          this.clearErrors(this.errors);
          axios.post(route('api.voucher.create'),{
            discount: this.discount
					} ).then(response => {
            notification('Pomyślnie wygenerowano kupon', 'success');
            window.location.replace(route('home'));
          }).catch(error => {
            if (error.response.statusCode === 500) {
              notificationError(error.response.data);
            } else {
              notification('Wystąpił błąd podczas generowania kuponu', 'error');
              this.fillErrors(error);
            }
          }).finally(() => {
            this.loading = false;
          })
        }
      },
      clearErrors(object) {
        let keys = Object.keys(object);
        for (let key of keys) {
          object[key] = [];
        }
      },
      fillErrors(error) {
        this.clearErrors(this.errors);
        let entries = Object.entries(error.response.data.errors);
        for (let [key, value] of entries) {
          this.errors[key] = value;
        }
      },
    }
  }
</script>

<style scoped>

</style>