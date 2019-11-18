<template>

        <v-row no-gutters class="justify-space-between header">
          <v-col cols="2">
            <v-row class="menu-items">
              <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
              <v-toolbar-title>Menu</v-toolbar-title>
            </v-row>
              <v-navigation-drawer
                v-model="drawer"
              >
                <v-list>
                  <v-list-item-group v-model="menu">
                    <v-list-item
                      v-for="item in menu"
                      :key="item.id"
                    >
                      <v-list-item-content>
                        <v-list-item-title v-text="item.text" @click="goTo(item.link)"></v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list-item-group>
                </v-list>
              </v-navigation-drawer>
          </v-col>
          <v-col cols="9" style="max-height: 3rem;">
            <v-row>
              <v-col v-if="notLogged" class="text-end">
                <v-btn text @click="register">Zarejestruj</v-btn>
                <v-btn @click="login">Zaloguj się</v-btn>
              </v-col>
              <v-col v-else class="text-end">
                <v-menu offset-y>
                  <template v-slot:activator="{ on }">
                    <v-btn
                      color="primary"
                      dark
                      v-on="on"
                    >{{loggedUser.name + " "}}{{loggedUser.surname}}</v-btn>
                  </template>
                  <v-list>
                    <v-list-item v-for="(item, id) in userMenu" :key="id" @click="goTo(item.link)">
                      <v-list-item-title>{{ item.text }}</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </v-menu>
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
        { id: 1, text: "Strona główna", link: route("home") },
        { id: 2, text: "Menu", link: route("menu") },
        { id: 3, text: "Zamów online", link: route("order.create.online") },
        { id: 5, text: "Kontakt", link: route("contact") }
      ],
      adminMenu: [
        { id: 1, text: "Strona główna", link: route("home") },
        { id: 2, text: "Dania", link: route("menu.admin") },
        { id: 3, text: "Kategorie dań", link: route("dishCategory.index") },
        { id: 4, text: "Kelnerzy", link: route("worker.index") },
        { id: 5, text: "Rezerwacje", link: route("reservation.index") },
        { id: 6, text: "Zamowienia", link: route("home") },
        { id: 7, text: "Stoliki", link: route("table.index") }
      ],
      waiterMenu: [
        { id: 1, text: "Stoliki", link: route("table.waiterIndex") },
        { id: 2, text: "Zamówienia", link: route("order.index") },
        { id: 3, text: "Rezerwacje", link: route("reservation.index") }
      ],
      userMenu: [
        { id: 1, text: "moje zamówienia", link: route("orders.myOrders") },
        {
          id: 2,
          text: "moje rezerwacje",
          link: route("reservation.indexUser")
        },
        { id: 3, text: "moje konto", link: route("user.myAccount") },
        { id: 4, text: "wyloguj", link: "logout" }
      ],
      customerMenu: [
        { id: 1, text: "Strona główna", link: route("home") },
        { id: 2, text: "Menu", link: route("menu") },
        { id: 3, text: "Zamów online", link: route("order.create.online") },
        { id: 4, text: "Zarezerwuj", link: route("reservation.createUser") },
        { id: 5, text: "Kontakt", link: route("contact") }
      ],
      menu: [],
      notLogged: true,
      loggedUser: "",
      drawer: false
    };
  },
  beforeMount() {
    switch (this.role) {
      case "guest":
        this.menu = this.questMenu;
        break;
      case "admin":
        this.menu = this.adminMenu;
        break;
      case "worker":
        this.menu = this.waiterMenu;
        break;
      case "customer":
        this.menu = this.customerMenu;
        break;
    }
    if (this.user !== null) {
      this.notLogged = false;
      this.loggedUser = this.user;
    }
  },

  methods: {
    goTo(route) {
      if (route === "logout") {
        this.logout();
      } else {
        this.drawer = false
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
      axios.post("/logout").then(function() {
        window.location.href = route("login");
      });
    }
  }
};
</script>

<style scoped>
.v-card__text.header-text {
  color: white;
}
.header {
  max-height: 3rem;

}
.menu-items{
  margin-left: 1rem;
}

</style>