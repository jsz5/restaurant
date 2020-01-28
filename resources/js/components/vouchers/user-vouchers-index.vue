<template>
	<v-row class="justify-center align-center">
		<v-col cols="14" lg="7" ma-2 md="10" sm="12" xl="8">
			<v-card class="transparent_form">
				<v-toolbar color="primary" dark flat>
					<v-toolbar-title>Moje Kupony</v-toolbar-title>
				</v-toolbar>
					<v-card-text class="boksik">
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