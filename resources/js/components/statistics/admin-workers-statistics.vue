<template>
	<v-row class="justify-center align-center">
		<v-col cols="12" lg="8" ma-2 md="10" sm="12" xl="6">
			<v-card class="transparent_form">
				<v-card-title>
					Pracownicy
					<v-spacer></v-spacer>
					<v-select
						:items="yearItems"
						label="Wybierz rok"
						outlined
						v-model="year"
						v-on:change="getData(item)"
					/>
				</v-card-title>
				<v-data-table
					:headers="headers"
					:items="workers"
				>
					<template v-slot:item.action="{ item }">
						<v-btn :disabled="!year" @click="getStatistics(item.id)"  text>Pokaż statystyki</v-btn>
<!--						<v-icon>edit</v-icon>-->
					</template>

				</v-data-table>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>

  export default {
    name: "admin-workers-statistics",
    data() {
      return {
        search: '',
        workers: [],
        headers: [
          {
            text: 'ID',
            value: 'id'
          },
          {
            text: 'Imię',
            value: 'name'
          },
          {
            text: 'Nazwisko',
            value: 'surname'
          },
          {
            text: 'E-mail',
            value: 'email'
          },
          {
            text: 'Statystyki',
            value: 'action'
          },
        ],
        yearItems: ['2018', '2019', '2020'],
        year: '',
      };
    },
    beforeMount() {
      axios.get(route('api.user.fetchWorkers')).then(result => {
        this.workers = result.data;
      }).catch(error => {
        console.error(error.response);
      });
    },
    methods: {
     getData(id){
       console.log(id)
		 }
    }
  }
</script>

<style scoped>

</style>