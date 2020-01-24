<template>
	<v-row class="justify-center align-center">
		<v-col cols="14" lg="7" ma-2 md="10" sm="12" xl="7">
			<v-card class="transparent_form">
					<v-card-title class="boksik">
						Statystyki kelnera o identyfikatorze numer {{id}}
						<v-spacer></v-spacer>
					</v-card-title>
					<v-card-text class="boksik">
						<v-simple-table>
							<template v-slot:default>
								<thead>
								<tr>
									<th class="text-center">Miesiąc</th>
									<th class="text-center">Ilość zrealizowanych zamówień</th>
								</tr>
								</thead>
								<tbody>
								<tr v-for="(item, index) in statisticsItems" :key="item.id">
									<td>{{ getMonth(index) }}</td>
									<td>{{ item }}</td>
								</tr>
								</tbody>
							</template>
						</v-simple-table>
					</v-card-text>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
  export default {
    name: "worker-statistics",
    props: ['id', 'year'],
    data() {
      return {
        statisticsItems: [],
        headers: [
          {text: 'Miesiąc', value: 'name',},
          {text: 'Ilość zamówień', value: 'price'},
        ],
        months :[
          'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj',
          'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień',
          'Październik', 'Listopad', 'Grudzień'
        ]
      }
    },
		beforeMount() {
      this.getData()
    },
    methods: {
      getData() {
        axios.get(route('api.statistics.waiterIndex', [this.year, this.id]))
          .then(response => {
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