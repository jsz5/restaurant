<template>
	<v-row class="justify-center align-center">
		<v-col cols="17" lg="10" ma-2 md="13" sm="15" xl="9">
			<v-card class="transparent_form">
				<v-toolbar color="primary" dark flat>
					<v-toolbar-title>Moje Ulubione Dania</v-toolbar-title>
				</v-toolbar>
					<v-card-text class="boksik">
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