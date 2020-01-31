<template>
	<v-row no-gutters class="header">
		<v-col cols="12">
			<v-row no-gutters class="justify-space-between mb-3 mt-3">
				<v-col class="hidden-sm-and-down justify-space-between" v-if="showMenu">
					<!-- <v-toolbar class="menu_links">
						<v-toolbar-items class="menu_links_full">
							<v-btn
								class="menu_item"
								v-for="item in menu"
								:key="item.id"
								@click="goTo(item.link)"
								text
							>{{item.text}}
							</v-btn>
						</v-toolbar-items>
					</v-toolbar> -->
					<v-col cols="12" lg="10" md="12" sm="12" xl="9" style="max-width: 100% !important">
						<v-tabs
							background-color="transparent"
							color="basil"
							grow
							v-model="selectedTab"
						>
						<v-tab
							:key="item.id"
							@click="goTo(item.link)"
							v-for="item in menu"
						>
							{{ item.text }}
						</v-tab>
							<v-menu offset-y v-if="!notLogged">
								<template v-slot:activator="{ on }">
									<v-tab
										color="#CBA789"
										v-on="on"
									>{{loggedUser.name + " "}}{{loggedUser.surname}}
									</v-tab>
								</template>
								<v-list>
									<v-list-item :key="id" @click="goTo(item.link)" v-for="(item, id) in loggedUserMenu">
										<v-list-item-title>{{ item.text }}</v-list-item-title>
									</v-list-item>
								</v-list>
							</v-menu>
						</v-tabs>

					</v-col>
				</v-col>
				<v-col v-if="!showMenu" class="justify-end">
					<v-row class="justify-end">
						<v-menu offset-y v-if="!notLogged">
							<template v-slot:activator="{ on }">
								<v-tab
									color="#CBA789"
									v-on="on"
								>{{loggedUser.name + " "}}{{loggedUser.surname}}
								</v-tab>
							</template>
							<v-list>
								<v-list-item :key="id" @click="goTo(item.link)" v-for="(item, id) in loggedUserMenu">
									<v-list-item-title>{{ item.text }}</v-list-item-title>
								</v-list-item>
							</v-list>
						</v-menu>
					</v-row>
				</v-col>
				<!-- <v-col>
					<v-row class="mx-3">
						<v-col v-if="notLogged" class="text-end">
							<v-tabs
								background-color="transparent"
								color="basil"
								grow
								v-model="tab"
							>
							<v-tab text v-if="showMenu" @click="register">Zarejestruj</v-tab>
							<v-tab v-if="showMenu" @click="login" color="#CBA789">Zaloguj się</v-tab>
							</v-tabs>
						</v-col>
						<v-col v-else class="text-end">
							<v-menu offset-y>
								<template v-slot:activator="{ on }">
									<v-btn
										color="#CBA789"
										v-on="on"
									>{{loggedUser.name + " "}}{{loggedUser.surname}}
									</v-btn>
								</template>
								<v-list>
									<v-list-item :key="id" @click="goTo(item.link)" v-for="(item, id) in loggedUserMenu">
										<v-list-item-title>{{ item.text }}</v-list-item-title>
									</v-list-item>
								</v-list>
							</v-menu>
						</v-col>
					</v-row> -->
					<v-col class="menu hidden-md-and-up"  v-if="showMenu">
						<v-col class="hidden-md-and-up">
							<v-menu class="responsive_menu" offset-y style="left:0 ;">
								<template v-slot:activator="{ on }">
									<v-btn class="responsive_menu_button" v-on="on">
										<v-icon>menu</v-icon>
									</v-btn>
								</template>
								<v-list class="responsive_menu_list" id="responsive">
									<v-list-item :key="id" @click="goTo(item.link)" v-for="(item, id) in menu">
										<v-list-item-title>{{ item.text }}</v-list-item-title>
									</v-list-item>
								</v-list>
							</v-menu>
						</v-col>
					</v-col>
			</v-row>
		</v-col>
	</v-row>
</template>

