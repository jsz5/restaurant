<template>
	<v-row class="justify-center align-center">
		<v-col cols="12" lg="5" ma-2 md="8" sm="10" xl="4">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center">
					<v-card-title>
						Statystyki restauracji
						<v-spacer></v-spacer>
						<v-select
							:items="yearItems"
							label="Wybierz rok"
							outlined
							v-model="year"
							v-on:change="getData()"
						/>
					</v-card-title>
					<v-card-text>
						<v-simple-table>
							<template v-slot:default>
								<thead>
								<tr>
									<th class="text-center">Miesiąc</th>
									<th class="text-center">Ilość wszystkich zamówień</th>
								</tr>
								</thead>
								<tbody>
								<tr :key="item.id" v-for="(item, index) in statisticsItems">
									<td>{{ getMonth(index) }}</td>
									<td>{{ item }}</td>
								</tr>
								</tbody>
							</template>
						</v-simple-table>
					</v-card-text>
				</v-col>
			</v-card>
		</v-col>
	</v-row>

</template>

<script>

  export default {
    name: "admin-workers-statistics",
    data() {
      return {
        statisticsItems: [],
        headers: [
          {text: 'Miesiąc', value: 'name',},
          {text: 'Ilość zamówień', value: 'price'},
        ],
        yearItems: ['2018', '2019', '2020'],
        year: '',
        months :[
          'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj',
          'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień',
          'Październik', 'Listopad', 'Grudzień'
        ]
      }
    },
    methods: {
      getData() {
        console.log(this.months[1])
        axios.get(route('api.statistics.yearIndex', this.year))
          .then(response => {
            console.log(response)
            this.statisticsItems = response.data.statistics
          }).catch(error => {
          console.error(error)
        })
      },
      getMonth(index) {
        return this.months[index-1]
      }
    }
  }
</script>

<style scoped>

</style>