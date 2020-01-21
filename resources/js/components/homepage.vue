<template>
	<v-col class="wrapper homepage">
	<v-row class="wrapper">
		<!-- Header -->
		<header id="header">

			<!-- Przykładowe logo jako cytrynka z FA:
			<div class="logo"><i class="icon fa-lemon"></i></div>-->

			<div class="content">
				<div class="inner">
					<h1>Smart Restaurant</h1>
					<p>No generalnie u nas smacznie, pysznie jest i tanio itd., wiadomo</p>
				</div>
			</div>
<!--			<nav>-->
<!--				<ul>-->
<!--					<li><a href="#zamowienie" @click.stop="orderingdialog = true">Zamów</a></li>-->
<!--					<li><a href="#menu" @click.stop="menudialog = true">Menu</a></li>-->
<!--					<li><a href="#rezerwacja" @click.stop="reservationdialog = true">Rezeruj</a></li>-->
<!--					<li><a href="#kontakt" @click.stop="contactdialog = true">Kontakt</a></li>-->
<!--					<li><a href="/login">Zaloguj</a></li>-->
<!--				</ul>-->
			<v-col cols="12" lg="10" md="12" sm="12" xl="9">
				<v-tabs
					background-color="transparent"
					color="basil"
					grow
					v-model="tab"
				>
					<v-tab
						:key="item.id"
						@click="goTo(item.link)"
						v-for="item in items"
					>
						{{ item.text }}
					</v-tab>
				</v-tabs>
			</v-col>

<!--			</nav>-->
		</header>

<!--		&lt;!&ndash; Main &ndash;&gt;-->
<!--		<div id="main">-->
<!--			&lt;!&ndash; Zamawianie &ndash;&gt;-->
<!--			<v-dialog overlay-opacity="0.915" v-model="orderingdialog" max-width="620">-->
<!--				<order-form></order-form>-->
<!--			</v-dialog>-->

<!--			&lt;!&ndash; Menu &ndash;&gt;-->
<!--			<v-dialog overlay-opacity="0.915" v-model="menudialog">-->
<!--				<menu-form></menu-form>-->
<!--				&lt;!&ndash; <user-menu></user-menu> &ndash;&gt;-->
<!--			</v-dialog>-->

<!--			&lt;!&ndash; Rezerwacja &ndash;&gt;-->
<!--			<v-dialog overlay-opacity="0.915" v-model="reservationdialog" max-width="620">-->
<!--				<reservation-form></reservation-form>-->
<!--			</v-dialog>-->

<!--			&lt;!&ndash; Kontakt &ndash;&gt;-->
<!--			<v-dialog overlay-opacity="0.915" v-model="contactdialog" max-width="620">-->
<!--				<contact-form></contact-form>-->
<!--			</v-dialog>-->

<!--		</div>-->
	</v-row>
	</v-col>
</template>

<script>
  export default {
    name: "homepage",
		props: ["role"],
    data: () => ({
      tab: null,
      items: [],
      questMenu: [
        {id: 1, text: "Menu", link: route("menu")},
        {id: 2, text: "Zamów online", link: route("order.create.online")},
        {id: 3, text: "Kontakt", link: route("contact")},
        {id: 4, text: "Zaloguj się", link: route("login")}

      ],
      adminMenu: [
        {id: 1, text: "Dania", link: route("menu.admin")},
        {id: 2, text: "Kategorie dań", link: route("dishCategory.index")},
        {id: 3, text: "Kelnerzy", link: route("worker.index")},
        {id: 4, text: "Kupony", link: route("voucher.add")},
        {id: 5, text: "Statystyki", link: route("admin.statistics")},
        {id: 6, text: "Stoliki", link: route("table.index")}
      ],
      waiterMenu: [
        {id: 1, text: "Stoliki", link: route("table.waiterIndex")},
        {id: 2, text: "Zamówienia", link: route("order.index")},
        {id: 3, text: "Rezerwacje", link: route("reservation.index")},
      ],
      customerMenu: [
        {id: 1, text: "Menu", link: route("menu")},
        {id: 2, text: "Zamów online", link: route("order.create.online")},
        {id: 3, text: "Zarezerwuj", link: route("reservation.createUser")},
        {id: 4, text: "Kontakt", link: route("contact")}
      ],
    }),
    beforeMount() {
      switch (this.role) {
        case "guest":
          this.items = this.questMenu;
          break;
        case "admin":
          this.items = this.adminMenu;
          break;
        case "worker":
          this.items = this.waiterMenu;
          break;
        case "customer":
          this.items = this.customerMenu;
          break;
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
  }

</script>

<style scoped>

	@media screen and (max-width: 1299px) {
		h1{
			font-size: 4.5rem;
		}
	}
	@media screen and (max-width: 974px) {
		h1{
			font-size: 3rem;
		}
	}
	@media screen and (min-width: 1300px) {
		h1{
			font-size: 5.5rem;
		}
	}
	@media screen and (max-width: 774px) {
		h1{
			font-size: 1.5rem;
		}
	}
	@media screen and (max-width: 410px) {
		h1{
			font-size: 1rem;
		}
	}
	@media screen and (max-width: 500px) {
		h1{
			font-size: 2rem;
		}
	}

	.homepage_title{
		height: 100%;
	}
	.wrapper:before{
		display: none
	}
	#header{
		width: inherit;
	}
	.homepage{
		justify-content: center;
		align-items: center;
		display: flex;
	}

	.row.header.no-gutters {
		visibility: hidden !important;
	}

	.row wrapper{
		justify-content: center;
	}
</style>