<script>
  export default {
    name: "ui-header",
    props: ["user", "role"],
    data() {
      return {
        questMenu: [
          {id: 1, text: "Strona główna", link: route("home")},
          {id: 2, text: "Menu", link: route("menu")},
          {id: 3, text: "Zamów online", link: route("order.create.online")},
		  {id: 4, text: "Kontakt", link: route("contact")},
		  {id: 5, text: "Zaloguj się", link: route("login")}
        ],
        adminMenu: [
          {id: 1, text: "Strona główna", link: route("home")},
          {id: 2, text: "Dania", link: route("menu.admin")},
          {id: 3, text: "Kategorie dań", link: route("dishCategory.index")},
          {id: 4, text: "Kelnerzy", link: route("worker.index")},
          {id: 5, text: "Kupony", link: route("voucher.add")},
          {id: 6, text: "Statystyki", link: route("admin.statistics")},
          {id: 7, text: "Stoliki", link: route("table.index")},
      	  {id: 8, text: "Moje Konto", link: route("user.myAccount")},
		  {id: 9, text: "Wyloguj", link: "logout"}


       ],
        waiterMenu: [
          {id: 1, text: "Stoliki", link: route("table.waiterIndex")},
          {id: 2, text: "Zamówienia", link: route("order.index")},
          {id: 3, text: "Rezerwacje", link: route("reservation.index")},

          {id: 4, text: "Moje Konto", link: route("user.myAccount")},
		  {id: 5, text: "Wyloguj", link: "logout"}



     ],
        userMenu: [
          {id: 1, text: "Zamówienia", link: route("orders.myOrders")},
          {id: 2, text: "Rezerwacje", link: route("reservation.indexUser")},
          {id: 3, text: "Kupony", link: route("user.myVouchers")},
          {id: 4, text: "Ulubione Dania", link: route("myFavouriteDishes.index")},
          {id: 5, text: "Moje Konto", link: route("user.myAccount")},
          {id: 6, text: "Wyloguj", link: "logout"}

    ]

,
        customerMenu: [
          {id: 1, text: "Strona główna", link: route("home")},
          {id: 2, text: "Menu", link: route("menu")},
          {id: 3, text: "Zamów online", link: route("order.create.online")},
          {id: 4, text: "Zarezerwuj", link: route("reservation.createUser")},
          {id: 5, text: "Kontakt", link: route("contact")},
          {id: 6, text: "Wyloguj", link: "logout"}

    ],
        employerMenu: [
          {id: 1, text: "Moje Konto", link: route("user.myAccount")},
          {id: 2, text: "Moje Statystyki", link: route("myStatistics.asWorker")},
          {id: 3, text: "Wyloguj", link: "logout"}

 ],
        administratorMenu: [
          {id: 1, text: "Moje Konto", link: route("user.myAccount")},
          {id: 2, text: "Wyloguj", link: "logout"}
        ],
        loggedUserMenu: [],
        menu: [],
        notLogged: true,
        loggedUser: "",
				showMenu: true,
        selectedTab: ''
      };
    },
    beforeMount() {
      switch (this.role) {
        case "guest":
          this.menu = this.questMenu;
          this.loggedUserMenu = this.userMenu;
          this.setupCurrentRouteInMenu(this.menu)
          break;
        case "admin":
          this.menu = this.adminMenu;
          this.loggedUserMenu = this.administratorMenu;
          this.setupCurrentRouteInMenu(this.menu)
          break;
        case "worker":
          this.menu = this.waiterMenu;
          this.loggedUserMenu = this.employerMenu;
          this.setupCurrentRouteInMenu(this.menu)
          break;
        case "customer":
          this.menu = this.customerMenu;
          this.loggedUserMenu = this.userMenu;
          this.setupCurrentRouteInMenu(this.menu)
          break;
      }
      if (this.user !== null) {
        this.notLogged = false;
        this.loggedUser = this.user;
      }
      if(route().current()==='home'){
        this.showMenu = false
			}else{
        this.showMenu = true
			}
    },

    methods: {
      goTo(route) {
        if (route === "logout") {
          this.logout();
        } else {
          window.location.href = route;
        }
      },
			setupCurrentRouteInMenu(menu){
				for(let menuItem of menu){
				  if(menuItem.link.name == route().current()){
						this.selectedTab = menuItem.id-1
					}
				}
			},
      register() {
        window.location.href = route("register");
      },
      login() {
        window.location.href = route("login");
      },
      logout() {
        axios.post("/logout").then(function () {
          window.location.href = route("login");
        });
      }
    }
  };
</script>

<style lang="scss" scoped>
	.v-card__text.header-text {
		color: white;
	}

	.v-card.v-card--flat.v-sheet.theme--light {
		border-radius: 0;
	}

	.header {
		max-height: 10rem;
	}

	.menu {
		margin-bottom: 0;
		// margin-top: -10px;
	}

	.menu_links.v-sheet.v-sheet--tile.theme--light.v-toolbar {
		background: none;
		border: none;
		box-shadow: none;
	}

	.menu_links {
		// height: 50px !important;
		background-color: transparent;
		box-shadow: none;
	}

	.menu_item {
		color: white !important;
	}

	/*.responsive_menu_button{*/
	/*  width: 100%;*/
	/*  color: white !important;*/
	/*  background-color: #8a5e4e !important;*/
	/*  box-shadow: none;*/
	/*  border: none;*/
	/*}*/
	/*#responsive{*/
	/*  background-color: #8a5e4e !important;*/
	/*  width: 100%;*/
	/*  .v-list-item__title{*/
	/*    color: white !important;*/
	/*  }*/
	/*}*/
</style>