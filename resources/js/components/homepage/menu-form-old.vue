<template>
    <v-card>
        <v-card-title class="headline"><h2 class="major">Menu</h2></v-card-title>
        <v-card-text>
            <article id="menu">
                <div class="container">	 
                <div class="tabliststyle">
                    <ul role="tablist centeraction">
                        <li><a class="tablinks" onclick="openCity(event, 'Breakfast')">Przekąski</a></li>
                        <li><a class="tablinks" onclick="openCity(event, 'dania')" id="defaultMenu">Dania Główne</a></li>
                        <li><a class="tablinks" onclick="openCity(event, 'Dinner')">Napoje</a></li>
                    </ul>
                </div>		
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade tabcontent" id="Breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
                        <div class="single_menu_list">
                            <img src="background.jpg" alt="">
                            <div class="menu_content">
                                <h4>Frytas  <span>8.49zł</span></h4>
                                <p>Fryteczki z róznościami zawsze fajnie wchodzą. [Skład: Frytki, Sos Czosnkowy, Ketchup, Hummus]</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade tabcontent" id="dania" role="tabpanel" aria-labelledby="lunch-tab">
                        <div class="single_menu_list">
                            <img src="background.jpg" alt="">
                            <div class="menu_content">
                                <h4>Burger Special  <span>17.49zł</span></h4>
                                <p>Burger bardzo specjalny, dokładnie taki, jak wszędzie. [Skład: Bułka, Wołowina, Ser Cheddar, Rukola, Pomidor]</p>
                            </div>
                        </div>
                        <div class="single_menu_list">
                            <img src="background.jpg" alt="">
                            <div class="menu_content">
                                <h4>Burger Biedak  <span>9.99zł</span></h4>
                                <p>Kucharze go uwielbiają, bo idą na przerwe po zrobieniu. [Skład: Bułka, Szynka]</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show tabcontent" id="Dinner" role="tabpanel" aria-labelledby="dinner-tab">
                        <div class="single_menu_list">
                            <img src="background.jpg" alt="">
                            <div class="menu_content">
                                <h4>Puszka Coca-Coli  <span>3.99zł</span></h4>
                                <p>Zwykła puszka, taka o. 250ml</p>
                            </div>
                        </div>
                        <div class="single_menu_list">
                            <img src="/background.jpg" alt="">
                            <div class="menu_content">
                                <h4>Woda Mineralna  <span>2.99zł</span></h4>
                                <p>Podawana z lodem, żeby nie było. 330ml</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </article>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    name: "menu-form",
    data(){return {

    }},

    methods: {
    }
}
</script>

<style scoped>
</style>