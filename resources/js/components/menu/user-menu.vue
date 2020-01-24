<template>
	<v-row class="justify-space-around">
		<v-col cols="15" sm="10" md="9" lg="9" xl="8" class="boksik">
        <v-card-title>
          <h1>Menu</h1>
        </v-card-title>
			<v-select
				class="beige_select"
				:items="categoryItems"
				item-value="id"
				item-text="name"
				label="Kategoria"
        style="padding-left: 5px; padding-right: 5px"
				v-model="categoryPicked"
				v-on:change="setMenuItems()"
			/>
			<v-data-table
				:headers="headers"
				:items="menuItems"
				:items-per-page="5"

			>
				<template slot="item" slot-scope="props">
					<tr>
						<td class="text-xs-left">{{ props.item.name }}</td>
						<td class="text-xs-left">{{ props.item.price}}</td>
						<td v-if="favourite"><v-rating @input="changeFavourite(props.item)" clearable length="1" v-model="props.item.favourite"/></td>
						<td v-if="props.item.photoPath"><v-img  :src="props.item.photoPath" aspect-ratio="1.7" contain/></td>
						<td v-else>Brak zdjecia</td>
					</tr>
				</template>
			</v-data-table>
		</v-col>
	</v-row>
</template>

<script>
  import {notification, notificationError} from "../../Notifications";

  export default {
    name: "user-menu",
    props: ['dishes', 'categories'],
    data() {
      return {
        menuItems: [],
        headersAuthUser: [
          {text: 'Nazwa', value: 'name',},
          {text: 'Cena (zł)', value: 'price'},
					{text: 'Ulubione', value: 'action'},
					{text: 'Zdjęcie', value: 'photoPath'}
        ],
				headerQuest:[
          {text: 'Nazwa', value: 'name',},
          {text: 'Cena (zł)', value: 'price'},
          {text: 'Zdjęcie', value: 'photoPath'}
				],
        categoryItems: [],
        allMenuItems: [],
        categoryPicked: -1,
				headers:[],
				rating: 0,
				favourite: false,
      }
    },
    beforeMount() {
			if(this.dishes.length > 0){
			  if(this.dishes[0].hasOwnProperty('isFavourite')){
					this.headers = this.headersAuthUser
					this.favourite = true
          for (let dish of this.dishes) {
            if(dish.isFavourite === true){
              dish.favourite = 1
						}else{
              dish.favourite = 0
						}
          }
        }else{
          this.favourite = false
          this.headers = this.headerQuest
        }
			}
      this.menuItems = this.dishes;
      this.allMenuItems = this.dishes;
      this.categoryItems = [{'id': -1, 'name': 'Wszystkie'}].concat(this.categories)
    },
    methods: {
      changeFavourite(item){
				if(item.favourite === 1){
				  this.addFavourite(item.id)
				}else{
				  this.removeFavourite(item.id)
				}
			},
      addFavourite(id){
        axios.post(route('api.favouriteDish.store'), {id: id}).then(response => {
          notification('Danie zostało pomyślnie dodane do Twoich ulubionych', 'success');
        }).catch(error => {
          if (error.response.statusCode === 500) {
            notificationError(error.response.data);
          } else {
            notification('Wystąpił błąd podczas dodawania dania do Twoich ulubionych', 'error');
            this.fillErrors(error);
          }
        })
			},
      removeFavourite(id){
        axios.post(route('api.favouriteDish.delete'),  {id: id})
          .then(response => {
            notification('Danie zostało usunięte z Twoich ulubionych', 'success');
          }).catch(error => {
          notification('Wystąpił błąd podczas usuwania dania z Twoich ulubionych', 'error');
          console.error(error)
        })
			},
      setMenuItems() {
        let id = this.categoryPicked;
        if (id === -1) {
          this.menuItems = this.allMenuItems
        } else {
          this.menuItems = [];
          this.allMenuItems.forEach(item => {
            if (item.category.id === id) {
              this.menuItems.push(item)
            }
          })
        }
        return this.menuItems
      }
    }

  }
</script>

<style >
	.v-data-table__wrapper{
		border-radius: inherit;
	}
	.v-data-table.theme--light{
		background: rgba(227, 203, 177, 0.85) !important;
		border-radius: 20px;
	}
	.v-data-table.elevation-1.theme--light{
		background: rgba(227, 203, 177, 0.85) !important;
		border-radius: 20px;
	}


</style>