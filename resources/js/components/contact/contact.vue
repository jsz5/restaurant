<template>
	<v-row class="justify-center align-center">

			<v-card-title>
				<h1 style="width: 700px">Dotrzyj do nas:</h1>
			</v-card-title>

			<v-col cols="12" lg="6" md="10" sm="12" xl="6">
				<contact-form class="boksisko"></contact-form>
			</v-col>

			<v-card class="transparent_form boksisko" max-width="400" height="474">
				<v-card-title >
					<h2>Znajdz nas tu:</h2>
				</v-card-title>
				<v-list style="background-color: transparent !important" two-line>
					<v-list-item>
						<v-list-item-icon>
							<v-icon color="primary">restaurant</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>{{this.name}}</v-list-item-title>
							<v-list-item-subtitle></v-list-item-subtitle>
						</v-list-item-content>
					</v-list-item>
					<v-list-item>
						<v-list-item-icon>
							<v-icon color="primary">mail</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>{{this.email}}</v-list-item-title>
							<v-list-item-subtitle></v-list-item-subtitle>
						</v-list-item-content>
					</v-list-item>
					<v-list-item>
						<v-list-item-icon>
							<v-icon color="primary">phone</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>{{this.phone}}</v-list-item-title>
							<v-list-item-subtitle></v-list-item-subtitle>
						</v-list-item-content>
					</v-list-item>
					<v-list-item>
						<v-list-item-icon>
							<v-icon color="primary">room</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>{{this.address}}</v-list-item-title>
							<v-list-item-subtitle></v-list-item-subtitle>
						</v-list-item-content>
					</v-list-item>
					<v-list-item>
						<v-list-item-icon>
							<v-icon color="primary">access_time</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>{{this.time}}</v-list-item-title>
							<v-list-item-subtitle>Godziny otwarcia</v-list-item-subtitle>
						</v-list-item-content>
					</v-list-item>
				</v-list>
			</v-card>
	</v-row>
</template>

<script>
  export default {
    name: "contact-page",
    data() {
      return {
        address: "ul. Sienkiewicza 48, Wrocław",
        email: "smartrestaurant@gmail.com",
        name: "SmartRestaurant",
        time: "12:00 - 23:00",
        phone: "+48 500 400 400",
      };
    },
  };
</script>

<style>
	.v-list.v-sheet.v-sheet--tile.theme--light.v-list--two-line{
		background: none;
	}
</style>