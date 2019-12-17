<template>
	<v-row class="justify-center align-center">
		<v-col cols="12" lg="5" ma-2 md="8" sm="10" xl="4">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center">
					<v-card-title>
						Moje ulubione dania
					</v-card-title>
					<v-card-text>
						<v-data-table
							:headers="headers"
							:items="favouriteDishes"
							:items-per-page="5"
							class="elevation-1"
						>
							<template slot="item" slot-scope="props">
								<tr>
									<td class="text-center">{{ props.item.name }}</td>
									<td class="text-left">{{ props.item.price}} zł</td>
									<td v-if="props.item.photoPath"><v-img  :src="props.item.photoPath" aspect-ratio="1.7" contain/></td>
									<td v-else>Brak zdjecia</td>
								</tr>
							</template>
						</v-data-table>
					</v-card-text>
				</v-col>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>

  export default {
    name: "user-favourite-dishes",
    data() {
      return {
        favouriteDishes: [],
        headers: [
          {text: 'Nazwa', value: '',},
          {text: 'Cena', value: ''},
          {text: 'Zdjęcie', value: ''},
        ],
      }
    },
    beforeMount() {
      this.getData()
    },
    methods: {
      getData() {
        axios.get(route('api.favouriteDish.index'))
          .then(response => {
            this.favouriteDishes = response.data
          }).catch(error => {
          console.error(error)
        })
      },
    }
  }
</script>

<style scoped>

</style>