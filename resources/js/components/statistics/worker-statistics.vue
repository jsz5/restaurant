<template>
	<v-row class="justify-center align-center">
		<loading :active.sync="isLoading"
						 :is-full-page="fullPage"/>
		<v-col cols="14" lg="7" ma-2 md="10" sm="12" xl="7">
			<v-card class="transparent_form">
				<v-card-title class="boksik">
					Statystyki kelnera o identyfikatorze numer {{id}}
					<v-spacer/>
				</v-card-title>
				<v-card-text class="boksik">
					<v-simple-table>
						<template v-slot:default>
							<thead>
							<tr>
								<th class="text-center">Miesiąc</th>
								<th class="text-center">Zysk pracownika z obsługiwanych zamówień (zł)</th>
							</tr>
							</thead>
							<tbody>
							<tr :key="item.id" v-for="(item, index) in statisticsItems">
								<td>{{ getMonth(index) }}</td>
								<td>{{ item }} zł</td>
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
  import Loading from 'vue-loading-overlay';

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
        months: [
          'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj',
          'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień',
          'Październik', 'Listopad', 'Grudzień'
        ],
        isLoading: false,
        fullPage: true
      }
    },
    components: {
      Loading
    },
    beforeMount() {
      this.getData()
    },
    methods: {
      getData() {
        this.isLoading = true
        axios.get(route('api.statistics.waiterIndex', [this.year, this.id]))
          .then(response => {
            this.statisticsItems = response.data.statistics
          }).catch(error => {
          console.error(error)
        }).finally(() => {
            this.isLoading = false
          }
        )
      },
      getMonth(index) {
        return this.months[index - 1]
      }
    }
  }
</script>

<style scoped>

</style>