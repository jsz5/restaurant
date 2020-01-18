<template>
	<v-row class="justify-space-around align-center" style="height: 70vh">
		<v-col cols="12" lg="4" ma-2 md="5" sm="8" xl="3">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center boksik">
					<v-card-title class="justify-center">
						Statystyki restauracji
					</v-card-title>
					<v-card-text>
						<v-btn @click="showAllStatistics" text>Pokaż</v-btn>
					</v-card-text>
				</v-col>
			</v-card>
		</v-col>
		<v-col
			cols="12" lg="4" ma-2 md="5" sm="8" xl="3">
			<v-card class="transparent_form">
				<v-col class="justify-center align-center boksik">
					<v-card-title class="justify-center">
						Statystyki kelnerów
					</v-card-title>
					<v-card-text>
						<v-btn @click="showWaitersStatistics" text>Pokaż</v-btn>
					</v-card-text>
				</v-col>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
  export default {
    name: "admin-statistics-index",
    methods: {
      showAllStatistics() {
        window.location.href = route("admin.allStatistics")
      },
      showWaitersStatistics() {
        window.location.href = route("admin.workersStatistics")
      }
    }
  }
</script>

<style scoped>

</style>