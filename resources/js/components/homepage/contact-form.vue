<template>
    <v-card>
        <v-card-title class="headline"><h2>Formularz kontaktowy</h2></v-card-title>
        <v-card-text>
        <article id="kontakt">
            <v-form ref="contact" v-model="valid">
                <v-row>
                    <v-col cols="12" md="6">
                    <v-text-field v-model="name" :rules="nameRules" :counter="20" label="Imię" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                    <v-text-field v-model="email" :rules="emailRules" label="E-Mail" required></v-text-field>
                    </v-col>
                </v-row>

                <v-col cols="28" md="16">
                    <v-textarea v-model="text" label="Wiadomość" auto-grow outlined rows="5" row-height="20" required></v-textarea>
                </v-col>

                <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Wyślij</v-btn>
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
</template>

<script>
  export default {
    name: "contact-form",
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
      text: "",
    }
  },
    methods: {
        validate () {
            if (this.$refs.form.validate()) {
            this.snackbar = true
            }
        },
    }
  }
</script>

<style scoped>
  .theme--dark.v-card {
    background-color: rgba(0, 0, 0, 0.5) !important;
  }
</style>