<template>
	<v-row class="justify-center align-center">
		<v-col cols="12" lg="5" ma-2 md="8" sm="10" xl="4">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center">
					<v-card-title>
						Moje kupony
					</v-card-title>
					<v-card-text>
						<v-data-table
							:headers="headers"
							:items="vouchersItems"
							:items-per-page="5"
							class="elevation-1"
						>
							<template slot="item" slot-scope="props">
								<tr>
									<td class="text-center">{{ props.item.percentageDiscount }} %</td>
									<td class="text-left">{{ props.item.expire_at || "brak ograniczeń"}}</td>
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
    name: "user-vouchers-index",
    data() {
      return {
        vouchersItems: [],
        headers: [
          {text: 'Wielkość zniżki', value: '',},
          {text: 'Data ważności', value: ''},
        ],
      }
    },
    beforeMount() {
      this.getData()
    },
    methods: {
      getData() {
        axios.get(route('api.user.getMyVoucher'))
          .then(response => {
            this.vouchersItems = response.data
						this.vouchersItems.forEach(item=>{
						  item.percentageDiscount = item.discount*100
						})
          }).catch(error => {
          console.error(error)
        })
      },
    }
  }
</script>

<style scoped>

</style>