<template>
	<v-row class="justify-center align-center">
		<loading :active.sync="isLoading"
						 :is-full-page="fullPage"/>
		<v-col cols="15" lg="8" ma-2 md="11" sm="13" xl="7">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center boksik">
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
									<th class="text-center">Zysk restauracji (zł)</th>
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
				</v-col>
			</v-card>
		</v-col>
	</v-row>

</template>

<script>
  import Loading from 'vue-loading-overlay';

  export default {
    name: "all-statistics",
    data() {
      return {
        statisticsItems: [],
        headers: [
          {text: 'Miesiąc', value: 'name',},
          {text: 'Ilość zamówień', value: 'price'},
        ],
        yearItems: ['2018', '2019', '2020'],
        year: '',
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
    methods: {
      getData() {
        this.isLoading = true
        axios.get(route('api.statistics.yearIndex', this.year))
          .then(response => {
            this.statisticsItems = response.data.statistics
          }).catch(error => {
          console.error(error)
        }).finally(() => {
          this.isLoading = false
        })
      },
      getMonth(index) {
        return this.months[index - 1]
      }
    }
  }
</script>

<style scoped>

</style>