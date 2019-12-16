<template>
  <v-row class="justify-center align-center">
    <v-col cols="12" lg="5" ma-2 md="8" sm="10" xl="4">
      <v-card class="transparent_form">
        <v-card-title>Edytowanie dania</v-card-title>
        <v-card-text>
          <v-form
            ref="form">
            <v-text-field :rules="[rules.required]" label="Nazwa" v-bind:error-messages="errors.name"
                          v-model="form.name" outlined
            />
            <v-text-field :rules="[rules.required, rules.numeric]" label="Cena" v-bind:error-messages="errors.price"
                          v-model="form.price" outlined
            />
            <v-select
              :rules="[rules.required]"
              item-text="name"
              item-value="id"
              label="Kategoria"
              outlined
              v-bind:error-messages="errors.category_id"
              v-bind:items="dishCategory"
              v-model="form.category_id">
            </v-select>
            <v-textarea
              :rules="[rules.required]"
              label="Opis dania"
              name="input-7-4"
              outlined
              v-bind:error-messages="errors.category_id"
              v-bind:items="dishCategory"
              v-model="form.comment"/>
          </v-form>
          <input
            @change="uploadPhoto($event.target.files[0])"
            id="fileInput"
            style="display:none"
            type="file"
          />
          <v-btn
            :loading="loadingPhoto"
            class="lightblue_action_button button-padding"
            id="fileInputButton"
            onclick="document.getElementById('fileInput').click()"
            v-if="!form.photo_path"
          >Dodaj zdjęcie
          </v-btn>
          <v-card color="transparent" flat height="100%" tile v-if="form.photo_path">
            <v-img :src="form.photo_path" aspect-ratio="1.7" contain/>
            <v-card-actions class="justify-center">
              <v-btn
                @click="deletePhoto()"
              >Usuń zdjęcie
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-card-text>
        <v-card-actions>
          <v-row class="justify-space-between mx-3">
            <v-btn @click="cancel" text>Anuluj</v-btn>
            <v-btn @click="save" v-bind:loading="loading" class="yellow_form_button" color="secondary">Zapisz</v-btn>
          </v-row>

        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
  import {notification, notificationError} from "../../Notifications";

  export default {
    props: ['id'],
    name: "edit-dish",
    data() {
      return {
        loading: false,
        loadingPhoto: false,
        rules: {
          required: value => !!value || "To pole jest wymagane",
          numeric: value => /^(\d+|\d+\.\d{1,2})$/.test(value) || 'Nieprawidłowy format ceny'
        },
        dishCategory: [],
        form: {
          id: '',
          name: '',
          price: '',
          category_id: '',
          comment: '',
          photoId: '',
          photo_path: ''
        },
        errors: {
          name: [],
          price: [],
          category_id: [],
          comment: []
        },

      };
    },
    beforeMount() {
      axios.get(route('api.dishCategory.index')).then(response => {
        this.dishCategory = response.data;
      }).catch(error => {
        console.error(error.response);
      });
      axios.get(route('api.dish.load', this.id)).then(response => {
        let keys = Object.keys(this.form);
        console.log(response.data)
        for (let key of keys) {
          this.form[key] = response.data[key];
        }
      }).catch(error => {
        console.error(error.response);
      });
    },
    methods: {
      cancel() {
        window.location.replace(route('menu.admin'));
      },
      clearErrors(object) {
        let keys = Object.keys(object);
        for (let key of keys) {
          object[key] = [];
        }
      },
      fillErrors(error) {
        this.clearErrors(this.errors);
        let entries = Object.entries(error.response.data.errors);
        for (let [key, value] of entries) {
          this.errors[key] = value;
        }
      },
      save() {
        if (this.$refs.form.validate()) {
          this.loading = true;
          this.clearErrors(this.errors);
          axios.post(route('api.dish.update'), this.form).then(response => {
            notification('Pomyślnie edytowano danie', 'success');
            window.location.replace(route('menu.admin'));
          }).catch(error => {
            console.error(error.response);
            if (error.response.statusCode === 500) {
              notificationError(error.response.data);
            } else {
              notification('Wystąpił błąd poczas edytowania dania', 'error');
              this.fillErrors(error);
            }
          }).finally(() => {
            this.loading = false;
          })
        }
      },
      uploadPhoto(file) {
        var ext = file.type
          .split("/")
          .pop()
          .toLowerCase();
        if (ext != "jpeg" && ext != "jpg" && ext != "png" && ext != "bmp") {
          notificationError("Poprawny format zdjęcia to: jpeg, jpg, png oraz bmp");
          return;
        }
        if (file.size > 5210000) {
          notificationError("Maksymalny rozmiar zdjęcia to 5 MB");
          return;
        }
        this.loadingPhoto = true;
        let reader = new FileReader();
        let _this = this;
        reader.readAsDataURL(file);
        reader.onload = function () {
          window.axios.post(route('api.dish.photoAdd'), {
            file: reader.result,
            photoId: _this.form.photoId
          }).then(response => {
            _this.loadingPhoto = false;
            _this.form.photo_path = response.data.photoUrl;
            _this.form.photoId = response.data.photoId;
          }).catch(error => {
            console.error(error)
            notificationError(error.response.data);
            _this.loadingPhoto = false;
          });
        };
        reader.onerror = function (error) {
          console.error(error)
          notificationError(error.response.data);
        };
      },
      deletePhoto() {
        window.axios.delete(route('api.dish.photoDelete', this.form.photoId))
          .then(response => {
            this.form.photoId = ''
            this.form.photo_path = ''
            notification(response.data, 'success')
          })
          .catch(error => {
            notificationError(error.response.data);
          });
      },
    }
  }
</script>

<style scoped>

</style>