<template>
  <v-row class="justify-center align-center">
    <v-col cols="14" lg="7" ma-2 md="10" sm="12" xl="5">
      <v-card class="transparent_form">
          <v-card-title class="boksik">
            <v-toolbar color="primary" dark flat>
					    <v-toolbar-title>Dania</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn @click="addDish" class="yellow_form_button" color="secondary">Dodaj danie</v-btn>
              </v-toolbar>
            </v-card-title>
          <v-card-text class="boksik">
            <v-data-table
              :headers="headers"
              :items="menuItems"
              :items-per-page="5"
              class="elevation-1"
            >
              <template slot="item" slot-scope="props">
                <tr>
                  <td class="text-xs-left">{{ props.item.name }}</td>
                  <td class="text-xs-left">{{ props.item.price}}</td>
                  <td class="text-xs-center">
                    <v-icon @click="editItem(props.item.id)" small>
                      edit
                    </v-icon>
                    <v-icon @click="deleteItem(props.item)" small>
                      delete
                    </v-icon>
                  </td>
                </tr>
              </template>
            </v-data-table>
          </v-card-text>
      </v-card>
    </v-col>
  </v-row>


</template>

<script>
  import {notification, notificationError, notificationSuccess} from "../../Notifications";

  export default {
    name: "admin-menu",
    data() {
      return {
        menuItems: [],
        headers: [
          {text: 'Nazwa', value: 'name',},
          {text: 'Cena', value: 'price'},
          {text: 'Akcje', value: ''},
        ],
      }
    },
    beforeMount() {
      this.getData()
    },
    methods: {
      deleteItem(item) {
        axios.delete(route('api.dish.delete', item.id))
          .then(response => {
            notification('Pomyślnie usunięto danie', 'success');
            this.getData()
          }).catch(error => {
          notification('Wystąpił błąd podczas usuwania dania', 'error');
          console.error(error)
        })

      },
      editItem(id) {
        window.location.href = route('dish.edit', [id])
      },
      getData() {
        axios.get(route('api.dish.index'))
          .then(response => {
            this.menuItems = response.data
          }).catch(error => {
          console.error(error)
        })
      },
      addDish() {
        window.location.replace(route('dish.create'));
      }
    }
  }
</script>

<style scoped>

</style>