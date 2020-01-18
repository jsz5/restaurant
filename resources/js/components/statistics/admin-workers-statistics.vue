<template>
	<v-row class="justify-center align-center">
		<v-col cols="18" lg="12" ma-2 md="13" sm="15" xl="8">
			<v-card class="transparent_form">
				<v-card-title class="boksik">
					Pracownicy
				</v-card-title>
        <v-spacer></v-spacer>
					<v-select class="boksik"
						:items="yearItems"
						label="Wybierz rok"
						outlined
						v-model="year"
					/>
				<v-data-table
					:headers="headers"
					:items="workers"
				>
					<template v-slot:item.action="{ item }">
						<v-btn :disabled="!year" @click="getStatistics(item.id)"  text>Pokaż statystyki</v-btn>

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
      getStatistics(id){
       window.location.href = route('admin.workerStatistics', [id, this.year])
		 }
    }
  }
</script>

<style scoped>

</style>