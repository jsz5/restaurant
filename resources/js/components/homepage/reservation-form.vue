<template>
    <v-card>
        <v-card-title class="headline"><h2 class="major">Rezerwacje</h2> </v-card-title>
        <v-card-text>
        <article id="rezerwacja">  
            <v-form v-model="valid" method="post" action="#">
            
                <!-- Nie umiem tych buttonów wyśrodkować, ehhhhh -->      
                <v-container>                                          
                    <v-row class="justify-center align-center">
                        <v-btn large class="ma-2" outlined color="primary" @click="selectionNum('3 osoby')">3 osoby</v-btn>
                        <v-btn large class="ma-2" outlined color="primary" @click="selectionNum('4 osoby')">4 osoby</v-btn>
                        <v-btn large class="ma-2" outlined color="primary" @click="selectionNum('5 osób')">5 osób</v-btn>
                        <v-btn large class="ma-2" outlined color="primary" @click="selectionNum('6 osób')">6 osób</v-btn>
                    </v-row>  

                    <v-row>
                        <v-col cols="12" md="4">
                            <v-text-field v-model="name" :rules="nameRules" :counter="20" label="Imię" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-text-field v-model="phone" :rules="phoneRules" :counter="12" label="Telefon" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-text-field v-model="date" :rules="dateRules" :counter="10" label="Data" required></v-text-field>
                        </v-col>
                    </v-row>    

                    <v-col cols="24" md="100">
                        <v-textarea v-model="textMessage" label="Wiadomość" auto-grow outlined rows="5" row-height="20"></v-textarea>
                    </v-col>

                    <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Wyślij</v-btn>

                </v-container>
            </v-form>
        </article>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    name: "reservation-form",
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
        phone: "",
        phoneRules: [
            v => !!v || 'Musisz podać numer',
            v => /[0-9]/.test(v) || 'Użyj tylko cyfr',
        ],
        date: "",
        dateRules: [
            v => !!v || 'Podaj datę rezerwacji',
            v => /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/.test(v) || 'Niepoprawna data',
        ],
        textMessage: "",
    }},

    methods: {
		validate () {
			if (this.$refs.ordering.validate()) {
				this.snackbar = true
			}
        },
        selectionNum(peopleNumber) {
            if(this.textMessage == "Zamawiam stolik na 3 osoby. " ||
                 this.textMessage == "Zamawiam stolik na 4 osoby. " ||
                 this.textMessage == "Zamawiam stolik na 5 osób. " ||
                 this.textMessage == "Zamawiam stolik na 6 osób. "){
                this.textMessage = "Zamawiam stolik na " + peopleNumber + ". " 
            }else{
                this.textMessage = "Zamawiam stolik na " + peopleNumber + ". " + this.textMessage
            }
        },
    }
}
</script>

<style scoped></style>